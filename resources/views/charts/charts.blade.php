@extends('app')

@section('content')

         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
                
          google.load("visualization", "1", {packages:["imagebarchart, geochart"]});         
          google.charts.setOnLoadCallback(drawRegionsMap);      
          
         $(document).ready(function(){
                     
              $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd'}).datepicker("setDate", '{{ $startDate }}');
              $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd'}).datepicker("setDate", '{{ $finalDate }}');
         
//             drawAll(); 
             $('#datepicker1, #datepicker2').change(function () {
                draw();
            });
             $("#panel2").click(function() {
//                 drawRegionsMap(); 
                    setTimeout(drawRegionsMap, 500);
                 
               }); 
            
          });
      
               function resizeCharts(){
                    // redraw charts, dashboards, etc here
                    draw();
                    drawRegionsMap();
                }
                $(window).resize(function () {
                    if (this.resizeTO)
                        clearTimeout(this.resizeTO);
                        this.resizeTO =$(this).trigger('resizeEnd');
                });
                
                $(window).resize(resizeCharts);
                    
                
              
     
                  
               function drawAll()
               {
                    drawRegionsMap();
                    draw();   
               }
                    
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
                                    chart.draw(data, {title: "Count of articles per day", height: 150, min: 0});
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
                data2.push(["Dates", '']); 
                var arr = [];
                for (i in data)
                {
                    arr.push([i,data[i]]);
                }
                var chart_data = data2.concat(arr);
                return chart_data;
             }
                       
              function drawRegionsMap()
              {
                var data = google.visualization.arrayToDataTable([
                  ['Country','Count of registered users'],
                  @foreach ( $countries as $key=>$value)
                      ['{{ $key }}', Math.floor('{{ $value }}')],
                  @endforeach
                ]);
                              
                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                var options = {
                    chartArea: {width: "90%", height: "80%", backgroundColor: '#EBEEF3' },
                };
                chart.draw(data,options);
             }
             

 
  </script>
        
        <div class="container-fluid">
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div id="panel1" class="panel-heading" data-toggle="collapse" data-target="#body1"> {{ trans('messages.articles_per_day') }}</div>
				<div class="panel-body" class="collapse" id="body1" hidden>
                                     <div class="labels">
                                        <p>{{ trans('messages.start_date') }} <input name="start" type="text" class="datepicker" id="datepicker1"></p>
                                        <p>{{ trans('messages.final_date') }}  <input name="final" type="text" class="datepicker" id="datepicker2"></p>
                                    </div>
                                    
                                        <div id="chart_div" style="height: 230px; padding-right: 3px" ></div> 
                                    
				</div>
			</div>
		</div>
                <div class="col-lg-4 col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div id="panel2" class="panel-heading" data-toggle="collapse" data-target="#body2"> {{ trans('messages.geo_charts') }} </div>
				<div class="panel-body" class="collapse" id="body2" hidden>                                   
                                        <div id="regions_div"  style="width:100%; height:300px; margin:auto;" ></div>
                                   
				</div>
			</div>
		</div>
               <div class="col-lg-4  col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading" data-toggle="collapse" data-target="#body3" > {{ trans('messages.articles_of_user') }} </div>
				<div class="panel-body" class="collapse" id="body3" hidden>
                                        @include('partials.chart')                                        
				</div>
			</div>
		</div>
	</div>
</div>
 

  

 @endsection
 
 