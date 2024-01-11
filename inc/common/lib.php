<!-- lib.php(함수 라이브러리) -->
<?php
function warn_back($msg) { // 경고문을 띄우고 뒤로 가게 하는 함수
    echo "
        <script>
            alert('".$msg."'); // 상황에 맞는 alert 경고문
            history.back(); // 뒤로가기 스크립트 함수
        </script>
    ";
    exit;
}
function _goto ($url) { // 이 함수를 호출하면 처리 결과에 따라 해당 url로 리디렉션을 잡아줄 수 있음.
  echo "<meta http-equiv='refresh' content='0;url=".$url."' />";
}

function _move ($url) {
    ?>
    <script>
    location.href="<?php echo $url ?>";
    </script>
<?php
}
?>