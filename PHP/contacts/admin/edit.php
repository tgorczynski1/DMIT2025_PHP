<?php 
    session_start();
	if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
		// echo "Logged In.";
	} else {
		header("Location:login.php");
	}
    include("../includes/header.php");
    

    $result = mysqli_query($con, "SELECT * FROM tgo_Contacts") or die(mysqli_error($con));
    $char_id = '';
    $char_id = $_GET['id']; 
    //set random id
if (!isset($char_id)) 
{
    $result = mysqli_query($con, "SELECT cid FROM tgo_Contacts LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) 
    {

        $char_id = $row['cid'];
    }
}   
$result = mysqli_query($con, "SELECT * FROM tgo_Contacts ORDER BY tgo_company") or die(mysqli_error($con));
// loop thru results
while ($row = mysqli_fetch_array($result)) {
    
    $id = $row['cid'];
    $company = $row['tgo_company'];
    $fname = $row['tgo_fname'];
    $lname = $row['tgo_lname'];
    $email = $row['tgo_email'];
    $website = $row['tgo_website'];
    $phone = $row['tgo_phone'];
    $address = $row['tgo_address'];
    $city = $row['tgo_city'];
    $province = $row['tgo_province'];
    $description = $row['tgo_description'];
    $resume = $row['tgo_resume'];

    $editLinks .= "\n<hr><a id=\"style-links\" href=\"edit.php?id=$id\"><div class=\"row pl-2\"><div class=\"col-sm\">$company</div></div></a>";
}

// prepopulate fields by link
$result = mysqli_query($con, "SELECT * FROM tgo_Contacts WHERE cid = '$char_id'") or die(mysqli_error($con));
// loop thru results
while ($row = mysqli_fetch_array($result)) {
    $company = $row['tgo_company'];
    $fname = $row['tgo_fname'];
    $lname = $row['tgo_lname'];
    $email = $row['tgo_email'];
    $website = $row['tgo_website'];
    $phone = $row['tgo_phone'];
    $address = $row['tgo_address'];
    $city = $row['tgo_city'];
    $province = $row['tgo_province'];
    $description = $row['tgo_description'];
    $resume = $row['tgo_resume'];

}

if (isset($_POST['submit'])) {

    $company = trim($_POST['company']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $resume = trim($_POST['resume']);
    $province = trim($_POST['province']);
    $description = trim($_POST['description']);
    $website = trim($_POST['website']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $valid = 1;
    echo $resume;
    if ((strlen($company) < 2) || (strlen($company) > 30)) {
        $valid = 0;
        $val_comp_msg = "Please enter a Company Name from 2 to 30 characters.";
    }

    if ($website  != "") {
        $website = filter_var($website , FILTER_SANITIZE_URL);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $valid = 0;
            $val_web_msg .= "$website is not a valid URL.";
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
        $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
            $valid = 0;
            $val_phone_msg .= "$phone is not a valid phone number HINT: try XXX-XXX-XXXX.";
        }
    } else {
        $valid = 0;
        $val_phone_msg .= "Please enter the phone number.";
    }
    if($resume != 1){
        $resume = 0;
    }
    if ($valid == 1) {
        
        mysqli_query($con, "UPDATE tgo_Contacts SET 
            tgo_company = '$company',
             tgo_fname = '$fname',
              tgo_lname = '$lname',
               tgo_email = '$email',
                tgo_website = '$website',
                 tgo_phone = '$phone',
                  tgo_address = '$address',
                   tgo_city = '$city',
                    tgo_province = '$province',
                      tgo_description = '$description',
                       tgo_resume = '$resume' WHERE cid= $char_id") or die(mysqli_error($con));
        
        $msg_success = "Contact has been updated.";
    }
}


?>

<h2>Edit</h2>
<p class="required"> = required field </p>
<div class="row">
        <div class="column col-md-5">
		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<div class="form-group">
				<label class="required" for="company">Company Name:</label>
				<input type="text" class="form-control" name="company" value="<?php if ($company) {echo $company;} ?>" >
				<?php 
					if ($val_comp_msg) {
						echo $msg_pre_error . $val_comp_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="fname">First Name:</label>
			<input type="text" name="fname" class="form-control" value="<?php if ($fname) {echo $fname;} ?>">
		</div>
		<div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" class="form-control" value="<?php if ($lname) {echo $lname;} ?>">
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" name="address" class="form-control" value="<?php if ($address) {echo $address;} ?>">
		</div>
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" name="city" class="form-control" value="<?php if ($city) {echo $city;} ?>">
		</div>
		<div class="form-check">
				<label for="resume" class="form-check-label">
					<input type="checkbox" class="form-check-input" name="resume" value="1" <?php if($resume) {echo "checked";}?> >Send Résumé
				</label>
			</div>
        </div>
        <div class="column col-md-5">
            <div class="form-group">
				<label for="province">Province:</label>
				<select class="form-control" name="province">
					<option value="">--- Please select a Province ---</option>
					<option value="AB" <?php if (isset($province) && ($province == "AB")) : ?> selected <?php endif; ?>>Alberta</option>
                    <option value="BC" <?php if (isset($province) && ($province == "BC")) : ?> selected <?php endif; ?>>British Columbia</option>
                    <option value="MB" <?php if (isset($province) && ($province == "MB")) : ?> selected <?php endif; ?>>Manitoba</option>
                    <option value="NB" <?php if (isset($province) && ($province == "NB")) : ?> selected <?php endif; ?>>New Brunswick</option>
                    <option value="NL" <?php if (isset($province) && ($province == "NL")) : ?> selected <?php endif; ?>>Newfoundland and Labrador</option>
                    <option value="NS" <?php if (isset($province) && ($province == "NS")) : ?> selected <?php endif; ?>>Nova Scotia</option>
                    <option value="ON" <?php if (isset($province) && ($province == "ON")) : ?> selected <?php endif; ?>>Ontario</option>
                    <option value="PE" <?php if (isset($province) && ($province == "PE")) : ?> selected <?php endif; ?>>Prince Edward Island</option>
                    <option value="QC" <?php if (isset($province) && ($province == "QC")) : ?> selected <?php endif; ?>>Quebec</option>
                    <option value="SK" <?php if (isset($province) && ($province == "SK")) : ?> selected <?php endif; ?>>Saskatchewan</option>
                    <option value="NT" <?php if (isset($province) && ($province == "NT")) : ?> selected <?php endif; ?>>Northwest Territories</option>
                    <option value="NU" <?php if (isset($province) && ($province == "NU")) : ?> selected <?php endif; ?>>Nunavut</option>
                    <option value="YT" <?php if (isset($province) && ($province == "YT")) : ?> selected <?php endif; ?>>Yukon</option>
                </select>
				</select>
			</div>
            <div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description" class="form-control" rows="3" ><?php if ($description) {echo $description;} ?></textarea>  
			</div>
            <div class="form-group">
				<label class="required" for="website">Website URL:</label>
				<input type="text" class="form-control" name="website" value="<?php if ($website) {echo $website;} ?>">
                <?php 
					if ($val_web_msg) {
						echo $msg_pre_error . $val_web_msg . $msg_post;
					}
				?>
			</div>
			<div class="form-group">
				<label class="required" for="email">Email:</label>
				<input type="text" name="email" class="form-control" value="<?php if ($email) {echo $email;} ?>">
				<?php 
					if ($val_email_msg) {
						echo $msg_pre_error . $val_email_msg . $msg_post;
					}
				?>
			</div>
			<div class="form-group">
				<label class="required" for="phone">Phone Number:</label>
				<input type="text" name="phone" class="form-control" value="<?php if ($phone) {echo $phone;} ?>">
				<?php
					if ($val_phone_msg) {
						echo $msg_pre_error . $val_phone_msg . $msg_post;
					}

				?>
			</div>	
            <div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
            <a class="btn btn-danger del" href="delete.php?id=<?php echo $char_id ?>">Delete</a>
                <script>
                    $(document).ready(function() {
                        $(".del").click(function() {
                            if (!confirm("Do you want to delete")) {
                                return false;
                            }
                        });
                    });
                </script>
        </div>
    </div>

        </form>
        <div class="column col-md-2" >
        <div class="navlinks"  >
            <?php echo $editLinks; ?>
        </div>
    </div>
    <?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>
    </div><!-- column -->

    </div>
    
    
	</div><!-- row -->
		
		
</form>
       
</div>

<?php

    include("../includes/footer.php");
?>