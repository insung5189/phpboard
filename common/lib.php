<?php
function warn_back($msg) { // 경고문을 띄우고 뒤로 가게 하는 함수
    echo "
        <script>
            alert('".$msg."'); // 상황에 맞는 alert 경고문
            history.back(); // 뒤로가기 기능
        </script>
    ";
    exit;
}
?>