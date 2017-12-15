<?php
$str = "hello";
$offset = 0;
while (preg_match('/(.)\1{1,}/', $str, $matches, PREG_OFFSET_CAPTURE, $offset)){
	$sub = $matches[0][0];
	$comp = $sub[0]."(".strlen($sub).")";
	$offset = $matches[0][1] + strlen($comp);
	$str = substr_replace($str, $comp, $matches[0][1],strlen($sub));
}
echo $str;
?>