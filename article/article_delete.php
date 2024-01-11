<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/global/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/head.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/common/lib.php");
?>
<script>
    var ok = confirm("삭제할겨?");
    if (ok) {
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // 해당 id의 게시물 조회
            $stmt = $db->prepare("SELECT * FROM `article` WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            try {
                // 게시물이 존재하는지 확인
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $stmt = $db->prepare("DELETE FROM `article` WHERE id = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $result = $stmt->execute(); // execute() 함수로 쿼리실행

                    if ($result) {
                        echo "
                            alert('게시글이 정상적으로 삭제되었습니다.');
                        ";
                    } else {
                        echo "
                            alert('게시글 삭제에 실패하였습니다.');
                        ";
                        print_r($db->errorInfo());
                    }
                } else {
                    // 게시물이 존재하지 않을 경우 처리
                    echo "
                        alert('게시글이 존재하지 않습니다.');
                    ";
                }
            } catch (PDOException $e) {
                print $e->getMessage();
                die();
            }
        } else {
            // id 파라미터가 전달되지 않은 경우 처리
            echo "alert('잘못된 접근입니다.');";
            echo "_goto('/article/article_list.php');";
        }
        ?>
    } else {
        alert("게시글이 삭제되지 않았습니다.");
    }
</script>
<?php include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ ?>