@extends('app1')


@section('content')
    
   <h1> Write a new article </h1>
   
   {!! Form::open(['url' => 'articles']) !!}
         @include('articles.form', ['submitButtonText' => 'Add article'])
   {!! Form::close() !!}
   
   @include('errors.list')
  
@stop


