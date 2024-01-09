<!-- head.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<!-- stylesheet -->
    <link rel="stylesheet" href="../css/customs.css" />
    <title>PHP 게시판</title>
</head>
<body>
<nav class="col"> <!-- class 에 col 추가 -->
  <ul class="nav flex-row"> <!-- list 생성란 -->
    <li class="nav-item icon-link-hover">
      <a href="article_list.php" class="nav-link active">LIST</a>
    </li>
    <li class="nav-item icon-link-hover">
      <a href="article_form.php" class="nav-link">WRITE</a>
    </li>
    <li class="nav-item icon-link-hover">
      <a href="#" class="nav-link">EDIT</a>
    </li>
  </ul>
</nav>