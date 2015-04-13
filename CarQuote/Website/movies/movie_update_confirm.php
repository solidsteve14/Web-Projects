<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			global $db;
			$title = addslashes($_POST['title']);
			$year= $_POST['year'];
			$length = $_POST['length'];
			$genre = $_POST['genre'];
			$studio = $_POST['studio'];
			$update_statement = "UPDATE Movies SET length=$length, genre='$genre', studioName='$studio' WHERE title='$title' AND year=$year;";
			//echo "$update_statement";
			$db->exec($update_statement);
		}
		catch(Exception $e) {
					echo "Error: Updating Movie";
		}
		header('Location: movies.php?action=list');

?>
