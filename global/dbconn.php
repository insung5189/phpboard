<!-- dbconn.php -->
<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbn = "phpboard"; // db 이름
$db;

try {

    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $pwd);

    print_r($db); // PDO Object ( )

} catch (PDOException $e) {
    print $e->getMessage(); // 데이터베이스관련 에러메시지 출력용
    die(); // 데이터베이스 연결 종료
}

?>