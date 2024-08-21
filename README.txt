수원대학교 SQL 데이터분석 과정

==============================================================================

1. 테이블 목록 보기
    SHOW TABLES;

2. 테이블의 구조 보기 

    DESC <테이블이름>
    DESC fake;


CREATE TABLE fake (
    idx     int(10) auto_increment primary key,
    name    char(30) not null,
    birth   date,
    age     int
);
3. 테이블 구조 변경 (추가, 변경,  삭제)
    idx, name, birth, age

    [추가] 기본은 맨 뒤에 추가

    ALTER TABLE 테이블이름 ADD <새로 정의> AFTER 위치

    ALTER TABLE fake  ADD id char(20) AFTER name;

    [변경] id -> userid , char(20) -> varchar(30)

    ALTER TABLE 테이블이름 CHANGE 필명 <새로 정의>

    ALTER TABLE fake CHANGE id userid varchar(30);

    [삭제] 유의 사항 

    일반적인 질의(Query)에서 삭제 => DELETE 
    데이터베이스를 삭제, 테이블 삭제 ==> DROP

    ALTER TABLE DROP 필드명
    ALTER TABLE DROP userid;


==============================================================================
다음과 같은 조건의 PHP 프로그램을 만들고 싶어. 프로그램을 제안해 줘.
- HTML5와 Bootstrap5를 이용
$name1 = "강,강,고,곽,구,권,김,김,김,김,나,남,노라,류,마,문,민,박,박,봉,서,성,손,송,신,심,안,양,염,우,유,윤,이,이,이,임,
                           엄,차,정,정,조,진,최,최,한,하,선우,독고,사마";
$name2 = "병,석,연,영,윤,인,정,효,성,완,재,호,다,본,진,경,계,규,근,기,대,무,상,선,수,시,영,예,우,응,종,지,진,찬,충,태,택,
                          혁,현,형,홍,희,선,창,정,재,해,선,재,경,기,옥,지,동,민,상,순,재,종,주,혜";
$name3 = "포,민,하,구,훈,림,주,진,훈,의,우,선,현,근,석,용,식,호,환,영,한,종,성,우,구,은,영,희,임,조,미,훈,길,호,석,나,수,
                          규,하,란,숙,애,완,희,홍,철,은,일,태,랑,영,섭,수,국";
- $name1, $name2, $name3을 각각 콤마(,) 단위로 조각내 배열로 처리
- $name1, $name2, $name3의 조각난 배열에서 랜덤값을 추출해 한 글자씩 추출
- 만약 세 값이 모두 0번째 값인 경우 "강병포"를 이름으로 선택
- 결과를 테이블 형태로 출력. class="table table-bordered"
- 테이블의 순서는 순서, 이름, 생년월일, 나이
- 생년월일은 1970년 ~ 2023년까지 랜덤하게 결정.
- 나이는 올해 2024에서 생년을 뺀 값
- 생성할 데이터 수는 1000개
- $name2와 $name3에서 랜덤하게 추출한 값이 같지 않아야 함.


순서	이름	생년월일	나이

CREATE TABLE fake (
    idx     int(10) auto_increment primary key,
    name    char(30) not null,
    birth   date,
    age     int
);



$max = 100;

$dice = array();

for($i=1; $i<=$max ; $i++)
{
    $rand = rand(1, 6); // 3
    $dice[$rand] ++;
}

for($i=1; $i<=6; $i++)
{
    echo $dice[$i] . "<br>";
}


[Q] 다음과 같은 03.php 프로그램을 하나  만들어줘.
- HTML5와 Bootstrap5를 이용
- <form>을 만드는데 입력값은 다음과 같다.
   - <input type="number" name="datacount" min="100" max="100000" step="100">
   - 실행 버튼
- 실행버튼을 누르면 다음과 같이 동작함
  - datacount만큼 테이블 형태의 데이터를 만든다. 
  - 순서, 이름, 생년월일, 출신학교를 출력한다.
  - 순서는 1부터 순차적으로 증가
  - 생년월일은 1900년부터 2000년 사이의 랜덤 날짜
  - 이름 : 운동선수 이름
  - 출신학교 : 서울대, 수원대, 제주대, 경상대, 전라대, 강원대 중 랜덤하게 선택


http://localhost/02.php

lotto[0] = 1;
lotto[1] = 2;
...
lotto[10] = 33;

dict["apple"] = "사과";
dict["desk"] = "책상";

연관배열 , associative array

[Q] 

PHP와 MySQL을 연동해서 다음의 조건에 맞는 코드를 만들어줘.
- HTML5와 BootStrap5를 이용
- $conn = connectDB() 함수를 생성
- 데이터베이스 이름 : swu
- 사용자 아이디 : swu
- 비밀번호 : 1111

HTML의 Header에는 Bootstrap5포함
users의 모든 항목을 테이블 형태로 출력해줘.


$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_arary($result);


1. DB -> TABLE -> INSERT -> SELECT

    SELECT 필드1, 필드2, .... FROM 테이블 WHERE 조건

    SELECT id, name FROM users WHERE birthdate > '2000-01-01';

    SELECT * FROM users ORDER BY birthdate ASC, name DESC;




CREATE TABLE mytable ( 
    -- 주석처리
    id  CHAR(30) UNIQUE,
    name    VARCHAR(30),
    pass    VARCHAR(255),
    birth   DATE,
    memo    TEXT,
    regist  DATETIME
);

INSERT INTO mytable (id, name, pass, birth, memo, regist) 
            VALUES ('test', '테스트', '1111', '2000-01-01', '메모테스트', now() );

정보통신보호법 비밀번호의 날데이터(Raw Data) 직접볼 수 있으면 불법


CREATE TABLE users (
    id VARCHAR(20) PRIMARY KEY,               -- 아이디 (최대 20자, 기본 키, 고유해야 함)
    password VARCHAR(255) NOT NULL,           -- 비밀번호 (암호화된 상태로 저장)
    name VARCHAR(100) NOT NULL,               -- 이름 (필수 입력)
    birthdate DATE,                           -- 생년월일 (YYYY-MM-DD 형식)
    department VARCHAR(100),                  -- 학과 (선택 입력)
    signup_datetime DATETIME DEFAULT CURRENT_TIMESTAMP -- 가입일 및 시간 (자동으로 현재 시간 설정)
);

<<<<<<< HEAD
다음과 같이 테이블이 정의되어 있어. 
CREATE TABLE users (
    id VARCHAR(20) PRIMARY KEY,               -- 아이디 (최대 20자, 기본 키, 고유해야 함)
    password VARCHAR(255) NOT NULL,           -- 비밀번호 (암호화된 상태로 저장)
    name VARCHAR(100) NOT NULL,               -- 이름 (필수 입력)
    birthdate DATE,                           -- 생년월일 (YYYY-MM-DD 형식)
    department VARCHAR(100),                  -- 학과 (선택 입력)
    signup_datetime DATETIME DEFAULT CURRENT_TIMESTAMP -- 가입일 및 시간 (자동으로 현재 시간 설정)
);

이 때 다음의 조건에 맞는 데이터 입력 스크립트 20개를 만들어 줘.
- id : 영문 5~10글자이의 무작위 영문 소문자.
- name : 역사 인물
- 비밀번호 : 무작위
- 생년월일은 1980년부터 2010년까지의 무작위 수
- 학과는 컴퓨터, 전자, 전기 중 하나
- signup_datetime는 now()


INSERT INTO users (id, password, name, birthdate, department, signup_datetime) VALUES
('aeijw', 'password1', '이순신', '1995-07-15', '컴퓨터', NOW()),
('xzyqsl', 'password2', '세종대왕', '1984-12-03', '전자', NOW()),
('plwqtk', 'password3', '강감찬', '2001-02-21', '전기', NOW()),
('bwxei', 'password4', '김유신', '1987-10-08', '컴퓨터', NOW()),
('nmkiue', 'password5', '장보고', '1993-05-17', '전자', NOW()),
('qpltz', 'password6', '을지문덕', '2008-09-14', '전기', NOW()),
('zkmivn', 'password7', '연개소문', '1990-11-26', '컴퓨터', NOW()),
('trpqxm', 'password8', '윤봉길', '1983-01-12', '전자', NOW()),
('vlkqe', 'password9', '안중근', '2010-06-22', '전기', NOW()),
('abshqi', 'password10', '김구', '1997-03-30', '컴퓨터', NOW()),
('qwpdlk', 'password11', '유관순', '2003-08-11', '전자', NOW()),
('xmpiue', 'password12', '신사임당', '1989-04-05', '전기', NOW()),
('trszmk', 'password13', '정약용', '2015-12-19', '컴퓨터', NOW()),
('lzwrke', 'password14', '최영', '2000-02-08', '전자', NOW()),
('qwpels', 'password15', '이성계', '1988-07-27', '전기', NOW()),
('bqxelt', 'password16', '박정희', '1999-10-10', '컴퓨터', NOW()),
('zxwepm', 'password17', '김대중', '2012-05-13', '전자', NOW()),
('vlpwqt', 'password18', '노무현', '1985-03-09', '전기', NOW()),
('wqtxms', 'password19', '김일성', '2006-11-04', '컴퓨터', NOW()),
('mzxwel', 'password20', '김정일', '1992-06-28', '전자', NOW());

SELECT * FROM users;
SELECT name, id, department  from users;
SELECT department, COUNT(*) FROM users GROUP BY department;
SELECT * from users where name LIKE '김%' WHERE department='컴퓨터' ORDER BY name ASC;

UPDATE users SET name='홍길동';

=======


>>>>>>> 44a8ff98ac567ffdc704f22acd6be1b7ee3442b9
[Q]
다음과 같은 작업을 위한 데이터베이스 명령을 알려줘.
데이터베이스 이름 :  mydb
데이터베이스 사용자 : myuser
비밀번호 : mypass
- mydb를 사용 가능한 id : myuser
- myuser는 모든 권한을 가짐
- localhost에서 접속 허용

CREATE USER 'myuser'@'localhost' IDENTIFIED BY 'mypass';
GRANT ALL PRIVILEGES ON mydb.* TO 'myuser'@'localhost';
FLUSH PRIVILEGES;

Apache, MySQL 실행후 항상 다음에 접속

http://localhost/phpmyadmin

DB : swu
ID : swu
PW : 1111

create table first (
    id  char(20),
    name char(20)
);

insert into first (id, name) values('test', '테스트');
insert into first (id, name) values('admin', '관리자');
insert into first (id, name) values('sslee', '이순신');
insert into first (id, name) values('kwang', '광개토');

환경설정 확인 완료(한글 깨짐을 확인)

[Excel]

순서	이름	생년월일	지역
1	이순신	1995-07-15	서울
2	세종대왕	1984-12-03	경기
3	강감찬	2001-02-21	충청
4	김유신	1987-10-08	서울
5	장보고	1993-05-17	경기
6	을지문덕	2008-09-14	충청
7	연개소문	1990-11-26	서울
8	윤봉길	1983-01-12	경기
9	안중근	2010-06-22	충청
10	김구	1997-03-30	서울
11	유관순	2003-08-11	경기
12	신사임당	1989-04-05	충청
13	정약용	2015-12-19	서울
14	최영	2000-02-08	경기
15	이성계	1988-07-27	충청
16	박정희	1999-10-10	서울
17	김대중	2012-05-13	경기
18	노무현	1985-03-09	충청
19	김일성	2006-11-04	서울
20	김정일	1992-06-28	경기



[Q2] 다음 조건의 C언어 예제를 만들어줘.
- 사용자부터로 게임수를 입력받는다.
- 게임수 만큼 다음을 반복
- 1부터 45까지의 무작수를 발생
- 생성된 번호는 중복되지 않아야 함.
- 오름차순으로 결과를 정렬
- 각 숫자의 출력은 %02d 형태로 출력
- 출력후, 현재 시간을 출력
[Q1] C언어로 로또 번호를 추출하는 프로그램을 만들어줘.

[1] 수업전 설명

    수업중 생성되는 코드, ChatGPT에 대한 질문을 이곳에 함께 공유합니다.
    다음의 링크를 수시로 확인합니다.
    혹시 중간에 코드를 따라오지 못한 경우 "commit(커밋) 해주세요" 라고 쪽지를 보내면 바로 커밋해 드립니다.

    https://github.com/eurekasolution/swu

    강의의 주목적은 MySQL 중심의 데이터베이스 전반에 대한 내용을 다루지만,
    SQL Query만 사용하면 실제 프로그래밍에 활용하지 못하는 경우가 많이 있습니다.
    이를 실제 프로그램에 적용할 때는 편의상 웹프로그래밍 중 PHP를 활용합니다.
    PHP를 전혀 몰라도 수업 이해에는 전혀 문제가 되지 않습니다.
    PHP를 배우는 것이 목적이 아니라 MySQL을 어떻게 적용하는지 확인하는 것이 목적입니다.
    이를 위해 ChatGPT를 적극 활용할 예정입니다.

    XAMPP가 C:/xampp 에 설치되었다고 가정할 때 MySQL이 정상적으로 실행되지 않는 경우는
    이전에 MySQL이 설치되어 동작하고 있는 경우입니다.
    MySQL을 중지시켜야하는데 다음과 같이 진행하면 됩니다.

    1. 화면하단 왼쪽 윈도우버튼 옆의 검색창에 다음을 입력 : cmd
    2. 검정 화면에서 다음을 입력합니다.
        netstat -ano |  findstr :3306

        맨 오른쪽에 있는 숫자가 프로세스 ID (PID = 12345로 가정)입니다.
        taskkill /PID 12345 /F
    3. 종료 메시지를 확인합니다.

        성공: 프로세스(PID 12345)가 종료되었습니다.
    
    4. MySQL을 Start를 실행합니다.