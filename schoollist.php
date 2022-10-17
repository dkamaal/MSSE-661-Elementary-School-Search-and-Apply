<?php
include_once 'header.php';

require_once 'include/config.inc.php';

$zip = $_POST['zip'];

$query = "SELECT * FROM schooldetail WHERE zip = '$zip'";
$result = $conn->query($query);

if (!$result)
    die("Fatal_Error");

$rows = $result->num_rows;

if ($rows == 0)
    echo "<h2>Sorry, No School available in selected ZIP Code. Please go back and try again</h2><br><br>"; //If no row is returned from database

echo "<table id='schooltable'>";
echo "<thead><tr><th>School ID</th><th>School Name</th><th>Rating</th><th>SchoolDetails/Apply</th></tr></thead><tbody>";
for ($j = 0; $j < $rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_BOTH);

    $d0 = $row[0];
    $d1 = $row[1];
    $d2 = $row[2];
?>

    <head>
        <link rel="stylesheet" href="schoolstyle.css">
    </head><br>

    <tr>
        <td>
            <?= $d0 ?>
        </td>
        <td>
            <?= $d1 ?>
        </td>
        <td>
            <?= $d2 ?>
        </td>
        <td>


            <form action='schooldetail.php' method='post'>
                <!--sending $d0 to detail.php to retrieve details-->
                <input type="hidden" name='schoolid' value="<?= $d0 ?>">
                <button class="button button1" button type="submit">School Detail</button>
                <!--Sending id to detail.php for displaying school details-->
            </form>

            <!--Apply button to go to applydelete.php for applying and deleting record-->

            <form action='applydelete.php' method='post'>

                <input type="hidden" name='schoolid' value="<?= $d0 ?>">
                <button class="button button1" button type="submit">Apply</button>
                <!--Sending id to applydelete.php for displaying school details-->
            </form>
        </td>
    </tr>

<?php
}
echo "</tbody></table>";

$result->close();
$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>
<br>
<a href="search.php"><button class="button button2">GO BACK</button></a>
<!--Back button to go back to search.php or Home page-->
</div>
</body>

</html>