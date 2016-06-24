@extends('app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
             <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.change_email') }}</div>
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
                    
                       
                    <form  id="updateEmail" class="form-horizontal" role="form" method="POST" action="{{ url('/account/updateEmail') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                         <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.password') }}</label>
                            <div class="col-md-6">                         
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>                     
                        
                        <div  class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.email') }}</label>
                            <div class="col-md-6">
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="mail" type="submit" name="submit" class="btn btn-primary">
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
     
        var form = $('#updateEmail');
         var old_email = '{{ $email }}';
         $("#email").val(old_email);

    $.validator.addMethod("validateUserEmail", function ()
    {
        $.ajax({
            type: "get",
            url : "register",
            data: {
                email: function() {
                return  $('input[name=email]').val();
                }
            },
            success: function(response) {
                console.log(response);
            },
            error: function (xhr) {
                $('input[name=email]').after();
            }
        });
    });
    
        $('#mail').click(function () {
            if (!form.valid())
            {
                return false;
            }
        });
        
    form.validate({
    rules: {
        
        email: {
            required: true,
            email: true,
            maxlength: 60,
            remote: {
                                url: "{{ url('/register')}}",   
                                data: {
                                    email: function () {
                                        return $("#email").val();
                                    }
                                },
                                dataFilter: function (data) {
                                    var json = JSON.parse(data);
                                    
                                    if (json.msg === "false") {
                                        return 'false';
                                    } else {
                                        return 'true';
                                    }

                                }
                       }
        },
        password: {
            required: true
        }
    },
        highlight: function (element) {
        $(element).parent().find('.form-control-feedback').removeClass('glyphicon-ok').removeClass('success').addClass('glyphicon-remove').addClass('error');
        },
        unhighlight: function (element) {
        $(element).parent().find('.form-control-feedback').removeClass('glyphicon-remove').removeClass('error').addClass('glyphicon-ok').addClass('success');
        },
        messages: {
                email: {
                        required: " {{ trans('messages.err3') }} ",
                        email: " {{ trans('messages.err4') }} ",
                        maxlength: " {{ trans('messages.err5') }} ",
                        remote: " {{ trans('messages.err6') }} "
                },
                password: {
                        required: " {{ trans('messages.err7') }} "                      
                }                
        }      
});

    });


</script>




<style>
      .glyphicon-ok{
        left: 85%; 
        color: green;
    }
     .glyphicon-remove{
        left: 85%;
        color: red;
    }
</style>


@endsection


