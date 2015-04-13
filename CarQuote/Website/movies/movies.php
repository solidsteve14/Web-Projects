<?php
	if (isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = 'list';
	if (!isset($db)) {
		require('dbconnect.php');
		$db = get_connection();
	}

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Movies</title>
	<link rel="stylesheet" href="styles/main.css">
</head>

<body>
<?php include('header.php'); ?>

  <section>
  <?php
  	switch($action) {
			case 'list':
				include('movie_list.php');
				break;
			case 'search':
				include('movie_search.php');
				break;
			case 'add':
				include('movie_add.php');
				break;
			case 'update':
			    	$title =  $_POST['title'];
				$year= $_POST['year'];
                                                                    #echo $title;
				include('movie_update.php');
				break;
			default:
	}
	?>
  </section>

<footer>
	<p>&copy; 2013 TCSS445</p>
  </footer>
</body>
</html>