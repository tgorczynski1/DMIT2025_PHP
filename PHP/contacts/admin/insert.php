<?php
	session_start();
	if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
		// echo "Logged In.";
	} else {
		header("Location:login.php");
	}
	include("../includes/header.php");

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
	
	if (isset($_POST['submit'])) 
	{				
			$company = trim($_POST['company']);
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$address = trim($_POST['address']);
			$city = trim($_POST['city']);
			$resume = trim($_POST['resume']) ? 1 : 0;
			$province = trim($_POST['province']);
			$description = trim($_POST['description']);
			$website = trim($_POST['website']);
			$email = trim($_POST['email']);
			$phone = trim($_POST['phone']);

			//echo $email;
			//echo $company;
			$valid = 1;

			if ((strlen($company) < 2) || (strlen($company) > 30)) {
				$valid = 0;
				$val_comp_msg = "Please enter a Company Name from 2 to 30 characters. Insert failed";
			}

			if ($website  != "") {
				$website = filter_var($website , FILTER_SANITIZE_URL);
				if (!filter_var($website, FILTER_VALIDATE_URL)) {
					$valid = 0;
					$val_web_msg .= "$website is not a valid URL. HINT: try https://www.example.com";
				}
			} else {
				$valid = 0;
				$val_web_msg .= "please enter a valid URL.";
			}
			if ($email != "") {
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$valid = 0;
					$val_email_msg .= "$email is not a valid email address.";
				}
			} else {
				$valid = 0;
				$val_email_msg .= "Please enter an email address.";
			}
			if ($phone != "") {
				//$phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
				if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
					$valid = 0;
					$val_phone_msg .= "$phone is not a valid phone number HINT: try XXX-XXX-XXXX.";
				}
			} else {
				$valid = 0;
				$val_phone_msg .= "Please enter the phone number.";
			}
			
			
			if ($valid == 1) {
				$msg_success = "Contact has been inserted.";
				mysqli_query($con, "INSERT INTO tgo_Contacts (tgo_company, tgo_fname, tgo_lname, tgo_email, tgo_website, tgo_phone, tgo_address, tgo_city, tgo_province, tgo_description, tgo_resume) 
				VALUES ('$company','$fname','$lname','$email','$website','$phone','$address','$city','$province','$description','$resume')")or die(mysqli_error($con));
				$company = '';
				$fname = '';
				$lname = '';
				$address = '';
				$city = '';
				$resume = '';
				$province = '';
				$description = '';
				$website = '';
				$email = '';
				$phone = '';
				
			}
			

	}// end of submit event

	// for province array
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

<h2>Insert</h2>
<p class="required"> = required field </p>
<div class="row">
        <div class="column col-md-5">
		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<div class="form-group">
				<label class="required" for="company">Company Name:</label>
				<input type="text" class="form-control" name="company" value="<?php if($company ) {echo $company;} ?>"  >
				<?php 
					if ($val_comp_msg) {
						echo $msg_pre_error . $val_comp_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="fname">First Name:</label>
			<input type="text" name="fname" class="form-control" value="<?php if($fname ) {echo $fname;} ?>">
		</div>
		<div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" class="form-control" value="<?php if($lname ) {echo $lname;} ?>">
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" name="address" class="form-control" value="<?php if($address ) {echo $address;} ?>">
		</div>
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" name="city" class="form-control" value="<?php if($city ) {echo $city;} ?>">
		</div>
		<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="resume" value="1" <?php if ($resume) {echo "checked";} ?> >Send Résumé 
				</label>
			</div>
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
				<label for="description">Description:</label>
				<textarea name="description" class="form-control" rows="3"><?php if($description ) {echo $description;} ?></textarea>  
			</div>
            <div class="form-group">
				<label class="required" for="website">Website URL:</label>
				<input type="text" class="form-control" name="website" value="<?php if($website ) {echo $website;} ?>" >
                <?php 
					if ($val_web_msg) {
						echo $msg_pre_error . $val_web_msg . $msg_post;
					}
				?>
			</div>
			<div class="form-group">
				<label class="required" for="email">Email:</label>
				<input type="text" name="email" class="form-control" value="<?php if($email ) {echo $email;} ?>">
				<?php 
					if ($val_email_msg) {
						echo $msg_pre_error . $val_email_msg . $msg_post;
					}
				?>
			</div>
			<div class="form-group">
				<label class="required" for="phone">Phone Number:</label>
				<input type="text" name="phone" class="form-control" value="<?php if($phone ) {echo $phone;} ?>">
				<?php
					if ($val_phone_msg) {
						echo $msg_pre_error . $val_phone_msg . $msg_post;
					}

				?>
			</div>

			<input type="submit" value="Submit" name="submit" class="btn btn-primary">

		</form>
    </div><!-- column -->
    <?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>
    </div>
	</div><!-- row -->
<?php

	include("../includes/footer.php");
?>