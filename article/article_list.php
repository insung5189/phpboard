<!-- article_list.php -->
<?php include_once "../global/dbconn.php";  /* db연결설정 파일 포함. */ ?> 
<?php include_once "../inc/head.php"; /* html 여는 파일(레이아웃용 헤더 공통화를 위함) */ ?>
<?php
        $stmt = $db->prepare("SELECT * FROM article");
        $stmt->execute();


        foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row ) {
            $title = $row["title"];
            $body = $row["body"];
            $author = $row["author"];
            $createDate = $row["createDate"];
            $modifyDate = $row["modifyDate"];

            echo "<li>제목 => $title, 내용 => $body, 등록일 => $createDate, 수정일 => $modifyDate, 작성자 => $author</li>";
        }


        $result = $stmt->fetchAll(); // list 용
        // view 용 :: $stmt->fetch();
        print_r($result);
    ?>
<?php include_once "../inc/tail.php"; /* html 닫는 파일(레이아웃용 꼬리 공통화를 위함) */ ?> 