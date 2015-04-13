<?php
	function get_connection() {
		$db = mysql_connect("cssgate.insttech.washington.edu", "_445team6", "EitJaj");
		mysql_select_db("_445team6", $db);
		return $db;
	}
?>