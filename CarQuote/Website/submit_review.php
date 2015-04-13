<?php
session_start();
if (!isset($db)) {
	require('dbconnect.php');
	$db = get_connection();
}

$rating = (int)$_GET['rating'];
$description = $_GET['description'];
$carid = (int)$_GET['carid'];
$email = $_SESSION['user'];
$packageid = 0;

//Get a package id for the review from car id

$select_statement = "SELECT DISTINCT packageID FROM CAR c, PACKAGE p
    WHERE c.carID = p.CAR_carID
    AND c.carID =".$carid.";";
echo $select_statement;
echo "<br>";
$result = mysql_query($select_statement, $db);
while ($review = mysql_fetch_assoc($result)) {
	$packageid = $review['packageID'];
}

	echo "rating: ".$rating;
	echo "<br>";
	echo "description: ". $description;
	echo "<br>";
	echo "user email: ". $_SESSION['user'];
	echo "<br>";
	echo "car id: ". $carid;
	echo "<br>";
	echo "packageid: ". $packageid;
	echo "<br>";

// INSERT REVIEW
$query ="INSERT INTO REVIEW VALUES ($rating,'$description','$email',$packageid);";
echo $query;
$insert=mysql_query($query);

header("location:cars.php?action=package&carid=$carid&mileage=100000");
?>
