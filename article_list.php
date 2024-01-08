<?php include_once "./dbconn.php"; /* db연결설정 파일 포함. */ ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트 페이지</title>
</head>
<body>
<?php
        $stmt = $db->prepare("SELECT * FROM article");
        $stmt->execute();
        $result = $stmt->fetchAll(); // list 용
        // view 용 :: $stmt->fetch();
        print_r($result);
    ?>
</body>
</html>

