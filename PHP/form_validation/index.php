<?php
    $name = '';
    $email = '';
    $pass = '';
    $address = '';
    $city = '';
    $province = '';
    $country = '';
    $comments = '';
    $gender = '';
    $website = '';

    $newsletter = '';
    $rb_female_checked = '';
    $rb_male_checked = '';

    $province_opts = '';
    $country_opts = '';
    //Hard-coding bad, give me a database or give me death.
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
    $country_arr = array(
        'CAN' => 'Canada',
        'USA' => 'United States',
        'MEX' => 'Mexico'
    );


    if (isset($_POST['mysubmit'])) {

        $name = trim($_POST['name']);
        $pass = trim($_POST['pass']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $email = trim($_POST['email']);
        $province = trim($_POST['province']);
        $country = trim($_POST['country']);
        $gender = trim($_POST['gender']);
        $newsletter = trim($_POST['newsletter']);
        $comments = trim($_POST['comments']);
        $website = (trim($_POST['website']));
        $valid = 1; // assume everything is OK; go ahead and process the form data
	    $msg_pre_error = "\n<div class=\"alert alert-danger\" role=\"alert\">";
	    $msg_pre_success = "\n<div class=\"alert alert-primary\" role=\"alert\">";
	    $msg_post = "</div>\n";


	//  name val
	if ((strlen($name) < 3) || (strlen($name) > 20)) {
		$valid = 0;
		$val_user_msg = "Please enter a Name from 3 to 20 characters.";
    }
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

    if ((strlen($pass) < 3) || (strlen($pass) > 20)) {
		$valid = 0;
		$val_pass_msg = "Please enter a Password from 3 to 20 characters.";
    }

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
    if($country == ''){
		$valid = 0;
		$val_country_msg = "\nPlease select a country.";
    }
    
    if (isset($newsletter)) {
		if ($newsletter == '1') {
			$cb_nl_checked = 'checked';
		} else {
			$cb_nl_checked = '';
		}
    }
    if ($website != '') {
		$website = filter_var($website, FILTER_SANITIZE_URL);

		if(!filter_var($website, FILTER_VALIDATE_URL)){ // validates correct website
			$valid = 0; 
			$val_website_msg = "\nPlease fill in a correct URL.";
		}
	} else {
		$valid = 0; 
		$val_website_msg = "\nPlease fill in an URL.";
	}
    //victory
    if ($valid == 1) {
		$msg_success = "SUCCESS. Form data is correct.";
	}

}// End of submit button press

    // generate province/country options
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
foreach ($country_arr as $val => $label) {
	if ($country == $val) {
		$coun_opt_sel = ' selected="selected"';
	} else {
		$coun_opt_sel = '';
	}

	$country_opts .= '<option value="' . $val . '"' . $coun_opt_sel . '>';
	$country_opts .= $label;
    $country_opts .= '</option>';
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Form Example</title>
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
    .row{
        display: flex;
    }
    .column{
        flex: 50%;
    }
    .required:before {
    content:"* ";
    color: red;
    font-weight: bold;
  }
	</style>
</head>
<body>
	<div class="container">
    
		<h1>PHP Form Validation</h1>
        <div class="row">
        <div class="column col-md-5">
		    <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

			<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
			    <div class="form-group">
				    <label class="required" for="name">Name:</label>
				    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    <?php 
					if ($val_user_msg) {
						echo $msg_pre_error . $val_user_msg . $msg_post;
					}
				?>
			    </div>
                <div class="form-group">
				    <label class="required" for="email">Email Address:</label>
				    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    <?php 
					if ($val_email_msg) {
						echo $msg_pre_error . $val_email_msg . $msg_post;
					}
				?>
			    </div>
                <div class="form-group">
				    <label class="required" for="pass">Password:</label>
				    <input type="password" class="form-control" name="pass">
                    <?php 
					if ($val_pass_msg) {
						echo $msg_pre_error . $val_pass_msg . $msg_post;
					}
				?>
                    
			    </div>
                <div class="form-group">
				    <label for="address">Address:</label>
				    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
			    </div>
                <div class="form-group">
				    <label for="city">City:</label>
				    <input type="text" class="form-control" name="city" value="<?php echo $city; ?>">
			    </div>
			<!-- / form-group -->

        </div>
        <div class="column col-md-5">
            <div class="form-group">
				<label for="province">Province:</label>
				<select class="form-control" name="province">
					<option value="">--- Please select a Province ---</option>
					<?php echo $province_opts; ?>
				</select>
			</div>
            <div class="form-group">
				<label class="required" for="country">Country:</label>
				<select class="form-control" name="country">
					<option value="">--- Please select your Country ---</option>
					<?php echo $country_opts; ?>
				</select>
				<?php 
					if ($val_country_msg) {
						echo $msg_pre_error . $val_country_msg . $msg_post;
					}
				?>
			</div>
            <div class="form-group">
				<label for="comments">Comments:</label>
				<textarea name="comments" class="form-control" rows="4"><?php echo $comments; ?></textarea>  
			</div>
            <div class="form-group">
				<label class="required" for="website">Website URL:</label>
				<input type="text" class="form-control" name="website" value="<?php echo $website; ?>" >
                <?php 
					if ($val_website_msg) {
						echo $msg_pre_error . $val_website_msg . $msg_post;
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
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="newsletter" value="1" <?php echo $cb_nl_checked; ?>>Subscribe to Newsletter
				</label>
			</div>

			<input type="submit" value="Submit" name="mysubmit" class="btn btn-primary">

		</form>
    </div><!-- column -->
    <?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>
    </div><!-- row -->
	</div><!-- / .container -->

</body>
</html>