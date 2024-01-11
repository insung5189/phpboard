<!-- dbconn.php(DB생성 설정파일) -->
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
        die("<script>alert('연결 실패: " . $conn->connect_error . "');</script>");
    }

    // 데이터베이스 연결
    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $pwd);
} catch (PDOException $e) {
    print $e->getMessage(); // 데이터베이스 관련 에러 메시지 출력용
    _goto("/inc/global/dbprod.php");
    die(); // 데이터베이스 연결 종료
}
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */
?>