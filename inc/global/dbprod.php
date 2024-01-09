<!-- dbprod.php(DB생성 설정파일) -->
<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/head.php"); /* html 여는 파일 */ 
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/common/lib.php");  /* 함수모음 라이브러리 */ 

$host = "localhost";
$user = "root";
$pwd = "";
$dbn = "phpboard"; // db 이름

try {
        // MySQL에 연결
        $conn = new mysqli($host, $user, $pwd);

        // 연결 확인
        if ($conn->connect_error) {
            die("연결 실패: " . $conn->connect_error);
        }
    
        // 데이터베이스가 존재하는지 확인하는 쿼리
        $query = "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$dbn'";
        $result = $conn->query($query);
    
        // 데이터베이스가 없으면 생성
        if ($result->num_rows == 0) {
            $create_db_query = "CREATE DATABASE $dbn";
    
            if ($conn->query($create_db_query) === TRUE) {
                echo "데이터베이스 생성 완료<br>";
                $conn->select_db($dbn); // 생성된 데이터베이스 선택
    
                // 테이블 생성 쿼리
                $create_table_query = "CREATE TABLE article (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY(id),
                    createDate DATETIME NOT NULL,
                    modifyDate DATETIME,
                    title VARCHAR(100) NOT NULL,
                    body TEXT NOT NULL,
                    author VARCHAR(50) NOT NULL,
                    hit INT(10) UNSIGNED DEFAULT 0
                )";
    
                if ($conn->query($create_table_query) === TRUE) {
                    echo "테이블 생성 완료<br>";
                    
                    // 데이터 입력 쿼리
                    $insert_query1 = "INSERT INTO article (title, body, createDate, author) VALUES ('안녕하세요 관리자입니다.', '관리자가 작성한 공지사항 내용입니다.', NOW(), '관리자')";
                    $insert_query2 = "INSERT INTO article (title, body, createDate, author) VALUES ('안녕하세요 관리자입니다.22', '관리자가 작성한 공지사항 내용입니다.222', NOW(), '관리자2')";
    
                    if ($conn->query($insert_query1) === TRUE && $conn->query($insert_query2) === TRUE) {
                        echo "
                        <script>
                            alert('데이터 입력 완료');
                        </script>
                        ";
                        _goto("/article/article_list.php");
                    } else {
                        echo "
                        <script>
                            alert('데이터 입력 실패 : ".$conn->error."');
                        </script>
                        ";
                    }
                } else {
                    echo "
                    <script>
                        alert('테이블 생성 실패 : ".$conn->error."');
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('데이터베이스 생성 실패 : ".$conn->error."');
                </script>
                ";
            }
        }
        /* 
        else {
            echo "
            <script>
                alert('DB : ".$dbn." 가 이미 존재함');
            </script>
            ";
        }
        */
    
    // 데이터베이스 연결
    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $pwd);
} catch (PDOException $e) {
    print $e->getMessage(); // 데이터베이스관련 에러메시지 출력용
    die(); // 데이터베이스 연결 종료
}

include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ ?>
