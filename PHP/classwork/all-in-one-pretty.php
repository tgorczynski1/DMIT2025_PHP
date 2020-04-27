<?php 
// Declare variables for later use
$user = '';
$email = '';
$province = '';
$gender = '';
$newsletter = '';
$comments = '';

$rb_female_checked = '';
$rb_male_checked = '';

$province_opts = '';

$province_arr = array(
	'AB' => 'Alberta',
	'BC' => 'British Columbia',
	'MN' => 'Manitoba',
	'NB' => 'New Brunswick',
	'NL' => 'Newfoundland and Labrador',
	'NS' => 'Nova Scotia',
	'ON' => 'Ontario',
	'PE' => 'Prince Edward Island',
	'QC' => 'Quebec',
	'SK' => 'Saskatchewan',
	'NT' => 'Northwest Territories',
	'NU' => 'Nunavut',
	'YT' => 'Yukon'
);

if (isset($_POST['mysubmit'])) {

	$user = trim($_POST['user']);
	$email = trim($_POST['email']);
	$province = trim($_POST['province']);
	$gender = trim($_POST['gender']);
	$newsletter = trim($_POST['newsletter']);
	$comments = trim($_POST['comments']);

	//echo "$user, $email, $province, $gender, $newsletter, $comments";

	$valid = 1; // assume everything is OK; go ahead and process the form data
	$msg_pre_error = "\n<div class=\"alert alert-danger\" role=\"alert\">";
	$msg_pre_success = "\n<div class=\"alert alert-primary\" role=\"alert\">";
	$msg_post = "</div>\n";


	// user name val
	if ((strlen($user) < 3) || (strlen($user) > 20)) {
		$valid = 0;
		// specific message 
		$val_user_msg = "Please enter a Name from 3 to 20 characters.";
	}

	// email val
	if ($email != '') {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // validates correct email format
			$valid = 0; 
			$val_email_msg = "\nPlease fill in a correct email address.";
		}
	} else {
		$valid = 0; 
		$val_email_msg = "\nPlease fill in an email address.";
	}

	// gender val
	if (isset($gender)) {
		switch ($gender) {
			case 'male':
				$rb_female_checked = '';
				$rb_male_checked = ' checked="checked"';
				break;

			case 'female':
				$rb_female_checked = ' checked="checked"';
				$rb_male_checked = '';
				break;
		}
	}

	// newsletter val
	if (isset($newsletter)) {
		if ($newsletter == '1') {
			$cb_nl_checked = 'checked';
		} else {
			$cb_nl_checked = '';
		}
	}

	// province val
	if($province == ''){
		$valid = 0;
		$val_prov_msg = "\nPlease select a province.";
	}

	// SUCCESS. If our boolean ($valid) is still 1, then user form data is good, go ahead and process this form
	if ($valid == 1) {
		$msg_success = "SUCCESS. Form data is correct.";
	}
}

// generate province options
foreach ($province_arr as $val => $label) {
	if ($province == $val) {
		$prov_opt_sel = ' selected="selected"';
	} else {
		$prov_opt_sel = '';
	}

	$province_opts .= '<option value="' . $val . '"' . $prov_opt_sel . '>';
	$province_opts .= $label;
	$province_opts .= '</option>';

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Validation</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		.formstyle { /* optional: in case you don't like the really wide form */
			max-width: 650px;
		}
	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container">

		<h1>PHP Form Validation</h1>
		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

			<div class="form-group">
				<label for="user">Name:</label>
				<input type="text" class="form-control" name="user" value="<?php echo $user; ?>">  
				<?php 
					if ($val_user_msg) {
						echo $msg_pre_error . $val_user_msg . $msg_post;
					}
				?>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">  
				<?php 
					if ($val_email_msg) {
						echo $msg_pre_error . $val_email_msg . $msg_post;
					}
				?>
			</div>

			<div class="form-group">
				<label for="province">Province:</label>
				<select class="form-control" name="province">
					<option value="">--- Please select a Province ---</option>
					<?php echo $province_opts; ?>
				</select>
				<?php 
					if ($val_prov_msg) {
						echo $msg_pre_error . $val_prov_msg . $msg_post;
					}
				?>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="male"<?php echo $rb_male_checked; ?>>Male
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="female"<?php echo $rb_female_checked; ?>>Female
				</label>
			</div>

			<br>

			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="newsletter" value="1" <?php echo $cb_nl_checked; ?>>Subscribe to Newsletter
				</label>
			</div>

			<br>

			<div class="form-group">
				<label for="comments">Comments:</label>
				<textarea name="comments" class="form-control" rows="4"><?php echo $comments; ?></textarea>  
			</div>

			<input type="submit" class="btn btn-primary" name="mysubmit">

		</form>

		<?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>

	</div><!-- / .container -->

</body>
</html>