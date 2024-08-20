수원대학교 SQL 데이터분석 과정

<<<<<<< HEAD
[Q] 

PHP와 MySQL을 연동해서 다음의 조건에 맞는 코드를 만들어줘.
- HTML5와 BootStrap5를 이용
- $conn = connectDB() 함수를 생성
- 데이터베이스 이름 : swu
- 사용자 아이디 : swu
- 비밀번호 : 1111

HTML의 Header에는 Bootstrap5포함
users의 모든 항목을 테이블 형태로 출력해줘.


1. DB -> TABLE -> INSERT -> SELECT

    SELECT 필드1, 필드2, .... FROM 테이블 WHERE 조건

    SELECT id, name FROM users WHERE birthdate > '2000-01-01';

    SELECT * FROM users ORDER BY birthdate ASC, name DESC;




=======
>>>>>>> 44a8ff98ac567ffdc704f22acd6be1b7ee3442b9
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