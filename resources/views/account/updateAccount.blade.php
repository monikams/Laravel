@extends('app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.update_profile') }}</div>
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
                    
                       
                    <form id="updateForm" class="form-horizontal" role="form" method="POST" action="{{ url('/account/updateAccount') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div  class="form-group  has-feedback">
                            <label class="col-md-4 control-label">{{ trans('messages.name') }} </label>
                            <div class="col-md-6">
                                <span class="glyphicon form-control-feedback" ></span>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
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
                                <button id="account" type="submit" name="submit" class="btn btn-primary">
                                   {{ trans('messages.update_profile') }}
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
                     
        var form = $('#updateForm'); 
        var old_name = '{{ $old_name }}';
        $("#name").val(old_name);
        
        $('#country').prepend("<option value='{{ $old_country }}' selected>{{ $old_country }}</option>");
        $('#time_zone').prepend("<option value='{{ $old_time_zone }}' selected>{{ $old_time_zone }}</option>");
        
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
    
        $('#account').click(function () {
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
        left: 80%;
        color: green;
    }
     .glyphicon-remove{
        left: 80%;
        color: red;
    }
</style>


@endsection
