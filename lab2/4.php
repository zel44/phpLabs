<?php
function circle($a=0, $b=0, $r=10)
{
	return [sqrt($r*$r - $b*$b) + $a, -sqrt($r*$r - $b*$b) + $a];
}

$roots = circle(1,1,2);
echo $roots[0]." ".$roots[1];
?>