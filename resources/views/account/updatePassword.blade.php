@extends('app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
             <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.change_password') }}</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                       
                    <form id="updatePassword" class="form-horizontal" role="form" method="POST" action="{{ url('/account/updatePassword') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                         <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.password') }}</label>
                            <div class="col-md-6">                         
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="password" class="form-control" name="old_password">
                            </div>
                        </div>                     

                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.new_password') }}</label>
                            <div class="col-md-6">                         
                                <span class="glyphicon form-control-feedback" ></span>
                                <input id="new_password" type="password" class="form-control" name="new_password">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label">{{ trans('messages.confirm_new_password') }}</label>
                            <div class="col-md-6">     
                                <span class="glyphicon form-control-feedback" ></span>
                                <input id="confirm_new_password" type="password" class="form-control" name="confirm_new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="pass" type="submit" name="submit" class="btn btn-primary">
                                   {{ trans('messages.change') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">                                  
                              
                           </div>
                     </div>                     
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
          
        var form = $('#updatePassword');   

        $('#pass').click(function () {
            if (!form.valid())
            {
                return false;
            }
        });
        
    var password = '{{ $password }}';
    console.log(password);
    
   $('#new_password').change(function () {    
        var enteredPassword = $("#new_password").val();
        
    });
 
    form.validate({
    rules: {
        old_password: {
            required: true,
           
        },
       new_password: {
             required: true,
             minlength: 6,
        },
        confirm_new_password: {
             required: true,
             equalTo: $('#confirm_new_password').is(':empty') ? "required:true" : "#new_password"
             
        }       
    },
        highlight: function (element) {
        $(element).parent().find('.form-control-feedback').removeClass('glyphicon-ok').removeClass('success').addClass('glyphicon-remove').addClass('error');
        },
        unhighlight: function (element) {
        $(element).parent().find('.form-control-feedback').removeClass('glyphicon-remove').removeClass('error').addClass('glyphicon-ok').addClass('success');
        },
        messages: {
                old_password: {
                        required: " {{ trans('messages.err7') }} ",
                        equalTo: " {{ trans('messages.err15') }} "
                },
                new_password: {
                        required: " {{ trans('messages.err7') }} ",
                        minlength: " {{ trans('messages.err8') }} "
                },
               confirm_new_password:{
                        required: " {{ trans('messages.err9') }} ",
                        equalTo:  " {{ trans('messages.err10') }} "
                }
        }
         
});

});


</script>



<style>   
      .glyphicon-ok{
        left: 80%;
        color: green;
    }
     .glyphicon-remove{
        left: 80%;
        color: red;
    }
</style>


@endsection
