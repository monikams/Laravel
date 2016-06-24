<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">       
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">      
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>       
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery.validate.js') }}"></script>

    </head>
    <body>
        <nav class="navbar navbar-default" id='myNav'>
            <div class="container nav-container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                    <div class="navbar-header">
                        <button id="hamburger" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <img src="{{asset('images.png')}}" id="center_img" class="logo">
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-md-push-9  col-lg-push-9 col-sm-push-9 col-sm-2 col-xs-6">
                    <ul class="nav navbar-right list-inline" style="display:inline-flex;" >
                        @if(!Auth::guest())       
                        <li class="dropdown" >
                            <a id="btnProfile" class="right_profile center" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-user"></span></a>
                            <ul id="profileList"  class="dropdown-menu" role="menu">
                                <li><a  href="{{ url('/account/updateAccount') }}"> {{ trans('messages.change_data') }} </a></li>
                                <li><a  href="{{ url('/account/updatePassword') }}"> {{ trans('messages.change_password') }} </a></li>
                                <li><a  href="{{ url('/account/updateEmail') }}"> {{ trans('messages.change_email') }} </a></li>
                                <li><a  href="{{ url('/auth/logout') }}"> {{ trans('messages.logout') }} </a></li>
                            </ul>
                        </li>        
                        @endif 
                        <li id="lang" class="dropdown">
                            <a href="#"  id="btnStatus" class="dropdown-toggle center" data-toggle="dropdown" role="button"><?php echo Session::get('locale') == "bg" ? "БГ" : "EN" ?></a>
                            <ul id="langMenu" class="dropdown-menu">
                                <li>  <a name="locale" class="center" id="bg"  href="{{ url('/language/bg') }}"><?php echo Session::get('locale') == "bg" ? "" : trans('messages.bg') ?></a></li>
                                <li>  <a name="locale" class="center" id="en"  href="{{ url('/language/en') }}"><?php echo Session::get('locale') == "en" ? "" : trans('messages.en') ?></a></li> 
                            </ul>
                        </li>                   
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-lg-9  col-md-9 col-sm-9 col-xs-12 col-md-pull-2 col-lg-pull-2 col-sm-pull-2" >
                    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul id="centerUL" class="nav navbar-nav">                                      
                            @if (Auth::guest())
                            <li id="log_in" ><a class="center" href="{{ url('/auth/login') }}">{{ trans('messages.login') }}</a></li>
                            <li id="reg" ><a class="center" href="{{ url('/auth/register') }}">{{ trans('messages.register') }}</a></li>

                            @endif
                            @if (!Auth::guest())                        
                            <!--        <ul id="articles" class="nav navbar-nav ">-->
                            <li><a class="center" href="/articles"> {{ trans('messages.articles') }}</a></li>
                            <li><a class="center" href="/articles/create" id="create" > {{ trans('messages.create') }}</a></li>
                            <li><a class="center" href="{{ url('/upload') }}">{{ trans('messages.upload_photo') }}</a></li>
                            <li><a class="center" href="{{ url('/images') }}">{{ trans('messages.images') }}</a></li>
                            @endif
                            @if(Auth::check()&& isset(Auth::user()->email) && Auth::user()->email=="monikaspasova1@gmail.com")
                            <li><a class="center" href="{{ url('charts/index') }}"> {{ trans('messages.charts') }}</a></li>
                            @endif

                        </ul>  
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row big" >

                <div class="container-fluid col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <img id="banner"  src="{{ asset('banner.jpg') }}" alt="Banner" >
                </div>

                <div class="container-fluid col-lg-9 col-md-8 col-sm-7 col-xs-12">     

                    <h1> Write a new article </h1>

                    <div class="create_form">

                        {!! Form::open(['url' => 'articles']) !!}
                        @include('articles.form', ['submitButtonText' => 'Add article'])
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

    </body>
    <script>
$(document).ready(function () {

    $('#hamburger').click(function () {
        dropDownFixPosition($('#hamburger'), $('.big'));
    });

    function dropDownFixPosition(button, dropdown) {
        var dropDownTop = button.offset().top + button.outerHeight();
        dropdown.css('top', dropDownTop + "px");
        dropdown.css('left', button.offset().left + "px");
    }

    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    //$('#flash-overlay-modal').modal(); - ako iskam da izpolzvam overlay() ot paketa flash

})
    </script>
    <style>
        .big{
            positon: none;

        }   
        #banner{
            height: 300px;
            width: 250px;
            margin-top: 20px;
            padding-right: 25px;
        }
        /*        .container-fluid {
                    border: 3px solid maroon;
                }*/

        #lang{
            padding-right: 0px;
        }
        .navbar .navbar-nav {
            display: inline-block;
            float: none;
            vertical-align: top;
        }

        .navbar .navbar-collapse {
            text-align: center;
        }
        a{
            color:gray;
        }      

        #center_img{
            max-height:55px;      
        }

        .dropdown-menu{
            min-width: 50px;
            max-width: 160px;
        }

        .center{
            text-align: center;
        } 
        #myNav .list-inline{
            max-height: 60px;  
            margin-top: 7px;
        }

        #profileList{
            margin-left: -45px;
        }

        #hamburger{               
            padding: 21px;
            padding-left: 13px;
            padding-right: 13px;
            height: 55px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .logo{
            margin-left: -10px;
            margin-top:  2px;
        }

        @media only screen and  (min-width: 767px) {
            .nav>li>a {
                margin-top: -6px;
                height: 58px;
                position: relative;
                display: block;
                padding: 10px 15px;       
            }
            .nav>li>a{
                padding-top: 20px;
            }
            #btnStatus{
                margin-top: -6px;
                padding-top: 10px;
            } 
            #btnProfile{
                margin-top: -5px;
                padding-top: 10px;
            }

        }
        @media only screen and  (max-width: 352px) {
            #myNav .list-inline{
                margin-top:0px !important;
            }

            .navbar-toggle {
                position: none; 
                float: none;           
            } 

            .navbar-header{
                height: 50px;
            }

            .logo{
                margin-top: -75px;
                position: static;
            }

            #hamburger{               
                margin-left: 60px; 
                height: 55px;          
            }

            li #lang{
                padding-top: -3px;
            }

            .nav > li>  a {
                height: 55px;
                margin-top: -15px;
            }
        }

        @media only screen and (min-width: 346px) and (max-width: 767px) {     
            .nav > li>  a {
                height: 57px;
                margin-top: 5px;        
            }  
            #btnStatus{
                margin-top: -14px;
                padding-top: 10px;
            } 
            #btnProfile{
                margin-top: -14px;
                padding-top: 10px;
            }
            #hamburger{               
                height: 57px;          
            }
            .nav navbar-right list-inline{
                margin-right: 50%; 
            }
            #myNav .list-inline {
                max-height: 60px;
                margin-top: 7px;
                margin-left: 62%;
                margin-right: 20%;
            }



        }
        @media only screen and (min-width: 290px) and (max-width: 532px) 
        {
            #myNav .list-inline {
                max-height: 60px;
                margin-top: 7px;
                margin-left: 25%;
                margin-right: 25%;
            }


        }

        @media only screen and (min-width: 348px) and (max-width: 559px) 
        {
            #myNav .list-inline {
                max-height: 60px;
                margin-top: 7px;
                margin-left: 25%;
                margin-right: 25%;
            }


        }
        
        /*        .container{
                    border: 2px solid #B22222;
                    padding-left: 15px;
                    padding-right: 15px;
                }*/

    </style>

</html>
