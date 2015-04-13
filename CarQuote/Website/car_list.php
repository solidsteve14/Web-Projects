<?php

echo '<h1>Car List</h1>';

if (isset($_GET['year'])) {
    $year= $_GET['year'];
} else {
    $year = '';
}

if (isset($_GET['make'])) {
    $make= $_GET['make'];
} else {
    $make = '';
}

if (isset($_GET['model'])) {
    $model= $_GET['model'];
} else {
    $model = '';
}

if (!isset($db)) {
		require('dbconnect.php');
		$db = get_connection();
}
$select_statement = "SELECT  carID, `year`, make, model, `type`, photoPath FROM CAR c, CAR_PHOTO cp WHERE c.carID = cp.CAR_carID";

if ($year != '') {
	$year = (int) $year;
    $select_statement .= " AND `year` = $year";
}
if ($make != '') {
	$select_statement .= " AND make = '$make'";
}
if ($model != '') {
	$select_statement .= " AND model = '$model'";
}
$select_statement .= " ORDER BY year DESC, make, model;";
$result = mysql_query($select_statement);
$num_rows = mysql_num_rows($result);
if($num_rows > 0){
	echo "<div class='table-hover'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th>Make</th><th>Model</th><th>Year</th><th>Type</th></tr></thead>";
	echo "<tbody>";
}
else{
	echo "Sorry no cars found, I owe you a cookie.";
}
$carid = 0;	
while ($car = mysql_fetch_assoc($result)) {
		if($carid != $car['carID']){
			$carid = $car['carID'];
			echo "</tr>";
			echo "<tr onclick=window.document.location='cars.php?action=package&carid=". $car['carID'] . "&mileage=100000'>";
			echo "<td>" . $car['year'] . "</td>";
	        echo "<td>" . $car['make'] . "</td>";
			echo "<td>" . $car['model'] . "</td>";
	        echo "<td>" . $car['type'] . "</td>";
			echo "<td><img class='img-responsive col-lg-12' src='" . $car['photoPath'] . "'/></td>";
		}
    	else{
    		#echo "<td><img style='width:8em; height:6em;' src='" . $car['photoPath'] . "'/></td>";
    		echo "<td><img class='img-responsive col-lg-12' src='" . $car['photoPath'] . "'/></td>";
    	}

}
	
	echo "</tbody></table></div>";
?>
