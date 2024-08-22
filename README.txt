수원대학교 SQL 데이터분석 과정
==============================================================================
Day 3
==============================================================================

시작할 때는 C:/xampp/xampp_contro.exe 파일을 실행해
Apache와 MySQL을 실행시켜야 합니다.

CREATE TABLE test_table (
    idx     int     auto_increment primary key,
    name    VARCHAR(20),
    -- 추가
    INDEX idx_name(name)
);

테이블이 만들어진 상태에서 추가
CREATE INDEX idx_name ON test_table(name);


INSERT INTO test_table (name) VALUES ('홍길동');
INSERT INTO test_table (name) VALUES ('이순신');

인덱스를 확인

    SHOW INDEX FROM test_table;


    SELECT * FROM fake_table;

    기억하라.
    1. 데이터의 양이 늘어나면 검색속도가 지수적으로 증가.
    2. H/W의 영향을 받는다.

N-gram, Deep Learning

    수원대학교
    1 UNI-gram : 수, 원, 대, 학, 교 (5)
    2 BI-gram : 수원, 원대, 대학, 학교(4)
    3 Tri-gram : 수원대, 원대하, 대학교(3)
    4 4-gram : 수원대학, 원대학교(2)
    5 5-gram : 수원대학교(1)

    5 * 6 / 2 = 15

    동해물과 백두산이 마르고 닳도록 ..     ( 사전데이터 : 60만개 )



    핵심 : 데이터베이스는 파일 시스템이다 ==> 느리다 ==> 병목지점

    XML ==> JSON ( JavaScript Object Notation)

    key : value

    객체 { }, 배열 []

    Case 1 : 사람을 표현

    { 
        "name":"홍길동",
        "age" : 22,
        "company" : "수원대학교"
    }

    Case 2 : 객체내부에 객체를 포함하는 경우

    { 
        "name":"홍길동",
        "age" : 22,
        "company" : {
            "name" : "수원대학교",
            "url" : "https://suwon.ac.kr"
        }
    }

    Case 3 : 객체가 객체만 포함

    { 
        "person" : { 
            "name": "홍길동",
            "age" : 22,
            "mobile": "010-1234-5678"
        },
        "company" : {
            "name" : "수원대학교",
            "url" : "https://suwon.ac.kr"
        }
    }    

    Case 3 : 배열 데이터

    { 
        "employee" : [ 
            {
                "name" : "홍길동",
                "age" : 22
            }, 
            {
                "name" : "이순신",
                "age" : 45
            },
            {
                "name" : "을지문덕",
                "age" : 56
            }
        ],

        "employer": [ 
            { 
                "company" : "수원대학교"
            }, 
            { 
                "company" : "단국대학교"
            }
        ]
    }  

    Case 4: 활용 예 (인물관계)

    {
        "nodes" : [
            {
                "name": "홍길동"
            }, 
            {
                "name": "홍대감"
            }, 
            {
                "name": "정약용"
            }, 
            {
                "name" : "추사"
            }, 
            {
                "name" : "정약전
            }
        ],
        "links" : [
            {
                "source": "홍길동",
                "target": "홍대감",
                "relation": "부자"
            }, 
            {
                "source": "홍길동",
                "target": "정약용",
                "relation": "친구"
            },
            {
                "source": "정약용",
                "target": "추사",
                "relation": "사제"
            },
            {
                "source": "정약용",
                "target": "정약전",
                "relation": "형제"
            }

        ]
    }

    온도/습도.

    CREATE TABLE iot (
        idx     int AUTO_INCREMENT primary key,
        temp    float   default '0.0',
        hum     float   default '0.0',
        device  int     default '1',
        time    datetime
    );


    300 - 350 /10


    SQL Injection : 

    id : test
    pass : 1234

    $id = "test";  // xxx' OR 2>1 -- 
    $pass = "1234"; // 

    $sql = "SELECT * FROM users where id='$id' and pass='$pass' ";
    $sql = "SELECT * FROM users where id='xxxx' OR 2>1 -- ' and pass=''


    CREATE TABLE my_table (
        idx     int     auto_increment primary key,
        id      varchar(20) UNIQUE,
        name    varchar(20),
        pass    varchar(255)
    );

    INSERT INTO my_table (id, name, pass) VALUES('test', '테스트', '1111');
    INSERT INTO my_table (id, name, pass) VALUES('admin', '관리자', '1111');


    mysql -u swu swu -p

    mysqldump -u 아이디 데이터베이스이름 -p > 저장할파일이름

    mysqldump -u swu swu -p > swu-2024-08-22-1600.db.sql


[PORTTING]

    SERVER : test.com (Linux)

    옮길파일 : 작업한 php, htm 파일
                dump 파일


            
document.getElementById('swuchart')
docuent.queryString("#swuchart");
$(#swuchart)

 jQuery + Ajaxt


==============================================================================
Day 2
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
    * 데이터베이스를 삭제, 테이블 삭제 ==> DROP

    ALTER TABLE DROP 필드명
    ALTER TABLE DROP userid;

4. 테이블 이름 변경 ==> 오타, 명확하게 변경

    문법 : RENAME TABLE 옛날이름 TO 새이름;

    fake => fake_table

    RENAME TABLE fake TO fake_table;


    users 테이블

    myusers

    config 파일

    $users = "users";
    // $users = "myuser";

    프로그램 코드 $sql = "select * from $users ");

    테이블 이름을 변수화하면 유지보수가 편하다.
    테이블 이름을 지을때는 snake 표기법으로 하는 것이 원칙.

    윈도우에서 개발 ==> 리눅스 포팅
    my_user, MyUser

5. 테이블 삭제

    dummy , id, pass ==> test , 1111

    CREATE TABLE dummy(
        id  varchar(20),
        pass varchar(255)
    );

    password()

    INSERT INTO dummy (id, pass) VALUES('test', password('1111'));
    INSERT INTO dummy (id, pass) VALUES('test1', password('abcd'));

    삭제(테이블)
    문법 : DROP TABLE 테이블이름;

    DROP TABLe dummy;


6. 데이터베이스의 목록

    SHOW DATABASES;

    SHOW CREATE DATABASE 테이터베이스이름;

    SHOW CREATE DATABASE swu; -- 문자셋을 확인하거나, 파일시스템을 확인할 때 사용.

    cf. 파일시스템 : MyISAM, InnoDB, ISAM

    **** : aaaa ~ zzzz, 0000 ~9999 , aa00 ~ zz99

    DB삭제 : DROP

    DROP DATABASE 데이터베이스이름;


    SELECT DATABASE();  --- 이름() , 함수

    $sql = "select name, birth, CONCAT(name, bith) AS namebirth from fake_table;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    while($data)
    {
        //name,  CONCAT(name, bith)
        echo "$name $data[namebirth]<br>"; // echo $name . "<br>";
        $data = mysqli_fetch_array($result);
    }

    Alias name : AS 별명

    부분문자열 추출 : Substring() // C: substr()

    SELECT SUBSTRING('abcde', 시작번호, 글자수); // 1부터 센다. 

    SELECT SUBSTING('abcde', 2, 3);
    SELECT name, SUBSTRING(birth, 1, 4) AS year FROM fake_table;
    LENGTH(문자열); // 한글은 3바이트
    LEFT(문자열, 글자수);

    SELECT name, LENGTH(name) as namelen, LEFT(name, 1) as first from fake_table;

    Date('y-m-d') // 24-08-21

    SELECT DATE_ADD(now(), INTERVAL 12 DAY)

    SELECT DATE_ADD(now(), INTERVAL 2 MONTH); 
    -- 단위 : DAY, MONTH, YEAR, HOUR, ..

    은행이자 계산 : 2024-01-01 , 오늘까지 며칠이 지났는지..

    SELECT DATEDIFF(now(), birth) as diff from fake_table;
    SELECT DATEDIFF(birth, now()) as diff from fake_table;
    SELECT birth, name, DATEDIFF(birth, now()) as diff from fake_table;
    SELECT birth, name, ABS(DATEDIFF(birth, now())) as diff from fake_table;

    2000년 이후 출생자의 수

    SELECT COUNT(*) AS cnt FROM fake_table WHERE birth>='2000-01-01';

    2000 이전 : old, 이후 : young

    SELECT name, birth, IF(birth < '2000-01-01' , 'old', 'young') AS textold FROM fake_table;

    데이터 암호화

    SELECT '1111', password('1111'), md5('1111');


[부서, 직원 테이블 2개를 만들자]

부서 - 부서이름

CREATE TABLE department (
    idx int AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY(idx)  
);

CREATE TABLE department (
    idx int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

    // 컴퓨터, 전기, 전자, 건축

    INSERT INTO department (name) VALUES ('컴퓨터');
    INSERT INTO department (name) VALUES ('전기');
    INSERT INTO department (name) VALUES ('삭제할 학과');
    INSERT INTO department (name) VALUES ('전자');
    INSERT INTO department (name) VALUES ('건축');
    INSERT INTO department (name) VALUES ('환경');

    UPDATE 테이블명 SET 필드1='새값1', 필드2='새값2' .... WHERE 조건;

    UPDATE department SET name='테스트' WHERE idx='3';

    DELETE FROM 테이블명 WHERE 조건;

    DELETE FROM department WHERE idx='3';

    INSERT INTO department (name) VALUES ('기계');
    DELETE FROM department WHERE idx>='4' and idx<'6';

    [직원] 키값 idx, name, didx

    CREATE TABLE employee (
        idx INT     AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20),
        didx INT,
        FOREIGN KEY (didx) REFERENCES department(idx) 
        ON DELETE CASCADE

    );

    INSERT INTO employee (name, didx) VALUES('홍길동', '1');
    INSERT INTO employee (name, didx) VALUES('이순신', '2');
    INSERT INTO employee (name, didx) VALUES('유관순', '9');
    INSERT INTO employee (name, didx) VALUES('안중근', '1');
    INSERT INTO employee (name, didx) VALUES('사임당', '9');


    drop table department;
    drop table employee;


-- 부서 테이블에 데이터 삽입
INSERT INTO department (name) VALUES ('컴퓨터');
INSERT INTO department (name) VALUES ('전기');
INSERT INTO department (name) VALUES ('전자');
INSERT INTO department (name) VALUES ('기계');
INSERT INTO department (name) VALUES ('금속');
INSERT INTO department (name) VALUES ('환경');

-- 각 부서에 직원 데이터 삽입
INSERT INTO employee (name, didx) VALUES ('이순신', (SELECT idx FROM department WHERE name='컴퓨터'));
INSERT INTO employee (name, didx) VALUES ('세종대왕', (SELECT idx FROM department WHERE name='컴퓨터'));
INSERT INTO employee (name, didx) VALUES ('안중근', (SELECT idx FROM department WHERE name='컴퓨터'));

INSERT INTO employee (name, didx) VALUES ('장영실', (SELECT idx FROM department WHERE name='전기'));
INSERT INTO employee (name, didx) VALUES ('김구', (SELECT idx FROM department WHERE name='전기'));
INSERT INTO employee (name, didx) VALUES ('유관순', (SELECT idx FROM department WHERE name='전기'));

INSERT INTO employee (name, didx) VALUES ('이성계', (SELECT idx FROM department WHERE name='전자'));
INSERT INTO employee (name, didx) VALUES ('강감찬', (SELECT idx FROM department WHERE name='전자'));
INSERT INTO employee (name, didx) VALUES ('박지성', (SELECT idx FROM department WHERE name='전자'));

INSERT INTO employee (name, didx) VALUES ('이방원', (SELECT idx FROM department WHERE name='기계'));
INSERT INTO employee (name, didx) VALUES ('을지문덕', (SELECT idx FROM department WHERE name='기계'));
INSERT INTO employee (name, didx) VALUES ('김유신', (SELECT idx FROM department WHERE name='기계'));

INSERT INTO employee (name, didx) VALUES ('윤봉길', (SELECT idx FROM department WHERE name='금속'));
INSERT INTO employee (name, didx) VALUES ('신사임당', (SELECT idx FROM department WHERE name='금속'));
INSERT INTO employee (name, didx) VALUES ('정약용', (SELECT idx FROM department WHERE name='금속'));

INSERT INTO employee (name, didx) VALUES ('허준', (SELECT idx FROM department WHERE name='환경'));
INSERT INTO employee (name, didx) VALUES ('최영', (SELECT idx FROM department WHERE name='환경'));
INSERT INTO employee (name, didx) VALUES ('이황', (SELECT idx FROM department WHERE name='환경'));


CREATE TABLE dept (
    idx     int auto_increment primary key,
    name    varchar(30),
    major   varchar(30),
    age     int default '20'
);

이런 테이블이 정의되어있을 때 데이터 30개를 다음 조건에 맞게 생성하는 스크립트를 만들어줘.

- name : 역사 인물로 선택
- major : 컴퓨터,전기,전자,기계,환경 중 하나를 랜덤하게 선택
- age : 20-25사이에 랜던한 값 생성


-- 랜덤한 데이터 생성 및 삽입
INSERT INTO dept (name, major, age) VALUES ('이순신', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('세종대왕', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('안중근', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('장영실', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('김구', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('유관순', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이성계', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('강감찬', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('박지성', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이방원', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('을지문덕', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('김유신', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('윤봉길', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('신사임당', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('정약용', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('허준', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('최영', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이황', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이순신', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('세종대왕', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('안중근', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('장영실', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('김구', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('유관순', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이성계', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('강감찬', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('박지성', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('이방원', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);
INSERT INTO dept (name, major, age) VALUES ('을지문덕', ELT(FLOOR(RAND() * 5) + 1, '컴퓨터', '전기', '전자', '기계', '환경'), FLOOR(RAND() * 6) + 20);


$sql = SELECT name, major, age from dept WHERE
    major in ( SELECT major FROM dept where name='안중근')
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

$sql = "SELECT major FROM dept where name='안중근'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

$major = $data["major"];
$sql = "select name, major, age from dept where major='$major' ";
$result = mysqi_query($conn, $sql);
$data = mysqli_fetch_array($result);
while($data)
{
    // $data["name"] , $data["major"], $data["age"];
    $data = mysqli_fetch_array($result);
}

SELECT name, major, age from dept;
SELECT dept.name, dept.major, dept.age from dept;
SELECT d.name, d.major, d.age from dept AS d;
SELECT d.name, d.major, d.age from dept  d;

필드 선택 ==> 테이블명.필드값
PK : idx가 이름 같은 경우가 많아서. a.idx b.idx


쇼핑몰 : 회원테이블, 제품테이블, 주문테이블

// 이름, 아이디, 전화
CREATE TABLE members (
    idx INT auto_increment primary key,

    name    char(20),
    id      char(20),
    mobile  char(20)
);

CREATE TABLE models (
    idx INT auto_increment primary key,
    name    char(20),
    color   char(20),
    size    char(20)
);

CREATE TABLE orders (
    idx INT auto_increment primary key,
    memidx  INT, -- Foreign key
    modelidx INT,
    mobile  char(20),
    address char(100),
    FOREIGN KEY(memidx) REFERENCES members(idx),
    FOREIGN KEY(modelidx) REFERENCES models(idx)

)
[Q] 다음과 같이 스키마가 정의되었다.
CREATE TABLE members (
    idx INT auto_increment primary key,

    name    char(20),
    id      char(20),
    mobile  char(20)
);

CREATE TABLE models (
    idx INT auto_increment primary key,
    name    char(20),
    color   char(20),
    size    char(20)
);

CREATE TABLE orders (
    idx INT auto_increment primary key,
    memidx  INT, -- Foreign key
    modelidx INT,
    mobile  char(20),
    address char(100),
    FOREIGN KEY(memidx) REFERENCES members(idx),
    FOREIGN KEY(modelidx) REFERENCES models(idx)
    
);
다음 조건에 맞도록 데이터를 넣은 스크립트를 만들어줘.
members는 5개의 데이터를 채워줘.
- name : 역사인물 이름
- id : test, abcd, xyz, admin, hello
- mobile : 010-[0-9]{4}-[0-9]{4} 형태로 임의의 값으로 채움

models는 다음과 같이 10개를 채워줘.
- name : 나이키, 아디다스와 같은 브랜드 이름을 한글로 채움
- color : 빨강,파랑,노랑,흰색중 랜덤하게 채움
- size : S,M,L,XL 중 하나 랜덤

oders는 다음과 같이 3개를 채워줘.
- memidx, modelidx는 위 테이블 정보중 하나를 임의로 선택
- mobile : 010-[0-9]{4}-[0-9]{4} 형태로 임의의 값으로 채움
- address : 서울, 대전, 경기, 제주 중 하나

-- members 테이블 데이터 삽입
INSERT INTO members (name, id, mobile) VALUES ('이순신', 'test', '010-1234-5678');
INSERT INTO members (name, id, mobile) VALUES ('세종대왕', 'abcd', '010-2345-6789');
INSERT INTO members (name, id, mobile) VALUES ('안중근', 'xyz', '010-3456-7890');
INSERT INTO members (name, id, mobile) VALUES ('장영실', 'admin', '010-4567-8901');
INSERT INTO members (name, id, mobile) VALUES ('김구', 'hello', '010-5678-9012');

-- models 테이블 데이터 삽입
INSERT INTO models (name, color, size) VALUES ('나이키', '빨강', 'M');
INSERT INTO models (name, color, size) VALUES ('아디다스', '파랑', 'L');
INSERT INTO models (name, color, size) VALUES ('뉴발란스', '노랑', 'S');
INSERT INTO models (name, color, size) VALUES ('리복', '흰색', 'XL');
INSERT INTO models (name, color, size) VALUES ('언더아머', '빨강', 'M');
INSERT INTO models (name, color, size) VALUES ('푸마', '파랑', 'L');
INSERT INTO models (name, color, size) VALUES ('휠라', '노랑', 'S');
INSERT INTO models (name, color, size) VALUES ('르꼬끄', '흰색', 'XL');
INSERT INTO models (name, color, size) VALUES ('데상트', '빨강', 'M');
INSERT INTO models (name, color, size) VALUES ('캘빈클라인', '파랑', 'L');

-- orders 테이블 데이터 삽입
INSERT INTO orders (memidx, modelidx, mobile, address) VALUES (1, 3, '010-6789-0123', '서울');
INSERT INTO orders (memidx, modelidx, mobile, address) VALUES (2, 7, '010-7890-1234', '대전');
INSERT INTO orders (memidx, modelidx, mobile, address) VALUES (5, 5, '010-8901-2345', '경기');

주문정보 : 주문자번호, 이름, 전화, 주문전화, 제품명, 색상, 사이즈, 주소

$osql = "select * from orders ";
$oresult = mysqli_query($conn, $osql);
$odata = mysqli_fetch_array($oresult)

while($odata)
{
    // 
    $memSql = "select * from members where idx='$odata["memidx"]';
    $memResult = mysqli_query($conn, $memSql);
    $memData = mysqli_fetch_array($memResult);

    $modelSql = "select * from models  where idx='$odata["modelidx"]';
    $modelResult = mysqli_query($conn, $modelSql);
    $modelData = mysqli_fetch_array($modelResult);
    // $odata[idx], $memData[name], $memData[mobile], $odata[mobile], $modelData[name]
    $odata = mysqli_fetch_array($oresult)   
}

여러 테이블에 검색하기 (FROM 절에 여러 테이블을 넣을 수 있다.)
SELECT
   o.idx AS 주문번호, m.name AS 주문자이름,
   m.mobile AS 주문휴대폰,
   o.mobile AS 배송휴대폰,
    model.name AS 제품명,
    model.color AS 색상,
    model.size AS 사이즈

    FROM
        orders AS o, members AS m, models AS model

    WHERE o.memidx = m.idx AND o.modelidx = model.idx


[ JOIN : LEFT JOIN ]

    SELECT
        o.idx AS 주문번호,
        m.name AS 주문자이름,
        o.mobile AS 배송휴대폰,
        model.name AS 제품명,
        model.color AS 색상,
        model.size AS 사이즈     
    FROM
        orders AS o
    LEFT JOIN
        members AS m ON o.memidx = m.idx
    LEFT JOIN
        models AS model ON o.modelidx = model.idx


[UNION] 수학의 합집합
    유의 사항 : 열의 수와 데이터타입이 같아야 한다.

    예:
        SELECT name AS 이름 FROM members
        UNION
        SELECT name AS 제품명 FROM models

    다음 처럼 하면 안된다.

        SELECT idx AS 이름 FROM members
        UNION
        SELECT name AS 제품명 FROM models


SELECT major FROM dept;
SELECT DISTINCT major FROM dept;

[ GROUP BY ~~ HAVING ~~]

SELECT major, COUNT(*) as manCount 
    FROM dept
    GROUP BY major;

SELECT major, COUNT(*) as manCount 
    FROM dept
    GROUP BY major
    HAVING COUNT(*) > 5;

    WHERE 절과 HAVING의 차이가 
        WHERE : 그룹화되기 전에 필터링
        HAVING : 그룹해놓고 난 후에 필터링

[VIEW] 가상 테이블

CREATE OR REPLACE VIEW test_v AS
    SELECT
        o.idx AS 주문번호,
        m.name AS 주문자이름,
        o.mobile AS 배송휴대폰,
        model.name AS 제품명,
        model.color AS 색상,
        model.size AS 사이즈     
    FROM
        orders AS o
    LEFT JOIN
        members AS m ON o.memidx = m.idx
    LEFT JOIN
        models AS model ON o.modelidx = model.idx

    INSERT INTO orders (memidx, modelidx, mobile, address) VALUES (5, 5, '010-1111-2222', '제주');


CREATE OR REPLACE VIEW test2_v AS
    SELECT
        o.idx AS 주문번호1,
        m.name AS 주문자이름,
        o.mobile AS 배송휴대폰,
        model.name AS 제품명,
        model.color AS 색상,
        model.size AS 사이즈     
    FROM
        orders AS o
    LEFT JOIN
        members AS m ON o.memidx = m.idx
    LEFT JOIN
        models AS model ON o.modelidx = model.idx

==============================================================================
Day 1
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