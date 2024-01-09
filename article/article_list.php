<!-- article_list.php -->
<?php include_once "../inc/global/dbconn.php"; /* db연결설정 파일 포함. */ ?> 
<?php include_once "../inc/head.php"; /* html 여는 파일 */ ?> 
<?php
        $stmt = $db->prepare("SELECT * FROM `article` ORDER BY id DESC"); // article엔티티를 조회하는 쿼리 작성
        $stmt->execute(); // 쿼리 실행


        foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row ) { // PDO를 이용하여 조회된 엔티티의 칼럼명으로 변수에 값을 할당하여 foreach 반복문으로 출력
            $title = $row["title"];
            $body = $row["body"];
            $author = $row["author"];
            $createDate = $row["createDate"];
            $modifyDate = $row["modifyDate"];

            echo "<li>제목 => $title, 내용 => $body, 등록일 => $createDate, 수정일 => $modifyDate, 작성자 => $author</li>";
        }


        $result = $stmt->fetchAll(); // list 용
        // view 용 :: $stmt->fetch();
        // print_r($result);
    ?>

</body>
</html>
<?php include_once "../inc/tail.php"; /* html 닫는 파일 */ ?> 