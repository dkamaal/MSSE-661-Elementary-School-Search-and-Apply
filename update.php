<?php
include_once 'header.php';

require_once 'include/config.inc.php';


$r0 = $_POST['aid1'];
$r1 = $_POST['school_id1'];
$r2 = $_POST['user_id1'];
$r3 = $_POST['firstname1'];
$r4 = $_POST['lastname1'];
$r5 = $_POST['phone1'];
$r6 = $_POST['email1'];
$r7 = $_POST['aid']; //sending aid for SQL Statement

if (
  !empty($_POST['school_id']) &&
  !empty($_POST['user_id']) &&
  !empty($_POST['firstname']) &&
  !empty($_POST['lastname']) &&
  !empty($_POST['phone']) &&
  !empty($_POST['email'])
) {
  $school_id = get_post($conn, 'school_id');
  $user_id = get_post($conn, 'user_id');
  $firstname = get_post($conn, 'firstname');
  $lastname = get_post($conn, 'lastname');
  $phone = get_post($conn, 'phone');
  $email = get_post($conn, 'email');

  $query = "UPDATE applications SET school_id = '$school_id', user_id = '$user_id', firstname = '$firstname', lastname = '$lastname', phone = '$phone', email = '$email' WHERE aid = '$r7'";
  /*Updating data based on aid or application id recieved which is autoincremented column to updated unique row*/

  $result = $conn->query($query);
  if ($result == 1)
    header("location: applydelete.php");
  if (!$result)
    echo "Application Failed. Please Apply Later<br><br>";
}

echo <<<_END
  <head><link rel="stylesheet" href="schoolstyle.css">
  <center><h1>Please Update your application details</h1></center><br>
  </head>
  <div class="updateform">
  <form id='updateform' action="update.php" method="post">
  <input type="hidden" name="aid" value='$r0'>
  <label for="school_id">SCHOOL ID:</label> 
  <input id='school_id' input type="text" name="school_id" value="$r1">
  <input type="hidden" name="user_id" value='$r2'>
  <label for="firstname">FIRST NAME:</label> 
  <input id='firstname'input type="text" name="firstname" value='$r3'>
  <label for="lastname">LAST NAME:</label> 
  <input id='lastname' input type="text" name="lastname" value='$r4'>
  <label for="phone">PHONE:</label>
  <input id='phone' input type="text" name="phone" value='$r5'>
  <label for="email">EMAIL:</label>
  <input id='email' input type="text" name="email" value='$r6'>
  <input type='submit' value='UPDATE'>
  </form>
  
  <form action="applydelete.php" method="post">
  <input type='submit' value='CANCEL'>
  <input type="hidden" name="school_id" value="$r1">
  </div>
  _END;
?>
          <script>
          //Jquery below for submit event for checking empty fields
      $('#updateform').submit(function()
      {
        if ($('#school_id').val() == '' 
        ||  $('#firstname').val() == ''
        ||  $('#lastname').val() == ''
        ||  $('#phone').val() == ''
        ||  $('#email').val() == '')
           
        {
          alert('Please fill all fields')
          return false
        }
      })
    </script>
<?php

//$result->close();
$conn->close();

function get_post($conn, $var)
{
  return $conn->real_escape_string($_POST[$var]);
}
?>
</div>
</body>

</html>
