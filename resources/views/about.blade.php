@extends('app1')
<h1> Hello </h2>

@section('content')
 @if ($firstname == 'Monika')
        <h1>Hello, {{ $firstname }}</h1>
 @endif
@stop

@section('footer')
    <!--<script> alert("HELLO") </script>-->
@stop