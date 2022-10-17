<?php
//Below are signup functions
function emptyinputsignup($firstname, $lastname, $phone, $email, $username, $password) {
    $result;
    if (empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidusername($username) {
    
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {//search alogrithm
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//userexists function is reused in login user function
function userexists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE uname = ? OR uemail = ?;";  //? is placeholder
    $stmt = mysqli_stmt_init($conn); //prepared statement. Prevent code injection
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=statementfailed");
        exit(); //stops scripts from running
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultdata = mysqli_stmt_get_result($stmt);
    
    if($row=mysqli_fetch_assoc($resultdata)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt); //closing the statement
}




function createuser($conn, $firstname, $lastname, $phone, $email, $username, $password){
    $sql = "INSERT INTO users (ufirstname, ulastname, uphone, uemail, uname, upassword) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); //prepared statement. Prevent code injection
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=statementfailed");
        exit(); //stops scripts from running
    }
    
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $phone, $email, $username, $hashedPwd);//replace with $hashedPwd
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); //closing the statement
    header("location: ../signup.php?error=none");
    exit();
}

//Below are Login Functions

function emptyinputlogin( $username, $password) {
    $result;
    if (empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginuser( $conn, $username, $password) {
    $userexists = userexists($conn, $username, $password);
    
    if ($userexists === false){
        header("location: ../login.php");
        exit();
    }
    
    $pwdHashed = $userexists["upassword"];
    $checkPwd = password_verify($password, $pwdHashed);
    
    if ($checkPwd === false){
        header("location: ../login.php?error=incorrectlogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION ["userid"] = $userexists ["uid"];
        $_SESSION ["useruid"] = $userexists ["uname"];
        $_SESSION ["userfirstname"] = $userexists ["ufirstname"];
        header("location: ../index.php");
        exit();
    }
}




 

