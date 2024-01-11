<!-- article_edit.php -->
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

      $id = $row["id"];
      $title = $row["title"];
      $body = $row["body"];
      $author = $row["author"];
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
<div class="flex-row">
  <div class="col">
  <h1 class="ml-2 mb-4"><?php echo $id?>번 글 수정하기</h1>
    <!-- class 에 row 추가 -->
    <section class="col-10">
      <form action="editDo.php" method="post">
        <div class="form-group row">
          <label for="author" class="col-sm-1 col-form-label">작성자</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="author" name="author" value="<?php echo $author; ?>" placeholder="작성자 이름을 작성해주세요." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-1 col-form-label">제목</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="제목을 작성해주세요." required>
          </div>
        </div>

        <div class="form-group row">
          <label for="body" class="col-sm-1 col-form-label">내용</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="body" name="body" rows="6" placeholder="내용을 작성해주세요." required><?php echo $body; ?></textarea>
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <div style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary">수정하기</button>
            </div>
          </div>
        </div>

      </form>
    </section>
  </div>
</div>
<?php include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일(레이아웃용 꼬리 공통화를 위함) */ ?>