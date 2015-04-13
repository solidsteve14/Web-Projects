<?php session_destroy();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CarQuote</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
	<div class="col-md-4 col-md-offset-4">
		<img src="CarquoteLogo.png" />
      <form class="form-signin" role="form" action="login.php" method='GET'>
      	<input type="hidden" name="action" value="get_user" />
        <h2 class="form-signin-heading">Please sign in</h2>
		<label class='text-danger'>
		<?php if(isset($_GET['message'])) echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'.$_GET['message']; ?>
		</label>
        <label for="inputEmail" class="sr-only">Email address</label>
        	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
		
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
		Or</br><a href='create_account.php'>Create an account</a>     
    </div> <!-- /container -->
  </body>
</html>
