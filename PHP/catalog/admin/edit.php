<?php
session_start();
if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
	// echo "Logged In.";
} else {
	header("Location:login.php");
}
include("../includes/header.php");
include("../includes/_functions.php");

$length_arr = array(
	'SH' => 'Short',
	'MD' => 'Medium',
	'LG' => 'Long',
	'MX' => 'Mixed',
	'HL' => 'Hairless'
);
$origin_arr = array(
	'NA' => 'North America',
	'SA' => 'South America',
	'EU' => 'Europe',
	'AF' => 'Africa',
	'AS' => 'Asia',
	'OC' => 'Oceania',
	'ME' => 'Middle East'
);

?>

<?php
$image_id = $_GET['id'];// page-setter variable
//if not set we will give this a default value
if (!isset($image_id)) {
    $result = mysqli_query($con, "SELECT cid FROM Cats LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {

        $image_id = $row['cid'];
    }
}

if (isset($_POST['submit'])) {
    //echo $image_id;

	$breed = $_POST['breed'];
	$coat = $_POST['coat'];
	$origin = $_POST['origin'];
	$body = $_POST['body'];
	$weight = $_POST['weight'];
	$colour = $_POST['colour'];
	$pattern = $_POST['pattern'];

	$valid = 1;
	$valMessage .= "";

    $msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
	$msgPost = "</div>";
	
	if((strlen($breed) < 1) || (strlen($colour) < 1) ){
		$valid = 0;
		$valRequiredMsg .= "Please enter all required fields. <br />";
	}

    if ((strlen($breed) < 3) || (strlen($breed) > 20)) {
        $valid = 0;
        // specific message
        $valbreedMsg = "Please enter a breed between 3 and 20 characters.";
	}

	if (!is_numeric($weight)) {
		$valid = 0;
		$valweightmsg = "Please enter a number";
		if($weight < 0 ){
			$valid = 0;
			$valweightmsg = "Please enter a positive weight";
		}
	}



	if ($valid == 1) {
        
        //echo $image_id;
        $msgSuccess = "Success! Form data has been stored.";
        $breed = $_POST['breed'];
	    $coat = $_POST['coat'];
	    $origin = $_POST['origin'];
	    $body = $_POST['body'];
	    $weight = $_POST['weight'];
	    $colour = $_POST['colour'];
		$pattern = $_POST['pattern'];
		
		$temp4 = $length_arr[$coat];
		$temp6 = $origin_arr[$origin];

	mysqli_query($con, "UPDATE Cats SET 
                breed = '$breed', 
                coat = '$temp4',
                breed = '$breed',
                origin = '$temp6',
                body = '$body',
                weight = '$weight',
                colour = '$colour',
                pattern = '$pattern'
                WHERE cid=$image_id") or die(mysqli_error($con));
    }
}

$result = mysqli_query($con, "SELECT * FROM Cats") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $id = $row['cid'];
    $breed = $row['breed'];
    $image = $row['image'];
    $origin = $row['origin'];
    $coat = $row['coat'];
    $body = $row['body'];
    $weight = $row['weight'];
    $colour = $row['colour'];
    $pattern = $row['pattern'];

    $editLinks .= "\n<a class=\"edit-link\" id=\"style-links\" href=\"edit.php?id=$id\"><img src=\"../images/squares50/$image\" alt=\"thumbnail\" /></a>";
}

// Step 2: Prepopulate the fields based on the selected character
$result = mysqli_query($con, "SELECT * FROM Cats WHERE cid = '$image_id'") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $id = $row['cid'];
    $breed = $row['breed'];
    $imagefile = $row['image'];
    $origin = $row['origin'];
    $coat = $row['coat'];
    $body = $row['body'];
    $weight = $row['weight'];
    $colour = $row['colour'];
    $pattern = $row['pattern'];
}

$temp = array_search($origin, $origin_arr); 
unset($origin_arr[$temp]);

$temp2 = array_search($coat, $length_arr); 
unset($length_arr[$temp2]);

foreach ($origin_arr as $val => $label) {
	if ($origin == $val) {
		$origin_opt_sel = ' selected="selected"';
	} else {
		$origin_opt_sel = '';
	}

	$origin_opts .= '<option value="' . $val . '"' . $origin_opt_sel . '>';
	$origin_opts .= $label;
	$origin_opts .= '</option>';
}
foreach ($length_arr as $val => $label) {
	if ($coat == $val) {
		$length_opt_sel = ' selected="selected"';
	} else {
		$length_opt_sel = '';
	}

	$length_opts .= '<option value="' . $val . '"' . $length_opt_sel . '>';
	$length_opts .= $label;
	$length_opts .= '</option>';
}

?>

<h2>Edit</h2>
<p class="required"> = required field </p>
<div class="row">
        <div class="column col-md-5">
		<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<div class="form-group">
				<label class="required"  for="breed">Breed:</label>
				<input type="text" class="form-control" name="breed" value="<?php if($breed ) {echo $breed;} ?>"  >
				<?php 
					if ($valbreedmsg) {
						echo $msgPreError . $valbreedmsg . $msgPost;
					}
				?>
		</div>
		<div class="form-group">
		<label class="required" for="origin">Origin: </label>
				<select class="form-control" name="origin">
					<option value=""><?php echo $origin;?></option>
					<?php echo $origin_opts; ?>
				</select>
		</div>
		<div class="form-group">
		<label class="required" for="origin">Coat Length: </label>
				<select class="form-control" name="length">
					<option value=""><?php echo $coat; ?></option>
					<?php echo $length_opts; ?>
				</select>

		</div>
		<div class="form-group">
			<label for="body">Body type:</label>
			<input type="text" name="body" class="form-control" value="<?php if($body ) {echo $body;} ?>">
		</div>
		</div>
        <div class="column col-md-5">
            <div class="form-group">
				<label class="required"   for="weight">Weight(lb):</label>
				<input type="number" class="form-control" name="weight" value="<?php if($weight ) {echo $weight;} ?>" >
                <?php 
					if ($valweightmsg) {
						echo $msgPreError . $valweightmsg . $msgPost;
					}
				?>

			<div class="form-group">
				<label class="required" for="colour">Coat Colour:</label>
				<input type="text" name="colour" class="form-control" value="<?php if($colour ) {echo $colour;} ?>">
			</div>
			<div class="form-group">
				<label for="pattern">Coat Pattern:</label>
				<input type="text" name="pattern" class="form-control" value="<?php if($pattern ) {echo $pattern;} ?>">
			</div>

            <div class="form-group">
                <label for="submit">&nbsp;</label>
                <input type="submit" name="submit" class="btn btn-info" value="Update">
                <a class="btn btn-danger del" href="delete.php?id=<?php echo $image_id ?>">Delete</a>
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
		</form>
    </div><!-- column -->
	<?php 
			if ($valRequiredMsg) {
				echo $msgPreError . $valRequiredMsg . $msgPost;
			}
		?>
    <?php 
			if ($msgSuccess) {
				echo $msgPreSuccess . $msgSuccess . $msgPost;
			}
		?>
    </div>
    <div class="col-4">
    <div class="form-group">
            <img src="../images/thumbs200/<?php if ($imagefile) {
                                            echo $imagefile;
                                        } ?>" alt="">
            </div>
        <h3>Cats by Photo:</h3>
        <div class="row d-flex justify-content-start">
            <?php echo $editLinks; ?>
        </div>
    </div> 
</div>
	</div><!-- row -->

<?php
include("../includes/footer.php");
?>