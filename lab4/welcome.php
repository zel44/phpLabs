	<?php
// define variables and set to empty values
	$nameErr = "";
	$name = "";
	$test_url = "test.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($name) {
			$_SESSION["user_name"] = $name;
			header('Location: '.$test_url);
		}
	}
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

	<h2>Test PHP</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Start test">
	</form>

	<?php
	echo "<h2>Your Input:</h2>";
	echo $name;
	?>

</body>
</html>