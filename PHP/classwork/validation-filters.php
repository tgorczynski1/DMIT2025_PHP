<?php

$fullname = $_POST['fullname'];
$email_addy = $_POST['email_address'];
$website = $_POST['website'];
$message = $_POST['message'];

/*
	DOCUMENTATION:
	=====

	filter_var: https://www.php.net/manual/en/function.filter-var.php
	All sanitization filters: https://www.php.net/manual/en/filter.filters.sanitize.php
	All validation filters: https://www.php.net/manual/en/filter.filters.validate.php
*/
if (isset($_POST['submit'])) {

	// validate name or any text field using filter
	// DOCUMENTATION: https://www.w3schools.com/php/filter_sanitize_string.asp
	if ($fullname != "") {
		$fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
		if ($fullname == "") {
			$errors .= "<li>Please enter a valid name.</li>";
		}
	} else {
		$errors .= "<li>Please enter your name.</li>";
	}

	// validate email using filter
	// DOCUMENTATION: https://www.w3schools.com/php/filter_sanitize_email.asp
	if ($email_addy != "") {
		$email_addy = filter_var($email_addy, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email_addy, FILTER_VALIDATE_EMAIL)) {
			$errors .= "<li>$email_addy is <strong>NOT</strong> a valid email address.</li>";
		}
	} else {
		$errors .= "<li>Please enter your email address.</li>";
	}

	// validate URL using filter: URL must have the http://
	// DOCUMENTATION: https://www.w3schools.com/php/filter_sanitize_url.asp
	if ($website  != "") {
		$website = filter_var($website , FILTER_SANITIZE_URL);
		if (!filter_var($website, FILTER_VALIDATE_URL)) {
			$errors .= "<li>$website is <strong>NOT</strong> a valid URL.</li>";
		}
	} else {
		$errors .= "<li>Please enter a valid URL.</li>";
	}

	// Sanitize our message
	$message = filter_var($message, FILTER_SANITIZE_STRING);

	if (!$errors) {
		// We apply our success message data processing if there are no errors listed
		$alert_msgs .= "<div class=\"alert alert-success\">";
		$alert_msgs .= "<h3>OUR FORM DATA</h3>";
		$alert_msgs .= "<hr/>";
		$alert_msgs .= "<p><strong>FULL NAME:</strong><br/>$fullname</p>";
		$alert_msgs .= "<p><strong>EMAIL ADDRESS:</strong><br/>$email_addy</p>";
		$alert_msgs .= "<p><strong>WEBSITE URL:</strong><br/>$website</p>";
		$alert_msgs .= "<p><strong>MESSAGE:</strong><br/>$message</p>";
		$alert_msgs .= "</div>";
	} else {
		// Display our error messages if the form is invalid
		$alert_msgs .= "<div class=\"alert alert-danger\">";
		$alert_msgs .= "<ul>$errors</ul>";
		$alert_msgs .= "</div>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form validation 3 | Validation filters</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

	<style type="text/css">
		.formstyle { /* optional: in case you don't like the really wide form */
			max-width:450px;
		}
		.btm-mar {
			margin-bottom: 1rem;
		}
	</style>
</head>
<body>
	<div class="container">

		<h1>Form validation 3 | Validation filters</h1>

		<form name="form-validation" class="formstyle btm-mar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="form-group">
				<label for="fullname">Full name:</label>
				<input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" placeholder="lalal">
			</div>

			<div class="form-group">
				<label for="email_address">Email address:</label>
				<input type="text" class="form-control" name="email_address" value="<?php echo $email_addy; ?>" placeholder="Email address...">
			</div>

			<div class="form-group">
				<label for="website">Website URL: </label>
				<input type="text" class="form-control" name="website" value="<?php echo $website; ?>" placeholder="Website URL...">
			</div>

			<div class="form-group">
				<label for="message">Message:</label>
				<textarea class="form-control" name="message"><?php echo $message; ?></textarea>
			</div>

			<input type="submit" class="btn btn-primary" name="submit" value="Validate my form">

		</form>

		<?php echo $alert_msgs; ?>

	</div><!-- / .container -->

</body>
</html>