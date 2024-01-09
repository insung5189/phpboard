<!-- dbconn.php(DB연결 설정파일) -->
<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbn = "phpboard"; // db 이름
$db;
$conn;

try {
    // 데이터베이스 연결 생성
    $conn = new mysqli($host, $user, $pwd);
    // 연결 확인
    if ($conn->connect_error) {
        die("연결 실패: " . $conn->connect_error);
    }

    // 데이터베이스 생성
    $sql = "CREATE DATABASE IF NOT EXISTS $dbn";
    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
        alert('데이터베이스 생성 완료');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('데이터베이스 생성 실패');
        </script>
        " . $conn->error;
    }

    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $pwd);

    // print_r($db); // PDO Object ( )

} catch (PDOException $e) {
    print $e->getMessage(); // 데이터베이스관련 에러메시지 출력용
    die(); // 데이터베이스 연결 종료
}

?>