<?php namespace App\Http\Controllers;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Paypalpayment;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaypalController extends Controller
{
   //...
    private $_api_context;
    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');     
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->middleware('auth');
    }
 
    public function postPayment()
            
    {     
                $arr=$this->definePrice();
                
                $size=$arr[0];
                $time=$arr[1];
                $user_id=$arr[2];
                $price=$arr[3];   
                
                Session::put('size', $size);
                Session::put('time', $time);
                Session::put('user_id', $user_id);
                Session::put('price', $price);
                
                $names=array('S'=>'10MB', 'L'=>'100MB', 'M'=>'month', 'Y'=>'year');
    
                $payer = new Payer();       
                $payer->setPaymentMethod('paypal');               
                $item_1 = new Item();
                $item_1->setName($names[$size]) // item name
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($price); // unit price
          

                //add item to list
                $item_list = new ItemList();
                $item_list->setItems(array($item_1));

                $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($price);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription("The size of uploads space is $names[$size] and the period of subscription is 1 $names[$time]!");

                $redirect_urls = new RedirectUrls();       
                $redirect_urls->setReturnUrl(URL::route('payment.status')) // Specify return URL
                    ->setCancelUrl(URL::route('payment.status'));

                $payment = new Payment();       
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));      

                try {          
                    $payment->create($this->_api_context); 
                    
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    if (\Config::get('app.debug')) {
                        echo "Exception: " . $ex->getMessage() . PHP_EOL;
                        $err_data = json_decode($ex->getData(), true);
                        exit;
                    } else {
                        die('Some error occur, sorry for inconvenient');
                    }

            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
         
                // add payment ID to session
                Session::put('paypal_payment_id', $payment->getId());

                if(isset($redirect_url)) {
                    // redirect to paypal
                    return Redirect::away($redirect_url);
                }
                return Redirect::route('original.route')
                    ->with('error', 'Unknown error occurred');
           
            
    }
    
    public function definePrice()
    { 
            $arr=$this->takeInput();
            $size=$arr[0];          
            $time=$arr[1];
            $user_id=$arr[2];
            if($size=='S' && $time=='M')
            {
               $price=10;             
            }
            elseif($size=='S' && $time=='Y'){
               $price=100;
            }
            elseif($size=='L' && $time=='M'){
                $price=20;
            }
            elseif($size=='L' && $time=='Y'){
                $price=200;
            }
            
//            global $array;
            $array=array($size, $time, $user_id, $price);
            
            return $array;
    }
    
    public function takeInput()
    {
         $size=Input::get('size');
         $time=Input::get('time');             
         $user_id=Auth::user()->id;
         $arr = array($size, $time, $user_id);         
         return $arr;
    }

    
    public function getPaymentStatus()
    {
        
        $size = Session::get('size');
        $time = Session::get('time');
        $price = Session::get('price');
        $user_id = Session::get('user_id');

        $names=array('S'=>'10MB', 'L'=>'100MB', 'M'=>'month', 'Y'=>'year');
        
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::route('original.route')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary 
        // to execute a PayPal account payment. 
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

//        echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            
//          User::where('id', Auth::user()->id)->where('paypal',0)->update(['paypal' => 1]);
            $now = Carbon::now();
            DB::table('payment')->insert(['user_id'=>Auth::user()->id, 'price'=>$price, 'size'=>$names[$size], 'time'=>$names[$time], 'created_at'=>$now]);
            return Redirect::to('upload')
                ->with('success', 'Payment success');
        }
        return Redirect::route('original.route')
            ->with('error', 'Payment failed');
    }
    
    
      public function sizeOfUsersDirectory()
        {             
             $userDirectory = Auth::user()->filename;
             
             $path = storage_path()."/app/uploads/$userDirectory";
             $files = scandir($path);            
             
             $dirSize=0;
             for($i=2; $i<count($files); $i++)
             {                               
                $size=Storage::size('/uploads/'.$userDirectory.'/'.$files[$i]);                       
                $dirSize += $size;               
             }
                      
             return $dirSize;
        }
           
}