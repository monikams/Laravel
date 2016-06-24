@extends('app')

@section('content')
@if(Session::has('success'))
    <div>
       <h2>{!! Session::get('success') !!}</h2>
    </div>
@endif

@if(empty(\DB::table('payment')->where('user_id', \Auth::user()->id)->get()))
  <h1> You should pay for more file uploads</h1>
  {!! Form::open(array('url'=>'apply/payment','method'=>'POST')) !!}   
  {!! Form::select('size', array('S' => '10MB', 'L' => '100MB')) !!}
  {!! Form::select('time', array('M' => '1month', 'Y' => '1year')) !!}
  {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!} 
  {!! Form::close() !!}
@endif  
  
  @endsection
