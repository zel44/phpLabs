<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
</head>
<body>
	<div><?php echo $_SESSION["user_name"] ?></div>
	<?php
	$string = file_get_contents("/home/michael/test.json");
	$json_a = json_decode($string, true);

	foreach ($json_a as $person_name => $person_a) {
		echo $person_a['status'];
	}
	?>

</body>
</html>

