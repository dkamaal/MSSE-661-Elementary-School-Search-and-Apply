<?php
include_once 'header.php';
?>
<h2>Log In</h2><br>
<div class="loginform">
  <form action="include/login.inc.php" method="post">
    <input type="text" name="username" placeholder="User Name">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Log In">
</div>
<!--No Footer below is closing of main wrapper-->
</div>
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Please Fill all fields</p>";
  } else if ($_GET["error"] == "incorrectlogin") {
    echo "<p>Wrong Username or Password. Please try again.</p>";
  }
}
?>
</body>

</html>