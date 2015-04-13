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
			$insert_statement = "INSERT INTO Movies VALUES('$title', $year, $length, '$genre', '$studio', null);";
			//echo "$insert_statement";
			$db->exec($insert_statement);
		}
		catch(Exception $e) {
					echo "Inserting Movie";
		}
		header('Location: movies.php?action=list');

?>
