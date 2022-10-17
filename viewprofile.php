<?php
  
  include_once 'header.php';

  require_once 'include/config.inc.php';
?>
<h1>User Profile</h1>
<?php

  $uid = $_SESSION ["userid"]; //using session to identify user
  $query  = "SELECT * FROM users WHERE uid = '$uid'";
  $result = $conn->query($query);
  if (!$result) die("Fatal Error");

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo "<br><br>";
    echo '<h4>First Name:</h4>'    . htmlspecialchars($row['ufirstname'])    . '<br><br>';
    echo '<h4>Last Name:</h4>'     . htmlspecialchars($row['ulastname']) . '<br><br>';
    echo '<h4>Phone:</h4>'         . htmlspecialchars($row['uphone'])     . '<br><br>';
    echo '<h4>Email:</h4>'         . htmlspecialchars($row['uemail'])     . '<br><br>';
    echo '<h4>Username:</h4>'      . htmlspecialchars($row['uname'])     . '<br><br>';
  }

 echo <<<_END
 <form action='search.php' method='post' id='gobackform'>
 <input type="hidden" name="zip">
 </form>
 <button class="button button2" button type="submit" form='gobackform'>GO BACK</button>
_END;

  $result->close();
  $conn->close();
 
?>


 
