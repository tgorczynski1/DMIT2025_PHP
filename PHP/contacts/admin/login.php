<?php
	$username = $_POST['username'];
	$password = $_POST['user_password'];

	// authenticate user
	// REPLACE VALUES WITH YOUR OWN !!!

	if (($username == "thomas") && ($password == "pass")) {

		session_start(); 


		$_SESSION['ghdhdtrnvgngdtfndnghsdw'] = session_id(); 


		header("Location:insert.php"); 
		// Redirects user to welcome page

	} else {
		
		if (($username != "") && ($password != "")) {
			echo "Invalid Login"; 
			// Just for testing
			// In a real site, we wouldn't echo something before the doctype, body, etc.
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Secure login exercise | LOGIN</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

	<style type="text/css">
		.formstyle {
			max-width:450px;
		}
		.btm-mar {
			margin-bottom: 1rem;
		}
	</style>
</head>
<body>
	<div class="container">

		<h1>LOGIN</h1>

		<form name="loginform" class="formstyle" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
			</div>

			<div class="form-group">
				<label for="user_password">Password:</label>
				<input type="password" class="form-control" name="user_password" value="<?php echo $password; ?>">
			</div>

			<input type="submit" class="btn btn-primary" name="submit" value="Login">

		</form>

		<div class="mathematical-output">
			<?php



			?>
		</div>

	</div><!-- / .container -->

</body>
</html>