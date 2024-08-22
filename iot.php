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

<div class="container mt-5">
    <h1 class="text-center mb-4">IoT Data Logger</h1>
    <div class="alert alert-success" role="alert">
        새로운 데이터가 저장되었습니다!
    </div>
</div>

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

// 온도와 습도 랜덤 생성
$hum = mt_rand(800, 900) / 10; // 80.0 ~ 90.0 사이의 실수 생성
$temp = mt_rand(300, 350) / 10; // 30.0 ~ 35.0 사이의 실수 생성

// 데이터 삽입 쿼리
$sql = "INSERT INTO iot (temp, hum, device, time) VALUES ('$temp', '$hum', '1', now())";

if ($conn->query($sql) === TRUE) {
    echo "<div class='container'><p class='text-center'>온도: $temp °C, 습도: $hum % 데이터가 성공적으로 저장되었습니다.</p></div>";
} else {
    echo "<div class='container'><p class='text-center text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
}

$conn->close();
?>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
