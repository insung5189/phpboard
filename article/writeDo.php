<!-- writeDo.php -->
<?php include_once ($_SERVER['DOCUMENT_ROOT']."/inc/global/dbconn.php");  /* db연결설정 파일 포함. */?>
<?php include_once ($_SERVER['DOCUMENT_ROOT']."/inc/common/lib.php");  /* 함수모음 라이브러리 */ ?>
<?php 
// 한국 표준 시간대로 타임존을 설정
date_default_timezone_set('Asia/Seoul');

// article_form.php 의 form태그에서 입력받은 값들을 변수로 초기화
$title = $_POST['title'];
$body = $_POST['body'];
$author = $_POST['author'];
$createDate = date("y-m-d H:i", time()); // 작성일 포맷형태 

// 빈 값을 검사하기 위한 조건문(NotBlank)
if (empty($title)) { warn_back("제목을 작성해 주세요."); } // 제목란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
if (empty($body)) { warn_back("내용을 작성해 주세요."); } // 내용란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
if (empty($author)) { warn_back("작성자 이름을 작성해 주세요."); } // 작성자란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행


try { // 실질적으로 입력받은 값들을 INSERT INTO 쿼리를 이용하여 DB에 입력하는 과정

    $stmt = $db->prepare("INSERT INTO `article`(title, body, author, createDate) VALUES(:title, :body, :author, :createDate)");
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":body", $body, PDO::PARAM_STR);
    $stmt->bindParam(":author", $author, PDO::PARAM_STR);
    $stmt->bindParam(":createDate", $createDate, PDO::PARAM_STR);
    $result = $stmt->execute(); // execute() 함수로 쿼리실행

    if ($result) {
        echo "
        <script>
        alret('게시글이 등록되었습니다.');
        </script>
        ";
      _goto("../article/article_list.php");
    } else {
        echo "
        <script>
        alret('게시글 등록에 실패하였습니다.');
        </script>
        ";
        print_r($db->errorInfo());
    }

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}

?> 
