<?php
session_start();
if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
	// echo "Logged In.";
} else {
	header("Location:login.php");
}
include("../includes/header.php");
include("../includes/_functions.php")
?>
<h2>Insert</h2>

<?php
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$filename = $_POST['myfile'];

	$valid = 1;
	$valMessage .= "";

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
    $msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
    $msgPost = "</div>";
    if ((strlen($title) < 3) || (strlen($title) > 20)) {
        $valid = 0;
        // specific message
        $valFNameMsg = "Please enter a title between 3 and 20 characters.";
    }
    if ((strlen($description) < 20) || (strlen($description) > 512)) {
        $valid = 0;
        // specific message
        $valDescMsg = "Please enter a description between 20 and 512 characters.";
    }




	if ($valid == 1) {
        $msgSuccess = "Success! Form data has been stored.";
		$uniqidFileName = "image_" . uniqid() . ".jpg";
		$title = '';
		$description = '';

		if (move_uploaded_file($_FILES['myfile']['tmp_name'], "../images/originals/" . $uniqidFileName)) {

			$thisFile = "../images/originals/" . $uniqidFileName;

			createImageCopy($thisFile,  "../images/display/", 800);
			createImageCopy($thisFile,  "../images/thumbs100/", 100);
			createImageCopy($thisFile,  "../images/thumbs150/", 150);
			createImageCopy($thisFile,  "../images/thumbs200/", 200);
			createSquareImageCopy($thisFile, "../images/squares150/", 150);
			createSquareImageCopy($thisFile, "../images/squares50/", 50);

			mysqli_query($con, "INSERT INTO tgo_Image(tgo_title, tgo_description, tgo_file) VALUES('$title','$description','$uniqidFileName')") or die(mysqli_error($con));

			echo "<h4 style=\"color:green;\">Upload Successful.<br /></h4>";
		} else {
			echo "<h3 style=\"color:red;\">ERROR</h3>";
		}
	} else {
		echo "<h4 style=\"color:red;\">" . $valMessage . "</h4>";
	}
}
?>

<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php if ($title) {
                                                                                echo $title;
                                                                            } ?>">
                <?php if ($valFNameMsg) {
                    echo $msgPreError . $valFNameMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"><?php if ($description) {
                                                                        echo $description;
                                                                    } ?></textarea>
                <?php if ($valDescMsg) {
                    echo $msgPreError . $valDescMsg . $msgPost;
                } ?>
            </div>
	<div class="form-group">
		<label for="myfile">file</label>
		<input type="file" name="myfile" class="form-control">

	</div>
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
	<?php if ($valid == 1) {
                echo $msgPreSuccess . $msgSuccess . $msgPost;
            } ?>
</form>
<?php
include("../includes/footer.php");
?>