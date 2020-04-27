<?php 
    session_start();
	if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
		// echo "Logged In.";
	} else {
		header("Location:login.php");
	}
    include("../includes/header.php");
    

    $char_id = '';
	$char_id = $_GET['id']; 
	//$_SESSION['variablename'] = $your variable ;
//set random id
// if (!isset($char_id)) 
// {
//     $result = mysqli_query($con, "SELECT bid FROM tgo_Blog LIMIT 1") or die(mysqli_error($con));
//     while ($row = mysqli_fetch_array($result)) 
//     {

//         $char_id = $row['bid'];
//     }
// }  

//failed attempt
// $result = mysqli_query($con, "SELECT * FROM tgo_Blog");
//           while ($row = mysqli_fetch_array($result)) {
//               $id = $row['bid'];
//               $title = $row['tgo_title'];

//               echo "<option value='edit.php?edit=$row[bid]'>$title</option>\n";
//           }      

// prepopulate fields by link
// $result = mysqli_query($con, "SELECT * FROM tgo_Blog WHERE bid = '$char_id'") or die(mysqli_error($con));
// // loop thru results
// while ($row = mysqli_fetch_array($result)) {
//     $char_id = $row['bid'];
//     $title = $row['tgo_title'];
//     $message = $row['tgo_message'];

// }

if (isset($_POST['select'])) {
	$char_id = trim($_POST['blogtitle']);
	//$updateid = $char_id;
    $result = mysqli_query($con, "SELECT * FROM tgo_Blog WHERE bid = '$char_id'") or die(mysqli_error($con));
    // loop thru results
    while ($row = mysqli_fetch_array($result)) {
        $char_id = $row['bid'];
        $title = $row['tgo_title'];
        $message = $row['tgo_message'];

}
    
}

if (isset($_POST['submit'])) {

    $title = trim($_POST['title']);
	$message = trim($_POST['message']);
	date_default_timezone_set('Canada/Edmonton');
	$date = date('Y/m/d h:i:s', time());
	$char_id = $_GET['id'];
	$valid = 1;
			
	//echo $date;
	echo $char_id;

		if ((strlen($title) < 2) || (strlen($title) > 30)) {
			$valid = 0;
			$val_title_msg = "Please enter a Blog Title from 2 to 30 characters. Update failed";
			}

		if ((strlen($message) < 2) || (strlen($message) > 60)) {
			$valid = 0;
			$val_entry_msg = "Please enter a Blog message from 2 to 60 characters. Update failed";
			}
			
		if ($valid == 1) {
			$msg_success = "Blog entry has been updated.";
			mysqli_query($con, "UPDATE tgo_Blog SET tgo_title = '$title', tgo_message = '$message', tgo_date = '$date' WHERE bid = '$char_id'") or die(mysqli_error($con));
			echo $char_id;
			}
}


?>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $char_id; ?>" />
</div>
<h2>Edit a Blog Entry</h2>

<div class="column col-md-5">
	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <h6>Editing blog <?php echo $char_id; ?></h6>
	<div class="form-group">
<?php
 
    echo '<select name="blogtitle" class="form-dropdown">
        <option>Select a Blog Entry</option>';
 
        $sqli = "SELECT * FROM tgo_Blog";
        $result = mysqli_query($con, $sqli);
        while ($row = mysqli_fetch_array($result)) 
        {
            //if ($_GET['name'] == 'b') { ? >selected="true" <?php }; ? >
			//echo '<option>'.$row['tgo_title'].'</option>';
			$select= $_POST['blogtitle'];
            echo '<option value="'.$row['bid']. '  "> '. $row['tgo_title'] . '</option>';
			$char_id = $row['bid'];
			
        }

	echo '</select>';
	// people_id ='.$_GET['id'];
	// $id = $_GET['id'];
	
	//$zz= $row['people_id'];
    
?>
	<input type="submit" name="select" class="btn btn-info" value="Select">
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
	<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
			<?php 
					if ($val_title_msg) {
						echo $msg_pre_error . $val_title_msg . $msg_post;
					}
			?>
		</div>
	<div class="form-group">
			<label for="message">Message:</label>
			<textarea name="message" class="form-control" rows="5" ><?php echo $message ?></textarea>  
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