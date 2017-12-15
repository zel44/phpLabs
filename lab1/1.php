<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab1</title>
</head>
<body>
    <table>
        <?php
        echo "<tr><th></th>";
        for ($x = 1; $x < 10; $x++) {
            echo "<th>$x</th>";
        }
        echo "</tr>";
        for ($x = 1; $x < 10; $x++) {
            echo "<tr><th>$x</th>";
            for ($y = 1; $y < 10; $y++) {
                echo "<td>".$x * $y."</td>";
            }
        }
        ?>
    </table>
</body>
</html>

