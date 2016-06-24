@extends('app')

@section('content')
  
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country'],
          @foreach ($countries as $country)
              ['{{ $country }}'],
          @endforeach
        ]);

        var options = {width: 3000};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
 @endsection