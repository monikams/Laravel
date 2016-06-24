@extends('app')

@section('content')
    <div id="form">
        <div class="labels">
            <p>{{ trans('messages.start_date') }} <input name="start" type="text" class="datepicker" id="datepicker1"></p>
            <p>{{ trans('messages.final_date') }}  <input name="final" type="text" class="datepicker" id="datepicker2"></p>
        </div>
        <div id="chart_div" style="width: 400px; height: 240px;"></div>
    </div>    
    <style>
        .labels{
           margin-left: 43%;
           padding-top: 20px;
        }
        #chart_div{
           margin-left: 40%;
           padding-top: 20px;
        }
    </style>
    <script type="text/javascript">
          google.load("visualization", "1", {packages:["imagebarchart"]});
        
         $(document).ready(function(){
              $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd'}).datepicker("setDate", '{{ $startDate }}');
              $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd'}).datepicker("setDate", '{{ $finalDate }}');
              draw(); //to draw the chart for first time
             $('#datepicker1, #datepicker2').change(function () {
                draw();
            });                           
            
            var form = $('#form'); 
            console.log(form);
            var start = $('#datepicker1').val();
            var final = $('#datepicker2').val(); 
            
//            alert(start);

             $.validator.addMethod('daterange', function(value, element) {
                if (this.optional(element)) {
                    return true;
                }

                var startDate = Date.parse('2010-11-29'),
                    endDate = Date.parse('2010-12-15'),
                    enteredDate = Date.parse(value);

                if (isNan(enteredDate)) {
                    return false;
                }

                return ((startDate <= enteredDate) && (enteredDate <= endDate));
            });
            
            
             $('#datepicker1, #datepicker2').change(function () {
                if (!form.valid())
                {
                    alert(1);
                    return false;
                }
           });
                
            
            form.validate({
                rules: {                
                    start: {
                        required: true                   
                    },
                    final: {
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
                            
                            start: {
                                    required: " {{ trans('messages.err13') }} "                                  
                            },
                            final: {
                                    required: " {{ trans('messages.err14') }} "                                  
                            }                        
                    }


               });
        });
        
        
      
        
        function draw()
        {
            var start_date = $('#datepicker1').val();
            var final_date = $('#datepicker2').val(); 
                $.ajax({
                     url: "{{ url('/charts/articlesPerDay') }}",
                     dataType: "json",
                     type: "get",
                     data:   { start_date: start_date, final_date: final_date},
                     success: function (response)
                     {
                            var msg = response.msg;
                            if (msg == true) {
                                
                            var info = response.info;

                            var chart_data = jsonToArray(info);

                            var data = google.visualization.arrayToDataTable(chart_data);

                            var chart = new google.visualization.ImageBarChart(document.getElementById('chart_div'));

                            chart.draw(data, {width: 400, height: 240, min: 0});
  
                            } 
                     }
                 });
          }
                
               
    
             function jsonToArray(info)
             {                     
                
                var keys = Object.keys(info);
                
                var values = Object.keys(info).map(function (key) {return info[key]});
             
                var data = [];
                for (i = 0; i < keys.length; i++) {
                     data[keys[i]] = values[i]
                }
 
                var data2 = [];
                data2.push(["Dates", '{{ trans('messages.articles') }}']); 

                var arr = [];
                for (i in data)
                {
                    arr.push([i,data[i]]);
                }

                var chart_data = data2.concat(arr);
                
                return chart_data;
             }
             
             
         
              
             
       
  
  </script>
 @endsection
