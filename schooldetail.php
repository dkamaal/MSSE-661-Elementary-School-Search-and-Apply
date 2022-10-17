<?php

include_once 'header.php';

require_once 'include/config.inc.php';

?>
<h1>School Detail</h1>
<?php

$d0 = $_POST['schoolid']; /*used post method to retrieve id variable from display.php*/
$query  = "SELECT * FROM schooldetail WHERE schoolid = '$d0'";
$result = $conn->query($query);
if (!$result) die("Fatal Error");

$rows = $result->num_rows;

for ($j = 0; $j < $rows; ++$j) {
  $row = $result->fetch_array(MYSQLI_ASSOC);

  echo "<br><br>";
  echo '<h4>School Name:</h4>'    . htmlspecialchars($row['schoolname'])    . '<br><br>';
  echo '<h4>Rating:</h4>'         . htmlspecialchars($row['rating']) . '<br><br>';
  echo '<h4>Address:</h4>'        . htmlspecialchars($row['address'])     . '<br><br>';
  echo '<h4>City:</h4>'           . htmlspecialchars($row['city'])     . '<br><br>';
  echo '<h4>ZIP:</h4>'            . htmlspecialchars($row['zip'])     . '<br><br>';
  $zip = $row['zip'];
}

echo <<<_END
 <form action='schoollist.php' method='post' id='gobackform'>
 <input type="hidden" name="zip" value="$zip">
 </form>
 <button class="button button2" button type="submit" form='gobackform'>GO BACK</button>
_END;

$result->close();
$conn->close();

?>