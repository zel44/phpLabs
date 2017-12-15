<?php
$n = 2;
$k = 5;
$red = $n;
$mut = 0;
$green = 0;
while($k--){
	if (!$mut){
		$mut = $red;
	} else {
		$mut = 0;
	}
	$red += $green;
	$green *= 2;
	$green += $mut;
}
echo $red+$green;
?>