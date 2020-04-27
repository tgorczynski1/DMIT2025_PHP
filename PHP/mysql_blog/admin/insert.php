<?php
	session_start();
	if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
		// echo "Logged In.";
	} else {
		header("Location:login.php");
	}
	include("../includes/header.php");

	$title = '';
	$message = '';
	$date;
	
	if (isset($_POST['submit'])) 
	{				
			
			$title = trim($_POST['title']);
			$message = trim($_POST['message']);
			date_default_timezone_set('Canada/Edmonton');
			$date = date('Y/m/d h:i:s', time());
			$valid = 1;
			
			//echo $date;
			

			if ((strlen($title) < 2) || (strlen($title) > 45)) {
				$valid = 0;
				$val_title_msg = "Please enter a Blog Title from 2 to 45 characters. Insert failed";
			}

			if ((strlen($message) < 2) || (strlen($message) > 80)) {
				$valid = 0;
				$val_entry_msg = "Please enter a Blog message from 2 to 80 characters. Insert failed";
			}
			
			if ($valid == 1) {
				$msg_success = "Blog entry has been inserted.";
				mysqli_query($con, "INSERT INTO tgo_Blog (tgo_title, tgo_message, tgo_date)
					VALUES ('$title','$message','$date')") or die(mysqli_error($con));
				
			}
			

	}// end of submit event

?>

<h2>Insert a Blog Entry</h2>

<div class="column col-md-5">
	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
	<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" >
			<?php 
					if ($val_title_msg) {
						echo $msg_pre_error . $val_title_msg . $msg_post;
					}
			?>
		</div>
	<div class="form-group">
			<label for="message">Message:</label>
			<textarea name="message" class="form-control" rows="5" ></textarea>  
			<?php 
					if ($val_entry_msg) {
						echo $msg_pre_error . $val_entry_msg . $msg_post;
					}
			?>
	</div>
	<div id="emoticons">
    	<a href="#"><img src="../emoticons/icon_cool.gif" onclick="insertSmiley('8)')"/></a>
    	<a href="#"><img src="../emoticons/icon_confused.gif" onclick="insertSmiley(':S')"/></a>
    	<a href="#"><img src="../emoticons/icon_biggrin.gif" onclick="insertSmiley(':D')"/></a>
		<a href="#"><img src="../emoticons/icon_wink.gif" onclick="insertSmiley(';)')"/></a>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
	<?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>
	</form>
</div>
<script type="text/javascript">
    function insertSmiley(smiley)
    {
    
        var currentText = document.getElementsByName("message")[0];
        
        var smileyWithPadding = " " + smiley + " ";
        currentText.value += smileyWithPadding;
    currentText.focus();
    
    }
</script> 
<?php

	include("../includes/footer.php");
?>