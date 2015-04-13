<?php 
echo '<h1>Packages</h1>';
$carID = $_GET['carid'];
$mileage = $_GET['mileage'];

$select_statement = "SELECT  carID, `year`, make, model, `type`, photoPath FROM CAR c, CAR_PHOTO cp WHERE c.carID = ".$carID." AND cp.CAR_carID = ".$carID.";";
$result = mysql_query($select_statement, $db);

echo "<div class='table-hover'>";
echo "<table class='table table-hover'>";
echo "<thead><tr><th>Year</th><th>Make</th><th>Model</th><th>Type</th></tr></thead>";
echo "<tbody>";
$carid = 0;
while ($car = mysql_fetch_assoc($result)) {
    if ($carid != $car['carID']) {
        $carid = $car['carID'];
        echo "</tr>";
        echo "<tr>";
        echo "<td>".$car['year']."</td>";
        echo "<td>".$car['make']."</td>";
        echo "<td>".$car['model']."</td>";
        echo "<td>".$car['type']."</td>";
        echo "<td><img class='img-responsive col-lg-12' src='".$car['photoPath']."'/></td>";
    } else {
        #echo "<td><img style='width:8em; height:6em;' src='" . $car['photoPath'] . "'/></td>";
        echo "<td><img class='img-responsive col-lg-12' src='".$car['photoPath']."'/></td>";
    }
    
}
echo "</tbody></table></div>";

?>
<form class="form-inline" role="form" action="cars.php" method='get'>
    <div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">
            Enter Mileage to adjust prices:
        </div>
        <input class='form-control' type="text" name="mileage" value="<?php echo $mileage ?>" onkeypress="return isNumberKey(event)" maxlength=6 />
    </div>
	<input type="hidden" name="action" value="package" />
	<input type="hidden" name="carid" value="<?php echo $carID?>" />
    <button class="form-control btn-primary btn-block" type="Search">
        Adjust prices
    </button>
</form>
<?php 
$select_statement = "SELECT basePrice, packageName, mpg, horsepower, engineSize, transmission FROM PACKAGE WHERE CAR_carID = ".$carID.";";
$result = mysql_query($select_statement, $db);

echo "<div class='table-hover'>";
echo "<table class='table table-hover'>";
echo "<thead>
		<tr>
		<th>Package</th>
		<th>MPG</th>
		<th>HorsePower</th
		><th>Engine</th>
		<th>Transmission</th>
		<th>Price - Fair</th>
		<th>Price - Good</th>
		<th>Price - Excellent</th>
		</tr>
		</thead>";
echo "<tbody>";

$mileageCoef = 1;
if ($mileage > 120000) {
    $mileageCoef = .8;
} elseif ($mileage < 80000) {
    $mileageCoef = 1.2;
}
$fair = .7;
$good = .8;
$excellent = 1;

while ($car = mysql_fetch_assoc($result)) {
    $title = htmlentities($car['year'], ENT_QUOTES); #echo $title;
    echo "<tr>";
    echo "<td>".$car['packageName']."</td>";
    echo "<td>".$car['mpg']."</td>";
    echo "<td>".$car['horsepower']."</td>";
    echo "<td>".$car['engineSize']." L</td>";
    echo "<td>".$car['transmission']."</td>";
    echo "<td>$".$car['basePrice'] * $mileageCoef * $fair."</td>";
    echo "<td>$".$car['basePrice'] * $mileageCoef * $good."</td>";
    echo "<td>$".$car['basePrice'] * $mileageCoef * $excellent."</td>";
    echo "</tr>";
}
echo "</tbody></table></div>";

echo '<h2>Reviews</h2>';
// Make review form
?>
<form action="submit_review.php" method="get">
    <input type="text" name="rating" placeholder="Give a rating 1-5" maxlength="1" /></br>
	<textarea type="textbox" name="description" placeholder="Give a description of why you gave that rating." maxlength=200></textarea></br>
    <input type="hidden" name="carid" value=<?=$carid?> />
    <input type="submit" value="Submit Review">
</form>
<? 
// Output reviews for this car in database

 $select_statement = "SELECT * FROM REVIEW
						WHERE PACKAGE_packageID IN (
								SELECT DISTINCT packageID FROM CAR c, PACKAGE p
								WHERE c.carID = p.CAR_carID
								AND c.carID = ". $carid .")";
 $result = mysql_query($select_statement, $db);
 echo "<div class='table-hover'>";
 echo "<table class='table table-hover'>";
 echo "<thead><tr><th>Rating</th><th>Review</th></tr></thead>";
 echo "<tbody>";
 
 while ($car = mysql_fetch_assoc($result)) {
 $title = htmlentities($car['rating'], ENT_QUOTES); #echo $title;
 echo "<tr>";
 echo "<td>" . $car['rating'] . "</td>";
 echo "<td class=\"span9\">" . $car['description'] . "</td>";
 echo "</tr>";
 }
 echo "</tbody></table></div>";

include("footer.php");
?>
