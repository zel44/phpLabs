<table>
	<?php
	$DEFAULT_M = 10;
	$m = $DEFAULT_M;
	if (empty($_POST["m"])) {
		$m = $DEFAULT_M;
	} else {
		$m = test_input($_POST["m"]);
		if (!preg_match("/^[0-9]*$/",$m)) {
			$m = $DEFAULT_M;
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$nums = array();
	for ($row = 0; $row < $m; $row++) {
		$nums[$row] = array();
		for ($col = 0; $col < $m; $col++) {
			$nums[$row][$col] = rand(0, 100);
		}
	}

	for ($x = 0; $x < $m; $x++) {
		echo "<tr>";
		for ($y = 0; $y < $m; $y++) {
			echo "<td";
			if ($x == $y) echo " class='main-d' ";
			if ($m - $x == $y + 1) echo " class='side-d' ";
			echo">".$nums[$x][$y]."</td>";
		}
		echo "</tr>";
	}
	?>
</table>
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	M: <input type="text" name="m" value="<?php echo $m;?>">
	<br><br>
	<input type="submit" name="submit" value="Submit">
</form>
<br><br>
<?
$even = $odd = 0;
for ($row = 0; $row < $m; $row++) {
		for ($col = 0; $col < $m; $col++) {
			if ($nums[$row][$col] % 2 == 0) {
				$even++;
			} else {
				$odd++;
			}
		}
	}
	?>
<div>There's <?php echo $even;?> even numbers</div>
<div>There's <?php echo $odd;?> odd numbers</div>

<style>
	.main-d{
		color: red;
	}
	.side-d{
		color: blue;
	}
</style>