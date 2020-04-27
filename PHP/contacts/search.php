<?php
	include ("includes/header.php");


?>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<h2>Search</h2>
		<div class="form-group">
			<input type="text" name="search" class="form-control">

		</div>
		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
			<?php 
					if ($val_user_msg) {
						
					}
				?>
		</div>


</form>

<?php
if (isset($_POST['submit'])) 
{
	$search = trim($_POST['search']);
	$valid = 1;
	$result = mysqli_query($con, "SELECT * FROM tgo_Contacts WHERE tgo_company LIKE '%$search%' ") or die(mysqli_error($con));

	if($search == ''){
		$val_user_msg = 'Please input a company name between 1 and 30 characters';
		$valid = 0;
		echo $msg_pre_error . $val_user_msg . $msg_post;
	}

	if(mysqli_num_rows($result) == 0)
	{
		$valid = 0;
		$val_user_msg = 'No company found with that name';
		echo $msg_pre_error . $val_user_msg . $msg_post;
	}
	elseif($valid == 1)
	{
		while($row = mysqli_fetch_array($result))
		{
			
			echo "<hr />";
			echo "<div class=\"char-card\">"; 
			echo "<div class=\"card-body\">";
			echo "<h1 class=\"card-title\">" . $row['tgo_company'] . "</h1>";
    		echo "<h6 class=\"card-subtitle\">" . $row['tgo_fname'] . " " . $row['tgo_lname'] . "</h6>";
			echo "<p class=\"card-text\">" . $row['tgo_description'] . "</p>";
			echo "<a href=\"#\"  class=\"card-link\">" . $row['tgo_website'] .  "</a>";

    		echo "</div>";
    		echo "</div>";
		
		}
	}
		// while($row = mysqli_fetch_array($result))
		// {
		// 	echo "<hr />";
		// 	echo "<div class=\"char-card\">"; 
		// 	echo "<div class=\"card-body\">";
		// 	echo "<h1 class=\"card-title\">" . $row['tgo_company'] . "</h1>";
    	// 	echo "<h6 class=\"card-subtitle\">" . $row['tgo_fname'] . " " . $row['tgo_lname'] . "</h6>";
		// 	echo "<p class=\"card-text\">" . $row['tgo_description'] . "</p>";
		// 	echo "<a href=\"companyprofile.php?id=\"  class=\"card-link\">" . $row['tgo_website'] .  "</a>";

    	// 	echo "</div>";
    	// 	echo "</div>";
		
		// }
	

}
	include ("includes/footer.php");
?>