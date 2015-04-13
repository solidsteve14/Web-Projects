<?php
if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}

$title = $_POST['title'];
$title = addslashes($title);
$year = $_POST['year'];
$select_statement = "SELECT * FROM Movies WHERE title='$title' AND year=$year;";
#echo "$select_statement";
$movie = $db->query($select_statement);
$movie = $movie->fetch();
?>
<form action="movie_update_confirm.php" method="post">
    <label>Enter Title:</label>
    <input type="text" name="title" value="<?php echo str_replace("\\", "", $title); ?>" /><br>
    <label>Enter Year:</label>
    <input type="text" name="year" value="<?php echo $year; ?>" /><br>
    <label>Enter Length:</label>
    <input type="text" name="length" value="<?php echo $movie['length']; ?>"  /><br>
    <label>Enter Genre:</label>
    <input type="text" name="genre" value="<?php echo $movie['genre']; ?>" /><br>
    <label>Enter Studio Name:</label>
    <input type="text" name="studio" value="<?php echo $movie['studioName']; ?>" /><br>
    <input type="submit" value="Update Movie" />
</form>