<?php
$arr = [];
$n = 6;
for ($i = 0; $i < $n; $i++){
	$arr[] = rand(0,10);
	echo $arr[$i]." ";
}
echo "<br>";
for ($b = 0, $e = $n - 1; $b < $e; $b++, $e--) {
	list($arr[$b], $arr[$e]) = [$arr[$e], $arr[$b]];
}

for ($i = 0; $i < $n; $i++){
	echo $arr[$i]." ";
}
echo "<br>";
$sum = 0;
foreach ($arr as $key => $value) {
	$sum += $value;
}
$average = $sum / $n;
echo $average."<br>";

$bigger5 = [];
$less5 = [];
foreach ($arr as $key => $value) {
	if ($value > 5) {
		$bigger5[] = $value;
	} else {
		$less5[] = $value;
	}
}

?>