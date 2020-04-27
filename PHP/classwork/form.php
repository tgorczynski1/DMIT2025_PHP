<!DOCTYPE html>
<html>
<head>
	<title>Form validation 1 | Next page example</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

	<style type="text/css">
	.formstyle{ /* optional: in case you don't like the really wide form */
		max-width:450px;
	}
	.btm-mar {
		margin-bottom: 1rem;
	}
	</style>
</head>
<body>
	<div class="container">

		<h1>
			<div>Form validation 1 | Next page example</div>
			<small class="text-muted"><em>Form page</em></small>
		</h1>

		<form name="form-validation" class="formstyle" method="post" action="my-2nd-page.php">

			<div class="form-group">
				<label for="fullname">Full name:</label>
				<input type="text" class="form-control" name="fullname" placeholder="Full name...">
			</div>

			<div class="form-group">
				<label for="email_address">Email address:</label>
				<!-- <input type="email" class="form-control" name="email_address" placeholder="Email address..."> -->
				<input type="text" class="form-control" name="email_address" placeholder="Email address...">
			</div>

			<div class="form-group">
				<label for="phone">Phone: </label>
				<small class="text-muted"><em>xxx-xxx-xxxx</em></small>
				<!-- <input type="tel" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone number..."> -->
				<input type="text" class="form-control" name="phone" placeholder="Phone number...">
			</div>

			<div class="form-group">
				<label for="message">Message:</label>
				<textarea class="form-control" name="message"></textarea>
			</div>

			<input type="submit" class="btn btn-primary" value="Validate my form">

		</form>

	</div><!-- / .container -->

</body>
</html>