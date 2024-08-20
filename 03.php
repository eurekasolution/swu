<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>데이터 생성기</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">데이터 생성기</h1>

        <form method="POST" class="mb-5">
            <div class="mb-3">
                <label for="datacount" class="form-label">데이터 수:</label>
                <input type="number" id="datacount" name="datacount" class="form-control" min="100" max="100000" step="100" required>
            </div>
            <button type="submit" class="btn btn-primary">실행</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datacount = intval($_POST["datacount"]);

            // 이름 배열 (운동선수 이름)
            $names = ["손흥민", "박지성", "이동국", "김연아", "이상화", "박태환", "류현진", "추신수", "박찬호", "양준혁"];

            // 출신학교 배열
            $schools = ["서울대", "수원대", "제주대", "경상대", "전라대", "강원대"];

            echo '<table class="table table-striped table-bordered">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>순서</th>';
            echo '<th>이름</th>';
            echo '<th>생년월일</th>';
            echo '<th>출신학교</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            for ($i = 1; $i <= $datacount; $i++) {
                $name = $names[array_rand($names)];
                $school = $schools[array_rand($schools)];
                $birthdate = date("Y-m-d", rand(strtotime("1900-01-01"), strtotime("2000-12-31")));

                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . htmlspecialchars($name) . '</td>';
                echo '<td>' . htmlspecialchars($birthdate) . '</td>';
                echo '<td>' . htmlspecialchars($school) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }
        ?>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
