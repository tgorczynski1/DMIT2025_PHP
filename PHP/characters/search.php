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
	$result = mysqli_query($con, "SELECT * FROM tgo_Characters WHERE tgo_firstname like '$search' OR tgo_lastname like '$search' ") or die(mysqli_error($con));
	if(mysqli_num_rows($result) == 0)
	{
		$valid = 0;
		$val_user_msg = 'Please correctly spell a first/last name between 2 and 20 characters long';
        echo $msg_pre_error . $val_user_msg . $msg_post;
	}
	if ($valid == 1)
	{
		
		while($row = mysqli_fetch_array($result)){
			echo "<hr />";
    if (strtolower($row['tgo_lastname']) == 'stark' || strtolower($row['tgo_lastname']) == 'tully' || strtolower($row['tgo_lastname']) == 'baratheon' || strtolower($row['tgo_lastname']) == 'snow'  )
    {
        echo "<div class=\"north-card\">";
    }
    else{
        if (strtolower($row['tgo_lastname']) == 'lannister' || strtolower($row['tgo_lastname']) == 'baelish' )
    {
        echo "<div class=\"south-card\">";
    }
    else{
        if(strtolower($row['tgo_lastname']) == 'drogo' || strtolower($row['tgo_lastname']) == 'stormborn targaryen' || strtolower($row['tgo_lastname']) == 'mormont')
        {
            echo "<div class=\"west-card\">"; 
        }
        else{

            echo "<div class=\"char-card\">"; 
        }
    }
}
    echo "<div class=\"card-body\">";
    echo "<h3 class=\"card-title\">" . $row['tgo_firstname'] . " " . $row['tgo_lastname'] . "</h3>";
    echo "<p class=\"card-text\">" . $row['tgo_description'] . "</p>";
    

    
    echo "</div>";
    echo "</div>";
		}
	}

}
	include ("includes/footer.php");
?>