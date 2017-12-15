<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab4</title>
</head>
<body>
    <table>
    <?php
    $n = 5;
    $m = 10;
    $arr = array();
    for ($x = 0; $x < $n; $x++) {
        $arr[] = array();
        for ($y = 0; $y < $m; $y++) {
            $arr[$x][] = ($x+$y)/2;
        }
    }
    for ($x = 1; $x < $n; $x+=2) {
        for ($y = 0; $y < $m; $y++) {
            $arr[$x][$y] = $arr[$x-1][$y] + $arr[$x+1][$y];
        }
    }

    for ($x = 0; $x < $n; $x++) {
        echo "<tr>";
        for ($y = 0; $y < $m; $y++) {
            echo "<td>".$arr[$x][$y]."</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
