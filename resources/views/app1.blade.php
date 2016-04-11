<!doctype html>
<html lang="en">
 
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" >
        
        <script src="http://code.jquery.com/jquery.js"></script>   
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<!--    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-theme.css')}}"></link>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-theme.min.css')}}"></link>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}"></link>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}"></link>
    

    <script src="{{asset('/js/bootstrap.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.js')}}"></script>-->
        
</head>
        
<body>
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
    <div class="container">
<!--       @include('partials.flash')       -->
       @include('flash::message')
       @yield('content')
    </div>
    
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        //$('#flash-overlay-modal').modal(); - ako iskam da izpolzvam overlay() ot paketa flash
     </script>
      @yield('footer')
</body>        
    
</html>