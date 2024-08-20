<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>랜덤 이름 생성기</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">랜덤 이름 생성기</h1>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>순서</th>
                    <th>이름</th>
                    <th>생년월일</th>
                    <th>나이</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $name1 = "강,강,고,곽,구,권,김,김,김,김,나,남,노라,류,마,문,민,박,박,봉,서,성,손,송,신,심,안,양,염,우,유,윤,이,이,이,임,엄,차,정,정,조,진,최,최,한,하,선우,독고,사마";
                $name2 = "병,석,연,영,윤,인,정,효,성,완,재,호,다,본,진,경,계,규,근,기,대,무,상,선,수,시,영,예,우,응,종,지,진,찬,충,태,택,혁,현,형,홍,희,선,창,정,재,해,선,재,경,기,옥,지,동,민,상,순,재,종,주,혜";
                $name3 = "포,민,하,구,훈,림,주,진,훈,의,우,선,현,근,석,용,식,호,환,영,한,종,성,우,구,은,영,희,임,조,미,훈,길,호,석,나,수,규,하,란,숙,애,완,희,홍,철,은,일,태,랑,영,섭,수,국";

                $name1_arr = explode(",", $name1);
                $name2_arr = explode(",", $name2);
                $name3_arr = explode(",", $name3);

                for ($i = 1; $i <= 1000; $i++) {
                    // 랜덤하게 값을 선택
                    $n1_index = rand(0, count($name1_arr) - 1);
                    $n2_index = rand(0, count($name2_arr) - 1);
                    $n3_index = rand(0, count($name3_arr) - 1);

                    // name2와 name3의 랜덤 값이 같지 않도록 재추출
                    while ($name2_arr[$n2_index] === $name3_arr[$n3_index]) {
                        $n3_index = rand(0, count($name3_arr) - 1);
                    }

                    $name = $name1_arr[$n1_index] . $name2_arr[$n2_index] . $name3_arr[$n3_index];

                    // 생년월일 생성 (1970년 ~ 2023년 사이)
                    $birth_year = rand(1970, 2023);
                    $birth_month = rand(1, 12);
                    $birth_day = rand(1, 28); // 간단히 28일까지로 제한
                    $birthdate = sprintf("%04d-%02d-%02d", $birth_year, $birth_month, $birth_day);

                    // 나이 계산
                    $age = 2024 - $birth_year;

                    // 테이블에 데이터 출력
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . htmlspecialchars($name) . '</td>';
                    echo '<td>' . htmlspecialchars($birthdate) . '</td>';
                    echo '<td>' . htmlspecialchars($age) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
