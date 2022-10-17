<!DOCTYPE html> <!--setup.php -->
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>
    <h3>Setting up...</h3>

<?php

  require_once 'setupfunctions.php';

  createTable('schooldetail', 
              'schoolid INT (5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
               schoolname VARCHAR(100) NOT NULL,
               rating INT (5),
               address VARCHAR(128) NOT NULL,
               city VARCHAR(128) NOT NULL,
               zip  CHAR (5)');

  createTable('applications',
              'aid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
               school_id INT (5),
               user_id INT (5),
               firstname VARCHAR(128) NOT NULL,
               lastname VARCHAR(128) NOT NULL,
               phone VARCHAR(128) NOT NULL,
               email VARCHAR(128) NOT NULL');

  createTable('users',
              'uid int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
               ufirstname VARCHAR(128) NOT NULL,
               ulastname VARCHAR(128) NOT NULL,
               uphone VARCHAR(128) NOT NULL,
               uemail VARCHAR(128) NOT NULL,
               uname VARCHAR(128) NOT NULL,
               upassword VARCHAR(128) NOT NULL');

               require_once 'insertdata.php';
?>

    <br>...done.
  </body>
</html>
