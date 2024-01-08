<!-- writeDo.php -->
<?php 
include_once "../global/dbconn.php";  /* db연결설정 파일 포함. */
include_once "../common/lib.php";  /* validation 경고메시지 */ 

$title = $_POST['title'];
$body = $_POST['body'];
$author = $_POST['author'];

// 빈 값을 검사하기 위한 조건문(NotBlank)
if (empty($title)) { warn_back("제목을 작성해 주세요."); } // 제목란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
if (empty($body)) { warn_back("내용을 작성해 주세요."); } // 내용란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
if (empty($author)) { warn_back("작성자 이름을 작성해 주세요."); } // 작성자란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행

$createDate = date("Y-m-d H:i:s", time());

try {
    $stmt = $db->prepare("INSERT INTO `article`(title, body, author, createDate) VALUES(:title, :body, :author, :createDate)");
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":body", $body, PDO::PARAM_STR);
    $stmt->bindParam(":author", $author, PDO::PARAM_STR);
    $stmt->bindParam(":createDate", $createDate, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
      _goto("../article/article_list.php");
    } else {
        print_r($db->errorInfo());
    }

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}

?> 
