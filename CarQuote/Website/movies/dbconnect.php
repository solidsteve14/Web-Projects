<?php

	function get_connection() {
		$dsn = 'mysql:host=cssgate.insttech.washington.edu;dbname=mmuppa'; //Change dbname to yours
		$userid = 'mmuppa'; //Change this to yours
		$password = 'Byunoyb'; //Change this to yours

		try {
		    $db = new PDO($dsn, $userid, $password);
		}
		catch(PDOException $e) {
			echo "Error connecting to database";
	    }
	    	return $db;
	}
?>