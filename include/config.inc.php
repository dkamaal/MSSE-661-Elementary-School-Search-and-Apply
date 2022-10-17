<?php // config.inc.php
/*Database Credentials for MySQL. I have Password setup to access MySQL*/
$hn = 'localhost';  //hostname
$db = 'nanosite';  //database name
$un = 'root';       //user name
$pw = '';       //password

/*Trying to connect to MySQL Database*/

$conn = new mysqli($hn, $un, $pw, $db);

/*Checking Connection*/

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
