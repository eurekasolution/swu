<?php
function connectDB() {
    $servername = "localhost"; // 데이터베이스 서버 이름
    $username = "swu"; // 데이터베이스 사용자 아이디
    $password = "1111"; // 데이터베이스 사용자 비밀번호
    $dbname = "swu"; // 데이터베이스 이름

    // MySQL 데이터베이스 연결
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Users Table</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Department</th>
                    <th>Signup Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 데이터베이스 연결
                $conn = connectDB();

                // users 테이블에서 모든 데이터 가져오기
                $sql = "SELECT id, password, name, birthdate, department, signup_datetime FROM users";
                $result = $conn->query($sql);

                // 데이터가 있는지 확인
                if ($result->num_rows > 0) {
                    // 각 행 출력
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["password"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["birthdate"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["department"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["signup_datetime"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }

                // 연결 종료
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
