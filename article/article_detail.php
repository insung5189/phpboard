<!-- article_detail.php -->
<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/global/dbprod.php"); /* db연결설정 파일 포함. */
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/head.php"); /* html 여는 파일 */
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/common/lib.php");  /* 함수모음 라이브러리 */
// 게시물 id를 가져오기
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 해당 id의 게시물 조회
    $stmt = $db->prepare("SELECT * FROM `article` WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // 게시물이 존재하는지 확인
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $title = $row["title"];
        $body = $row["body"];
        $author = $row["author"];
        $createDate = $row["createDate"];
        $modifyDate = $row["modifyDate"];
    } else {
        // 게시물이 존재하지 않을 경우 처리
        echo "게시물이 존재하지 않습니다.";
        include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ 
        exit();
    }
} else {
    // id 파라미터가 전달되지 않은 경우 처리
    echo "잘못된 접근입니다.";
    include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ 
    exit();
}
?>

<!-- 게시물 상세 내용 표시 -->
<div style="margin-top: 20px;">
    <h2><?php echo $title; ?></h2>
    <p>작성자: <?php echo $author; ?></p>
    <p>작성일: <?php echo $createDate; ?></p>
    <?php if ($modifyDate) : ?>
        <p>수정일: <?php echo $modifyDate; ?></p>
    <?php endif; ?>
    <hr>
    <p><?php echo $body; ?></p>
</div>
<button>
    <a href="/article/article_edit.php?id=<?php echo $id; ?>">
    수정하기
    </a>
</button>

<?php include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ ?> 