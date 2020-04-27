<?php 

    include("../includes/header.php");
    
    $fname = '';
    $lname = '';
    $description = '';
    $result = mysqli_query($con, "SELECT * FROM tgo_Characters") or die(mysqli_error($con));
    $char_id = '';
    $char_id = $_GET['id']; 
    
if (!isset($char_id)) 
{
    $result = mysqli_query($con, "SELECT cid FROM tgo_Characters LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) 
    {

        $char_id = $row['cid'];
    }
}   

if (isset($_POST['submit'])) 
{				
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $description = trim($_POST['description']);
        $valid = 1;

        if ((strlen($fname) < 2) || (strlen($fname) > 20)) {
            $valid = 0;
            $val_fuser_msg = "Please enter a First Name from 2 to 20 characters. Update failed";
        }

        if ((strlen($lname) < 2) || (strlen($fname) > 20)) {
            $valid = 0;
            $val_luser_msg = "Please enter a Last Name from 2 to 20 characters. Update failed";
        }
        if ((strlen($description) < 20) ) {
            $valid = 0;
            $val_desc_msg = "Please enter a Description above 20 characters. Update failed";
        }
        
        if ($valid == 1) {
            $msg_success = "Character has been updated.";
            mysqli_query($con, "UPDATE tgo_Characters SET tgo_firstname = '$fname', tgo_lastname = '$lname', tgo_description = '$description' WHERE cid= '$char_id'") or die(mysqli_error($con));

        }

}

$result = mysqli_query($con, "SELECT * FROM tgo_Characters ORDER BY tgo_firstname") or die(mysqli_error($con));
// loop thru results
while ($row = mysqli_fetch_array($result)) {
    $fname = $row['tgo_firstname'];
    $lname = $row['tgo_lastname'];
    $id = $row['cid'];

    $editLinks .= "\n<hr><a id=\"style-links\" href=\"edit.php?id=$id\"><div class=\"row pl-2\"><div class=\"col-sm\">$fname $lname</div></div></a>";
}

// prepopulate fields by link
$result = mysqli_query($con, "SELECT * FROM tgo_Characters WHERE cid = '$char_id'") or die(mysqli_error($con));
// loop thru results
while ($row = mysqli_fetch_array($result)) {
    $fname = $row['tgo_firstname'];
    $lname = $row['tgo_lastname'];
    $description = $row['tgo_description'];

     //echo "$fname $lname";
}

?>
<div class="column col-md-5" style="float:left;">
<h2>Edit</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<div class="form-group">                                                                <!-- REQUEST_URI VS. PHP_SELF -->
			<label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php if ($fname) {echo $fname;} ?>" >
			<?php 
					if ($val_fuser_msg) {
						echo $msg_pre_error . $val_fuser_msg . $msg_post;
					}
				?>
			<label for="lname">Last Name</label>
			<input type="text" name="lname" class="form-control" value="<?php if ($lname) {echo $lname;} ?>">
			<?php 
					if ($val_luser_msg) {
						echo $msg_pre_error . $val_luser_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="description">Description</label>
            <textarea rows="7" name="description" class="form-control"><?php if ($description) {echo $description;} ?></textarea>
            <?php 
					if ($val_desc_msg) {
						echo $msg_pre_error . $val_desc_msg . $msg_post;
					}
				?>
		</div>
		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Update Character">
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
        <?php 
			if ($msg_success) {
				echo $msg_pre_success . $msg_success . $msg_post;
			}
		?>
        
</form>
       
</div>
<div class="column col-md-5" style="float:right;" >
<div class="navlinks" >
            <?php echo $editLinks; ?>
        </div>
</div>

<?php

    include("../includes/footer.php");
?>