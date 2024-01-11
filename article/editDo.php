<!-- editDo.php -->
<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/global/dbprod.php");  /* db연결설정 파일 포함. */
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/common/lib.php");  /* 함수모음 라이브러리 */

// 한국 표준 시간대로 타임존을 설정
date_default_timezone_set('Asia/Seoul');
// 게시물 id를 가져오기
if (isset($_POST['id'])) {
    

    try { // 해당 id값을 가진 게시글을 찾아와서 DB에 업데이트하는 과정
        $id = $_POST['id'];

        // article_form.php 의 form태그에서 입력받은 값들을 변수로 초기화
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        $modifyDate = date("y-m-d H:i", time()); // 수정일 포맷형태 

        // 빈 값을 검사하기 위한 조건문(NotBlank)
        if (empty($title)) { warn_back("제목을 작성해 주세요."); } // 제목란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
        if (empty($body)) { warn_back("내용을 작성해 주세요."); } // 내용란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행
        if (empty($author)) { warn_back("작성자 이름을 작성해 주세요."); } // 작성자란이 비어있다면 lib문서의 warn_back을 작동시켜 validation을 수행

        $stmt = $db->prepare("UPDATE `article` SET title = :title, body = :body, author = :author, modifyDate = :modifyDate WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":body", $body, PDO::PARAM_STR);
        $stmt->bindParam(":author", $author, PDO::PARAM_STR);
        $stmt->bindParam(":modifyDate", $modifyDate, PDO::PARAM_STR);
        $result = $stmt->execute(); // execute() 함수로 쿼리실행
    
        if ($result) {
            echo "
            <script>
                alert('게시글이 정상적으로 수정되었습니다.');
            </script>
            ";
        _goto("/article/article_list.php");
              } else {
                echo "
                <script>
                    alert('게시글 수정에 실패하였습니다.');
                </script>
                ";
            print_r($db->errorInfo());
        }
    
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
} else {
    // id 파라미터가 전달되지 않은 경우 처리
    echo "잘못된 접근입니다.";
    include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ 
    exit();
}
?> 
