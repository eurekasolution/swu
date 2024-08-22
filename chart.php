<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '재학생', '휴학생', '졸업생'],
          ['2004',  1000,      400,     450],
          ['2005',  1170,      460,     600],
          ['2006',  660,       1120,    750],
          ['2007',  1030,      540,     180]
        ]);

        var options = {
          title: '컴퓨터 전공자 현상',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('swuchart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="swuchart" style="width: 100%; height: 800px"></div>
  </body>
</html>
