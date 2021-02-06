<?php
  include "../db/conn.php"; 
  
  ?>
<div class="col-lg-12 col-xs-12">
  <div class="small-box bg-blue">
    <div class="inner">
      <style>
        .chart {
        width: 100%; 
        min-height: 300px;
        padding: 0;
        border-width: 1px, bold;
        }
      </style>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">    
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Element", "Ganho total deste mês R$", { role: "style" } ],
        
            <?php
          for($i = 1; $i <= 12; $i++){
                                  
             $query = "SELECT SUM(valor) FROM sgd_divida WHERE month(data_compra) = " . $i . " AND year(data_compra) = year(NOW())";
                   $result = $mysqli->query($query);
                      $row = $result->fetch_array();
          
              if ($i == 1) {
                echo '["Janeiro",'.$row[0].', "color: #01457b"],';
              }
              else if ($i == 2) {
                echo '["Fevereiro", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 3) {
                echo '["Março", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 4) {
                echo '["Abril", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 5) {
                echo '["Maio", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 6) {
                echo '["Junho", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 7) {
                echo '["Julho", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 8) {
                echo '["Agosto", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 9) {
                echo '["Setembro", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 10) {
                 echo '["Outubro", '.$row[0].', "color: #01457b"],';
              }
              else if ($i == 11) {
                echo '["Novembro", '.$row[0].', "color: #01457b"],';
              }
              else {
                echo '["Dezembro", '.$row[0].', "color: #01457b"]';
              }
                            
          }
          ?>
    
        
          ]);
          
        
          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" }
                             ,2]);
        
          var options = {
            title: "Ganho total por mês em R$",
            titleTextStyle: {
              color: '#000'
            },
            textStyle: {
                  color: "#000"
                },
            backgroundColor: "#fff",
        
            vAxis: {
                minValue: 0,
                maxValue: 4000,
                baselineColor: '#b9b9b9',
                gridlineColor: '#b9b9b9',
                textStyle: {
                  color: "#000"
                }
            },
        
            hAxis: {
                textStyle: {
                  color: "#000"
                }
            },
        
            chartArea: {
               width: '100%', 
               left: '8%',
               right: '4%'
               },
        
            bar: {groupWidth: "35%"},
            legend: { position: "none" },
            is3D: true
          };
        
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
          chart.draw(view, options);
        }
        
        $(window).resize(function(){
        drawChart();
        });
      </script>
      <div id="columnchart_values" class="chart"></div>
      <div class="icon" style="z-index: 1000;margin-bottom: 140px;margin-right: 10px;">
        <i class="ion ion-arrow-graph-up-left"></i>
      </div>
    </div>
  </div>
</div>