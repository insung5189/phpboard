<h1>hello world!</h1>
<h2>hello world!</h2>
<h3>hello world!</h3>
<?php
$a = 10.8;
$b = 20;
$c = $a + $b;
$d = "hi how are you?";
	echo "<h1>$a + $b = $c</h1>";
	echo "<h1>$d</h1>";
	echo "hello world!<BR>";
	$f = 8;
	for ($i = 1; $i <= 9; $i++) {
		$e = $f * $i;
		echo "<p><h3>$f X $i = $e</h3></p>";
	}
	function varFunc() {
		$var = 10;
		echo "함수 내부에서 선언한 지역변수 var는 ($var)입니다.<br> ";
	}
	varFunc();
	$var = 30;
	echo "함수 밖에서 호출한 지역 변수 var의 값은 ($var)입니다.<br>";
	echo "함수 밖에서 호출한 지역 변수 var의 값은 $var 입니다.<br>";
	phpinfo();
    ?>