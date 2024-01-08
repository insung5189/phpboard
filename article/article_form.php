<!-- article_form.php -->
<?php include_once "../inc/head.php"; /* html 여는 파일(레이아웃용 헤더 공통화를 위함) */ ?>
<div class="flex-row">
  <div class="col">
    <!-- class 에 row 추가 -->
    <section class="col-10">
      <form action="writeDo.php" method="post">
        <div class="form-group row">
          <label for="author" class="col-sm-2 col-form-label">작성자</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="author" name="author" placeholder="작성자 이름을 작성해주세요." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">제목</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="제목을 작성해주세요." required>
          </div>
        </div>

        <div class="form-group row">
          <label for="body" class="col-sm-2 col-form-label">내용</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="body" name="body" rows="6" placeholder="내용을 작성해주세요." required></textarea>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <div style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary">등록하기</button>
            </div>
          </div>
        </div>

      </form>
    </section>
  </div>
</div>
<?php include_once "../inc/tail.php"; /* html 닫는 파일(레이아웃용 꼬리 공통화를 위함) */ ?>