 <div id="columnchart_values" style="height: 300px;"></div>  
     
    <script type="text/javascript">
         google.load("visualization", "1", {packages:["corechart"]});
         google.charts.setOnLoadCallback(drawChart);
          
         $(document).ready(function(){
              drawChart();               
          });
          
          $(window).resize(function() {
                if(this.resizeTO) clearTimeout(this.resizeTO);
                this.resizeTO = setTimeout(function() {
                    $(this).trigger('resizeEnd');
                }, 100);
             });
             
              $(window).on('resizeEnd', function() {               
                drawChart();
             });
      
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
        height: 300,
      
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
             

  </script>


