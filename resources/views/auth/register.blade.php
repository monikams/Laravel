@extends('app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
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
                    
                       
                    <form id="form" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div  class="form-group  has-feedback">
                            <label class="col-md-4 control-label">{{ trans('messages.name') }} </label>
                            <div class="col-md-6">
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div  class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.email') }}</label>
                            <div class="col-md-6">
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.password') }}</label>
                            <div class="col-md-6">                         
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label">{{ trans('messages.confirm_password') }}</label>
                            <div class="col-md-6">     
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.country') }} </label>
                            <div class="col-md-6">   
                                <span class="glyphicon form-control-feedback" ></span>
                                <select name="country" id="country"> 
                                    @foreach($countries as $country)
                                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <label class="col-md-4 control-label"> {{ trans('messages.timezone') }} </label>
                            <div class="col-md-6">
                                <span class="glyphicon form-control-feedback" ></span>
                                <select name="time_zone" id="time_zone"> 
                               
                                </select>   
                            </div>
                        </div>                     
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" id="register" class="btn btn-primary">
                                   {{ trans('messages.register') }}
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
     
//      $('#lang').change(function () {            
//            $.ajax({
//                url: "{{ url('/setLanguage')}}",
//                type: "get",
//                data: {
//                    selected_language: function () {
//                       // return $('#lang').val();  
//                       return  $('lang').find(":selected").text();
//                    }
//                },
//                success: function (response)
//                {
//                    var msg = response.msg;  
//                    //$('#lang').empty();
//                    if (msg === true) {
//                           var selectedLanguage = response.selectedLanguage;
//                           console.log(response);     
//                    }
//                }
//            });
//        });
       
          
        var form = $('#form');   
        $('#country').prepend("<option value='' selected></option>");
        
        $('#country').change(function () {
            var selected = $('#country').find(":selected").text();          
            if(selected === "")
            {
                $('#time_zone').empty();
                $("#country").parent().find('.form-control-feedback').removeClass('glyphicon-ok').removeClass('success').addClass('glyphicon-remove').addClass('error');  
                $("#time_zone").parent().find('.form-control-feedback').removeClass('glyphicon-ok').removeClass('success').addClass('glyphicon-remove').addClass('error');    
                
            }
            else{          
                  $("#country").parent().find('.form-control-feedback').removeClass('glyphicon-remove').removeClass('error').addClass('glyphicon-ok').addClass('success');
                  $("#time_zone").parent().find('.form-control-feedback').removeClass('glyphicon-remove').removeClass('error').addClass('glyphicon-ok').addClass('success');
            }
       });

        $('#country').change(function () {            
            $.ajax({
                url: "{{ url('/getTimeZones')}}",
                type: "get",
                data: {
                    selected_country: function () {
                        return  $('#country').val();
                    }
                },
                success: function (response)
                {
                    var msg = response.msg;
                    $('#time_zone').empty();
                    if (msg == true) {
                        var timeZones = response.timeZones;
                        //alert(timeZones);
                        $.each(timeZones, function (key, zone) {
                            $('#time_zone').append($("<option></option>").attr("value", zone).text(zone));
                        });

                    }
                }
            });
        });

    
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
    
        $('#register').click(function () {
            if (!form.valid())
            {
                return false;
            }
        });
        
    form.validate({
    rules: {
        name: {
        required: true,
        maxlength: 60
        },
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
            required: true,
            minlength: 6
        },
        password_confirmation: {
             required: true,
             equalTo: $('#password_confirmation').is(':empty') ? "required:true" : "#password"
        },
        country: { 
              required: true
        },
        time_zone: {
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
                name: {
                        required: " {{ trans('messages.err1') }} ",
                        maxlength: " {{ trans('messages.err2') }} "
                },
                email: {
                        required: " {{ trans('messages.err3') }} ",
                        email: " {{ trans('messages.err4') }} ",
                        maxlength: " {{ trans('messages.err5') }} ",
                        remote: " {{ trans('messages.err6') }} "
                },
                password: {
                        required: " {{ trans('messages.err7') }} ",
                        minlength: " {{ trans('messages.err8') }} "
                },
                password_comfirmation: {
                        required: " {{ trans('messages.err9') }} ",
                        equalTo: " {{ trans('messages.err10') }} "
                },
                country: {
                        required: " {{ trans('messages.err11') }} "
                },
                time_zone: {
                        required: " {{ trans('messages.err12') }} "
                }
        }
        
      
});

    });


</script>



<style>
    #time_zone, #country{
         width: 100%;
         height: 34px;
         border-radius: 4px;
         border-color: #C0C0C0;
    }
      .glyphicon-ok{
        left: 560px; 
        color: green;
    }
     .glyphicon-remove{
        left: 560px;
        color: red;
    }
</style>


@endsection
