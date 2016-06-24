<?php


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


Route::get('/', 'WelcomeController@index');

Route::get('contact', 'WelcomeController@contact');

Route::get('about', 'PagesController@about');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::get('articles','ArticlesController@index');
//Route::get('articles/create','ArticlesController@create');
//Route::get('articles/{id}','ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', ArticlesController@edit);

Route::resource('articles', 'ArticlesController');

Route::get('foo', ['middleware' => 'manager', function() {
        return 'this page will be only reviewed by managers';
    }
]);

Route::get('getTimeZones', 'RegisterController@findTimezones');

Route::get('register', 'RegisterController@register');

Route::get('welcome', 'LanguageController@choose');

Route::get('/language/{location}', 'LanguageController@choose');

Route::get('/confirm/{code}', 'RegisterController@confirm');



Route::get('/charts/articlesPerDay', 'CountArticlesPerDay@articles_per_day');

Route::get('/charts/geocharts', 'GeoController@get_users_countries');

Route::get('/charts/userchart', 'ArticlesOfUserController@articles_of_user');

Route::get('/charts/articles_per_day', 'CountArticlesPerDay@getPeriod');


//Route::get('/charts/articlesPerDay', 'ChartsController@articles_per_day');
//Route::get('/charts/charts', 'ChartsController@getPeriod');
////tuk ne namira countries;
//Route::post('/charts/charts', 'ChartsController@get_users_countries');
////Route::get('/charts/charts', 'ChartsController@articles_of_user');


//Route::get('/charts/articlesPerDay', 'ChartsController@articles_per_day');
Route::get('charts/index', 'ChartsController@index');

Route::get('account/updateAccount', 'AccountController@indexInfo');
Route::post('account/updateAccount', 'AccountController@updateInfo');

Route::get('account/updatePassword', 'AccountController@indexPassword');
Route::post('account/updatePassword', 'AccountController@updatePassword');

Route::get('account/updateEmail', 'AccountController@indexEmail');
Route::post('account/updateEmail', 'AccountController@updateEmail');

Route::get('upload', function() {
  return View::make('pages.upload');
});

Route::post('apply/upload', 'ApplyController@upload');

Route::get('images', 'ApplyController@isImage');

Route::get('makeProfile', 'ApplyController@makeProfile');

//_______________________________________________
 
// Add this route for checkout or submit form to pass the item into paypal
Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));
 
// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

//_________________________________________________


Route::get('paymentForm', function() {
  return View::make('paymentForm');
});

Route::post('apply/payment', 'PaypalController@postPayment');

Route::get('/delete/{id}', 'ApplyController@delete');
