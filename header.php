<?php
session_start();
//Setting Cookie to expire in 30 Minutes
$cookie_name = "user";
if (isset($_SESSION["userid"])){
$cookie_value = $_SESSION ["userfirstname"];
}
else {
  $cookie_value = $_COOKIE[$cookie_name];
}
setcookie($cookie_name, $cookie_value, time() + 1800, "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Elementary School</title>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
  <link rel="stylesheet" href="schoolstyle.css">
  <script src="validate_functions.js"></script>
</head>

<body>
  <nav>
    <div class="wrapper">
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if (isset($_SESSION["userid"])){
        echo "<li><a href='search.php'>Search School</a></li>"; //once logged in search option will be shown
        echo "<li><a href='viewprofile.php'>Profile</a></li>";
        echo "<li><a href='include/logout.inc.php'>Log Out</a></li>";
        }
        else {
        echo "<li><a href='signup.php'>Sign up</a></li>";
        echo "<li><a href='login.php'>Log in</a></li>";
        }
        
        ?>            
      </ul>
    </div>
  </nav>
  <div class="wrapperh1">

 