<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

  if(isset($_POST["id"]))
  {
    echo "로그인 처리";

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    echo "id = $id, pass = $pass <br>";

    $sql = "select * from my_table where id='$id' and pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if($data)
    {
      echo "성공 : 이름 : $data[name]<br>";
    }else
    {
      echo "실패 <br>";
    }
  }

?>

  <div class="container">
    <div class="row">
      <div class="col-3">3</div>
      <div class="col-6 text-danger">6</div>
      <div class="col-3 bg-primary">3</div>
    </div>

    <form METHOD="POST" >
    <div class="row">
      <div class="col-3 text-end">ID</div>
      <div class="col-4"><input type="text" name="id" class="form-control" placeholder="아이디입력"></div>
    </div>
    <div class="row">
      <div class="col-3 text-end">PW</div>
      <div class="col-4"><input type="password" name="pass" class="form-control" placeholder="비밀번호"></div>
    </div>
    <div class="row">
      <div class="col-3 text-end"></div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-sm form-control">로그인</button>
      </div>
    </div>

    </form>
  </div>



<?php
$conn->close();
?>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
