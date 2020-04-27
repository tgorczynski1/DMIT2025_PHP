<?php
	include("../includes/header.php");


	$fname = '';
	$lname = '';
	$description = '';
	
	if (isset($_POST['submit'])) 
	{				
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$description = trim($_POST['description']);
			$valid = 1;

			if ((strlen($fname) < 2) || (strlen($fname) > 20)) {
				$valid = 0;
				$val_fuser_msg = "Please enter a First Name from 2 to 20 characters. Insert failed";
			}

			if ((strlen($lname) < 2) || (strlen($fname) > 20)) {
				$valid = 0;
				$val_luser_msg = "Please enter a Last Name from 2 to 20 characters. Insert failed";
			}
			if ((strlen($description) < 20) ) {
				$valid = 0;
				$val_desc_msg = "Please enter a Description above 20 characters. Insert failed";
			}
			
			if ($valid == 1) {
				$msg_success = "Character has been inserted.";
				mysqli_query($con, "INSERT INTO tgo_Characters (tgo_firstname,tgo_lastname,tgo_description) VALUES ('$fname', '$lname', '$description')") or die(mysqli_error($con));
			}

	}
?>
<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="form-group">
			<label for="fname">First Name</label>
			<input type="text" name="fname" class="form-control">
			<?php 
					if ($val_fuser_msg) {
						echo $msg_pre_error . $val_fuser_msg . $msg_post;
					}
				?>
			<label for="lname">Last Name</label>
			<input type="text" name="lname" class="form-control">
			<?php 
					if ($val_luser_msg) {
						echo $msg_pre_error . $val_luser_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="beta">Description</label>
			<textarea rows="7" name="description" class="form-control"></textarea>
			<?php 
					if ($val_desc_msg) {
						echo $msg_pre_error . $val_desc_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
		</div>
		<?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>


</form>
<?php

	include("../includes/footer.php");
?>