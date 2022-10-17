<?php
require_once 'include/config.inc.php';

$sql="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('GHI Elementary School', '10', '2 Elementary School Drive', 'Highlands Ranch', '80129');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('JKL Elementary School', '9', '3 Elementary School Drive', 'Highlands Ranch', '80129');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('AAC Elementary School', '8', '8 Elementary School Drive', 'Highlands Ranch', '80129');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('AAD Elementary School', '9', '9 Elementary School Drive', 'Highlands Ranch', '80129');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('ABC Elementary School', '10', 'Elementary School Drive', 'Denver', '80014');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('DEF Elementary School', '9', '1 Elementary School Drive', 'Denver', '80014');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('AAG Elementary School', '9', '12 Elementary School Drive', 'Denver', '80014');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('AAF Elementary School', '8', '11 Elementary School Drive', 'Denver', '80014');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('AAE Elementary School', '10', '10 Elementary School Drive', 'Denver', '80014');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('MNO Elementary School', '9', '4 Elementary School Drive', 'Aurora', '80015');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('PQR Elementary School', '9', '5 Elementary School Drive', 'Aurora', '80015');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('JKL Elementary School', '9', '6 Elementary School Drive', 'Aurora', '80015');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('BAA Elementary School', '10', '14 Elementary School Drive', 'Aurora', '80015');";
$sql.="INSERT INTO schooldetail(schoolname, rating, address, city, zip) VALUES('BAB Elementary School', '9', '15 Elementary School Drive', 'Aurora', '80015');";

if ($conn->multi_query($sql) === TRUE) {
  echo "Schooldetails are added to schooldetail table successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>