<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트페이지</title>
</head>
<body>
<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbn = "phpboard"; // db 이름

try {

    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $pwd);

    print_r($db);

    // PDO Object 가 출력되야 정상입니다.

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}



?>
</body>
</html>

