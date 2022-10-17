<?php
include_once 'header.php';
?>
<h2>Sign Up</h2><br>
<div class="signupform">
<form action="include/signup.inc.php" method="post">
  <input type="text" name="firstname" placeholder="First Name">
  <input type="text" name="lastname" placeholder="Last Name">
  <input type="text" name="phone" placeholder="Phone Number">
  <input type="text" name="email" placeholder="Email ID">
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="submit" value="Sign Up">
</form>
<!--No Footer below is closing of main wrapper-->
</div>
</div>
<?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Please Fill all fields</p>";
    } else if ($_GET["error"] == "invalidusername") {
      echo "<p>Please use appropriate User Name</p>";
    } else if ($_GET["error"] == "usernameunavailable") {
      echo "<p>User Name is already taken. Please use different User Name.</p>";
    } else if ($_GET["error"] == "none") {
      echo "<p>Sign Up Successfull. Please Login to Continue!!</p>";
    }
  }
  ?>
</body>

</html>

