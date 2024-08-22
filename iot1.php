<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Data Logger</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // 3초마다 페이지를 새로고침
        setTimeout(function(){
            window.location.reload(1);
        }, 3000);
    </script>
</head>
<body>


<?php
function connectDB() {
    $servername = "localhost";
    $dbname = "swu";
    $dbuser = "swu";
    $dbpass = "1111";

    // MySQL 연결
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$conn = connectDB();
?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['시간', '온도', '습도'],

          <?php
            $sql = "select * from iot where device='1' order by idx asc";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            while($data)
            {
                echo "[ '$data[time]', $data[temp], $data[hum]  ], ";
                $data = mysqli_fetch_array($result);
            }

          ?>

        ]);

        var options = {
          title: '온도, 습도',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('swuchart'));

        chart.draw(data, options);
      }
    </script>


    <div id="swuchart" style="width: 100%; height: 600px"></div>


<?php
$conn->close();
?>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
