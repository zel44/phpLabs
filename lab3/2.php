<!DOCTYPE HTML>
<html>
<body>

<?php
// define variables and set to empty values
$text = "";
$formatted_text = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["text"])) {
    $text = "";
  } else {
    $text = test_input($_POST["text"]);
  }
}

if ($text){
  $formatted_text = justify($text);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function justify( $str_in, $desired_length = 80) {
    // Cut off long lines
    if ( strlen( $str_in ) > $desired_length ) {
        $str_in = current( explode( "\n", wordwrap( $str_in, $desired_length ) ) );
    }
    // String length
    $string_length = strlen( $str_in );
    // Number of spaces
    $spaces_count = substr_count( $str_in, ' ' );
    // Number of total spaces needed
    $needed_spaces_count = $desired_length - $string_length + $spaces_count;
    // One word, so split spaces in half, ceil it add it to eaither side of the word
    // Then take the first N chars
    if ( $spaces_count === 0 ) {
        return str_pad( $str_in, $desired_length, ' ', STR_PAD_BOTH );
    }
    // How many spaces the string needs per space to have atleast N characters
    $spaces_per_space = ceil( $needed_spaces_count / $spaces_count );
    // Replace all spaces with the neccessary spaces per space
    // This string will sometimes be too long
    $spaced_string = preg_replace( '~\s+~', str_repeat( ' ', $spaces_per_space ), $str_in );
    // Now, some strings will be too long so you need to replace the spaces with one less space until
    // the desired amount of characters is reached
    //
    // This is done with preg_replace callback and the $limit parameter
    // Limit replacements to the exact number we need to reach the desired length
    return preg_replace_callback(
        sprintf( '~\s{%s}~', $spaces_per_space ),
        function ( $m ) use( $spaces_per_space ) {
            return str_repeat( ' ', $spaces_per_space-1 );
        },
        $spaced_string,
        strlen( $spaced_string ) - $desired_length
    );
}
?>

<h2>Text justification lab</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <textarea name="text" rows="5" cols="90"><?php echo $formatted_text;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $text;
?>

</body>
</html>