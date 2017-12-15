<!DOCTYPE HTML>
<html>
<head>
	<style>
	.error {color: #FF0000;}
</style>
</head>
<body>

	<?php
// define variables and set to empty values
	$op1Err = $op2Err = $operationErr = "";
	$op1 = $op2 = $operation = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["op1"])) {
			$op1Err = "Operand is required";
		} else {
			$op1 = test_input($_POST["op1"]);
			if (!preg_match("/^[0-9]*$/",$op1)) {
				$op1Err = "Only numbers allowed";
			}
		}

		if (empty($_POST["op2"])) {
			$op2Err = "Operand is required";
		} else {
			$op2 = test_input($_POST["op2"]);
			if (!preg_match("/^[0-9]*$/",$op2)) {
				$op2Err = "Invalid op2 format";
			}
		}

		if (empty($_POST["operation"])) {
			$operationErr = "Operation is required";
		} else {
			$operation = test_input($_POST["operation"]);
		}
	}

	if ($op1 && $op2 && $operation) {
		$num1 = intval($op1);
		$num2 = intval($op2);
		switch ($operation) {
			case "+":
			$result = $num1 + $num2;
			break;
			case "-":
			$result = $num1 - $num2;
			break;
			case "*":
			$result = $num1 * $num2;
			break;
			case "/":
			$result = $num1 / $num2;
			break;
		}
		$result_str = strval($result);
	}
	else {
		$result_str = "";
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<h2>PHP Calculator</h2>
	<p><span class="error">* required field.</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Operand1: <input type="text" name="op1" value="<?php echo $op1;?>">
		<span class="error">* <?php echo $op1Err;?></span>
		<br><br>
		Operand2: <input type="text" name="op2" value="<?php echo $op2;?>">
		<span class="error">* <?php echo $op2Err;?></span>
		<br><br>
		Operation:
		<input type="radio" name="operation" <?php if (isset($operation) && $operation=="+") echo "checked";?> value="+">+
		<input type="radio" name="operation" <?php if (isset($operation) && $operation=="-") echo "checked";?> value="-">-
		<input type="radio" name="operation" <?php if (isset($operation) && $operation=="*") echo "checked";?> value="*">*
		<input type="radio" name="operation" <?php if (isset($operation) && $operation=="/") echo "checked";?> value="-">/
		<span class="error">* <?php echo $operationErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br><br>
	<div>Result: <?php echo $result_str ?></div>
	<?php
	echo "<h2>Your Input:</h2>";
	echo $op1;
	echo "<br>";
	echo $op2;
	echo "<br>";
	echo $operation;
	?>

</body>
</html>