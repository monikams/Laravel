@extends('app')

@section('content')
    
    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>    

    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var colors = ['color:blue', 'color:red', 'color:green', 'color:maroon'];
      var data = google.visualization.arrayToDataTable([
        ['Username', 'Articles', { role: "style" } ],
        @foreach ($info as $key=>$value)
              ['{{ $key }}', Math.floor('{{ $value }}'), colors.shift()],
        @endforeach        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Count of articles per user",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
 @endsection