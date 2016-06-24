<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" >
        <script type="text/javascript" src="{{ asset('/js/jquery.validate.js') }}"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

        <!--jquery localisation-->


        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    </head>

    <body>
        @include('partials.nav')
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