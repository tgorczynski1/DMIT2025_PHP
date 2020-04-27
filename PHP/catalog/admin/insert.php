<?php
session_start();
if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
	// echo "Logged In.";
} else {
	header("Location:login.php");
}
include("../includes/header.php");
include("../includes/_functions.php");
$breed = '';
$coat = '';
$origin = '';
$body = '';
$weight = '';
$colour = '';
$pattern = '';

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
<h2>Insert</h2>

<?php

if (isset($_POST['submit'])) {
	$breed = $_POST['breed'];
	$coat = $_POST['coat'];
	$origin = $_POST['origin'];
	$filename = $_POST['myfile'];
	$body = $_POST['body'];
	$weight = $_POST['weight'];
	$colour = $_POST['colour'];
	$pattern = $_POST['pattern'];

	$valid = 1;
	$valMessage .= "";
	$msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
	$msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
	$msgPost = "</div>";

	if((strlen($breed) < 1) || (strlen($colour) < 1)){
		$valid = 0;
		$valRequiredMsg .= "Please enter all required fields. <br />";
	}

	if($coat == '' || $origin == ''){
		$valid = 0;
		$valRequiredMsg .= "Please enter all required fields. <br />";
	}

	// Validation Rule for File Type
	if ($_FILES['myfile']['type'] != "image/jpeg") {
		$valid = 0;
		$valMessage .= "Not a JPG image.<br />";
	}
	// Validation Rule for File Size
	if ($_FILES['myfile']['size'] > (8 * 1024 * 1024)) {
		$valid = 0;
		$valMessage .= "File is too large.<br />";
	}
    if ((strlen($breed) < 3) || (strlen($breed) > 20)) {
        $valid = 0;
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
        $msgSuccess = "Success! Form data has been stored.";
		$uniqidFileName = "image_" . uniqid() . ".jpg";
		$temp4 = $length_arr[$coat];
		$temp6 = $origin_arr[$origin];

		if (move_uploaded_file($_FILES['myfile']['tmp_name'], "../images/originals/" . $uniqidFileName)) {

			$thisFile = "../images/originals/" . $uniqidFileName;

			createImageCopy($thisFile,  "../images/display/", 800);
			createImageCopy($thisFile,  "../images/thumbs100/", 100);
			createImageCopy($thisFile,  "../images/thumbs150/", 150);
			createImageCopy($thisFile,  "../images/thumbs200/", 200);
			createSquareImageCopy($thisFile, "../images/squares150/", 150);
			createSquareImageCopy($thisFile, "../images/squares50/", 50);

			mysqli_query($con, "INSERT INTO Cats(breed, origin, image, coat, body, weight, colour, pattern) VALUES('$breed','$temp6','$uniqidFileName', '$temp4', '$body', '$weight', '$colour', '$pattern')") or die(mysqli_error($con));

			echo "<h4 style=\"color:green;\">Upload Successful.<br /></h4>";
			$breed = '';
			$coat = '';
			$origin = '';
			$body = '';
			$weight = '';
			$colour = '';
			$pattern = '';
		} else {
			echo "<h3 style=\"color:red;\">ERROR</h3>";
		}
	} else {
		echo "<h4 style=\"color:red;\">" . $valMessage . "</h4>";
	}
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

?>

<p class="required"> = required field </p>
<div class="row">
        <div class="column col-md-5">
		<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="form-group">
				<label class="required" for="breed">Breed:</label>
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
					<option value=""><?php if($origin) {echo $origin;} else {echo '--- Please select a Continent ---';} ?></option>
					<?php echo $origin_opts; ?>
				</select>
		</div>
		<div class="form-group">
		<label class="required" for="length">Coat Length: </label>
				<select class="form-control" name="coat">
					<option value=""><?php if($coat) {echo $coat;} else {echo '--- Please select a Length ---';} ?></option>
					<?php echo $length_opts; ?>
				</select>
		</div>
		<div class="form-group">
			<label for="body">Body type:</label>
			<input type="text" name="body" class="form-control" value="<?php if($body ) {echo $body;} ?>">
		</div>
		<?php 
			if ($valRequiredMsg) {
				echo $msgPreError . $valRequiredMsg . $msgPost;
			}
		?>
		</div>
        <div class="column col-md-5">
            <div class="form-group">
				<label class="required"  for="weight">Weight(lb):</label>
				<input min="0" max="30" type="number" class="form-control" name="weight" value="<?php if($weight ) {echo $weight;} ?>" >
                <?php 
					if ($valweightmsg) {
						echo $msgPreError . $valweightmsg . $msgPost;
					}
				?>

			<div class="form-group">
				<label class="required" for="myfile">File</label>
				<input type="file" name="myfile" class="form-control">

			</div>
			<div class="form-group">
				<label class="required" for="colour">Coat Colour:</label>
				<input type="text" name="colour" class="form-control" value="<?php if($colour ) {echo $colour;} ?>">
			</div>
			<div class="form-group">
				<label for="pattern">Coat Pattern:</label>
				<input type="text" name="pattern" class="form-control" value="<?php if($pattern ) {echo $pattern;} ?>">
			</div>


			<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					
		</form>
    </div><!-- column -->
    <?php 
			if ($msgSuccess) {
				echo $msgPreSuccess . $msgSuccess . $msgPost;
			}
		?>
    </div>
	</div><!-- row -->

<?php
include("../includes/footer.php");
?>