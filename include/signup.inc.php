<?php

if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'config.inc.php';
    require_once 'functions.inc.php';

if (emptyinputsignup($firstname, $lastname, $phone, $email, $username, $password) !== false){
        header("location: ../signup.php?error=emptyinput");
    exit(); //stops scripts from running
}

if (invalidusername($username) !== false) {
    header("location: ../signup.php?error=invalidusername");
    exit(); //stops scripts from running
} 

if (userexists($conn, $username, $email) !== false) {
    header("location: ../signup.php?error=usernameunavailable");
    exit(); //stops scripts from running
}

createuser($conn, $firstname, $lastname, $phone, $email, $username, $password);

}

else {
    header("location: ../signup.php"); //go back one directory to signup page
    exit();
}
