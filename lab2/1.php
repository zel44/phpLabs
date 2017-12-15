<?php
function get_season($month){
	if ($month < 3) return "winter";
	if ($month < 6) return "spring";
	if ($month < 9) return "summer";
	if ($month < 12) return "autumn";
	return "winter";
}
echo get_season(12);
?>