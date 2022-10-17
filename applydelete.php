<?php

/* Apply and Delete functionality. Using autoincrement Application ID 'aid' for deleting record, and sending 'aid' to update page for updating record*/

include_once 'header.php';

require_once 'include/config.inc.php';

$school_id1 = $_POST['schoolid'];
$user_id1 = $_SESSION["userid"];



if (isset($_POST['delete']) && isset($_POST['aid'])) {
    $aid = get_post($conn, 'aid');
    $query = "DELETE FROM applications WHERE aid='$aid'";
    $result = $conn->query($query);
    if (!$result)
        echo "DELETE failed<br><br>";
}

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
        echo $schoolid1;
echo "<br>";
echo $userid1;
    $query = "INSERT INTO applications(school_id, user_id, firstname, lastname, phone, email) VALUES('$school_id', '$user_id', '$firstname', '$lastname', '$phone', '$email');";
    $result = $conn->query($query);
    if (!$result)
        echo "Application Failed. Please Apply Later<br><br>";
}

?>
<head>
<link rel="stylesheet" href="schoolstyle.css">
<h1>Application Form</h1><br>
</head>
<div class="applyform">
<form id='applicationform' action="applydelete.php" method="post">
          <input id='school_id' input type="text" name="school_id" value="<?=$school_id1?>" placeholder="School ID">
          <input type="hidden" name="user_id" value="<?=$user_id1?>">
          <!--<input type="text" name="id" placeholder="School Id">Old DB-->
          <input id='firstname' input type="text" name="firstname" placeholder="First Name">
          <input id='lastname' input type="text" name="lastname" placeholder="Last Name">
          <input id='phone' input type="text" name="phone" placeholder="Phone Number">
          <input id='email' input type="text" name="email" placeholder="Email">
          <input type="submit" value="APPLY">
          </form>
          <script>
          //Jquery below for submit event for checking empty fields
      $('#applicationform').submit(function()
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
          <form action="search.php" method="post">
          <input type='submit' value='CANCEL'>
</form>
</div><br>

<?php
$query = "SELECT * FROM applications WHERE user_id = '$user_id1'";
$result = $conn->query($query);
if (!$result)
    die("Database access failed");

$rows = $result->num_rows;
?>
<!--jquery fo hiding and showing applications-->
<button class="button button2" button id='slidedown'>SHOW APPLICATIONS</button>
<button class="button button2" button id='slideup'>HIDE APPLICATIONS</button>
<div id='applicationtable'>
<?php
echo "<table id='schooltable'>";
echo "<thead><tr><th>APPLICATION ID</th><th>SCHOOL ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>PHONE</th><th>EMAIL</th><th>DELETE/UPDATE</th></tr></thead><tbody>";

for ($j = 0; $j < $rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_BOTH);

    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);
    $r3 = htmlspecialchars($row[3]);
    $r4 = htmlspecialchars($row[4]);
    $r5 = htmlspecialchars($row[5]);
    $r6 = htmlspecialchars($row[6]);
?>
    <tr>
        <td> <?= $r0 ?> </td>
        <!--Inserted PHP Variable in HTML-->
        <td> <?= $r1 ?> </td>
       <!-- <td> <?= $r2 ?> </td>-->
        <td> <?= $r3 ?> </td>
        <td> <?= $r4 ?> </td>
        <td> <?= $r5 ?> </td>
        <td> <?= $r6 ?> </td>
        <td>
      
            <form action='' method='post'>
                <input type='hidden' name='delete' value='yes'>
                <input type='hidden' name='aid' value='<?= $r0 ?>'>
                <input type='submit' value='DELETE'>
            </form>


            <form action='update.php' method='post'>
                <!--sending $d4 to update.php to retrieve details-->
                <input type='hidden' name='aid1' value="<?= $r0 ?>">
                <input type="hidden" name="school_id1" value="<?= $r1 ?>">
                <input type="hidden" name="user_id1" value="<?= $r2 ?>">
                <input type="hidden" name="firstname1" value="<?= $r3 ?>">
                <input type="hidden" name="lastname1" value="<?= $r4 ?>">
                <input type="hidden" name="phone1" value="<?= $r5 ?>">
                <input type="hidden" name="email1" value="<?= $r6 ?>">
                <input type="submit" value="UPDATE"> 
            </form>

            <!--Sending aid to update.php for updating record-->


        </td>
    </tr>
    </div>
    <script>
      $('#slideup')    .click(function() { $('#applicationtable').slideUp(    'slow') })
      $('#slidedown')  .click(function() { $('#applicationtable').slideDown(  'slow') })
    </script>
<?php
}

echo "</tbody></table>";
?>
<br>
<br>
<!--<a href="search.php"><button>HOME</button></a>-->
<!--Home button to go back to index.php-->

<?php
$result->close();
$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>
</div>
</body>

</html>

