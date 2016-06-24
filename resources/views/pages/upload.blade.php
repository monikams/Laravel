@extends('app')

@section('content')
       
        @if(Session::has('success'))
          <div>
             <h2>{!! Session::get('success') !!}</h2>
          </div>
        @endif
            <div class="secure">Upload form</div>                          
                {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}               
                <div class="form-group"> 
                    {!! Form::file('image') !!}
                    <p class="errors">{!!$errors->first('image')!!}</p>
                    @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                    @endif   
                    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}                   
                </div> 
                {!! Form::close() !!}
          
@endsection
