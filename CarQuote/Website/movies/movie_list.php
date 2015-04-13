<?php

echo '<h1>Movies List</h1>';

if (isset($_POST['title']))
    $filter = addslashes($_POST['title']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
$select_statement = "SELECT * FROM Movies ";
if ($filter != '')
    $select_statement .= "WHERE title LIKE '%$filter%';";
else
    $select_statement .= ";";
$movies = $db->query($select_statement);

if ($movies != null) {
    echo "<table border='1'>";
    echo "<tr><th></th><th>Title</th><th>Year</th><th>Length</th></tr>";
    foreach ($movies as $movie) {
        $title = htmlentities($movie[0], ENT_QUOTES);
        #echo $title;
        echo "<tr><td><form action='movies.php?action=update' method='post'><input type='hidden' name='title' value='$title' />
			        		<input type='hidden' name='year' value='$movie[1]' /><input type='submit' value='Edit' /></form></td>";
        echo "<td>" . $movie[0] . "</td>";
        echo "<td>" . $movie[1] . "</td>";
        echo "<td>" . $movie[2] . "</td></tr>";
    }
    echo "</table>";
}
?>