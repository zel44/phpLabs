<?php
$arr = [];
$n = 7;
for ($i=0; $i < $n; $i++) {
	$arr[$i] = [];
}
$num = 1;
$i = 0;
$j = intdiv(7, 2);
$arr[$i][$j] = $num;
while ($num < $n*$n) {
	$num++;
	$i--;
	if ($i < 0) $i = $n - 1;
	$j++;
	if ($j == $n) $j = 0;
	if (array_key_exists($j, $arr[$i])) $i++;
	$arr[$i][$j] = $num;
}
for ($i=0; $i < $n; $i++) {
	for ($j=0; $j < $n; $j++) {
		echo $arr[$i][$j]." ";
	}
	echo "<br>";
}
?>