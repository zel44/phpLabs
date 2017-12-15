<?php
$count = 0;
for ($i=100; $i <= 300; $i++) {
	$str = strval($i);
	$arr = str_split($str);
	foreach ($arr as $key => $value) {
		$arr[$key] = intval($value);
	}
	$diff = $arr[0];
	foreach ($arr as $key => $value) {
		$diff -= $value;
	}
	if ($diff < 0) $count++;
}
echo $count;
?>