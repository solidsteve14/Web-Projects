<?php
	$action = $_GET['action'];
	if (!isset($db)) {
		require('dbconnect.php');
		$db = get_connection();
	}
	switch($action) {
				case 'get_user':
					if(isset($_GET['inputEmail']) && isset($_GET['inputPassword'])){
						$email = $_GET['inputEmail'];
						$password = $_GET['inputPassword'];
						$result = mysql_query("SELECT * FROM USER WHERE email='$email' AND password='$password';", $db);
						$num_rows = mysql_num_rows($result);

						if($num_rows > 0){
							session_start();
							$_SESSION['user'] = $email;
							$string = "cars.php";
							header("location:$string");
						}else{
							$err = "Incorrect Email/Password Combination";
							$message = "index.php?message=".$err;
							header("location:$message");
						}
					}
					break;
				case 'set_user':
					if(isset($_GET['inputEmail']) && isset($_GET['inputPassword']) && isset($_GET['inputZipcode'])){
						$remail = $_GET['inputEmail'];
						$rpassword = $_GET['inputPassword'];
						$rzipcode = $_GET['inputZipcode'];
						$rresult = mysql_query("SELECT * FROM USER WHERE email='$remail';", $db);
						$rnum_rows = mysql_num_rows($rresult);
						#if user not exist then add new 
						if($rnum_rows == 0){
							$query ="INSERT INTO USER(email,password,zipcode,type) VALUES ('$remail','$rpassword','$rzipcode','consumer');";
							$insert=mysql_query($query);
							//$insert = "INSERT INTO USER (`email`, `password`, `zipcode`, `type`) VALUES ('$remail', '$rpassword','$rzipcode','consumer');";
							if($insert)
								header("location:index.php");
							else
								echo "something went wrong";
						}else{
							$err = "This user is already exist";
							$message = "create_account.php?message=".$err;
							header("location:$message");
						}
					}
					//$string = "create_account.php";
					//header("location:$string");
					break;
				default:
		}
?>
