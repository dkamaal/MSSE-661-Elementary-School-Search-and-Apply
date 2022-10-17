<?php
include_once 'header.php';
?>
<h1>Elementary School Search and Apply!!</h1><br><br>

<input type='image' src='graduationcap.gif' width='200' height='200'
      onmouseover="this.src='schoolbuilding.gif'"
      onmouseout="this.src='graduationcap.gif'"><br><br><br>

<?php
if (isset($_SESSION["userid"]) && isset($_COOKIE[$cookie_name])) {
        echo "<p>Welcome <b>" . $_SESSION["userfirstname"] . "</b>. Please <a href='search.php'>Click Here</a> or Search School to continue</p>";
}
else if (isset($_SESSION["userid"]))  {
        echo "<p>Welcome <b>" . $_SESSION["userfirstname"] . "</b>. Please <a href='search.php'>Click Here</a> or Search School to continue</p>";
}
else if (isset($_COOKIE[$cookie_name]) && ($_GET["error"] == "none")){
        echo "<p>Hello <b>" . $_COOKIE[$cookie_name] . "</b>. You are now logged off. Please <b>Log In</b> to Search School</p>";
}
else if (isset($_COOKIE[$cookie_name])){
        echo "<p>Welcome Back <b>" . $_COOKIE[$cookie_name] . "</b>. Please <b>Log In</b> to Search School</p>";
}
else {
        echo "<p>Welcome Guest!! Please <b>Log In</b> to Search School</p>";
}
?>
<!--No Footer, below is closing of main wrapper-->
</div>
</body>

</html>