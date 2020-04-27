<?php
session_start();
$title    = $_POST['title'];
$message    = $_POST['message'];
$timedate = date('l, F d, Y @ g:i a');

if (isset($_SESSION['ad537f2997ea8064d232adbbfa15b5fdc']))
{

}else {
    header("Location:login.php");
    
}

if(isset($_POST['submit']))
	{
		writeToBlog($title, $message, $timedate);
	}
	
function writeToBlog($thisTitle, $thisMessage, $thisTimedate)
{
    //echo "$thisTitle, $thisMessage, $thisTimedate";
    // To get blog entries in the correct order, we need to:
    // Get the existing data from the textfile DB
    // Get the current entry from the submitted form
    // Join the new entry to the existing (older) entries, then write everything back to the textfile
	$handle = fopen("blogfile.txt", "r"); //open the file for reading
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $existingText .= $buffer;
        } // end while
        //echo $existingText;
        fclose($handle);
    } // end if
    $handle   = fopen("blogfile.txt", "w");

    $newStuff = "\n<div class=\"container\" >";
    $newStuff = "\n\t<div style=\"border: 2px solid black; padding: 0 15px 0 15px; margin-top: 24px;\" class=\"entry container\" >";
    $newStuff .= "\n\t<div style=\"text-align: right; font-size: 12px; display: inline-block; float: right; margin-top: 8px;\" class=\"timedate\">" . $thisTimedate . "</div>";
    $newStuff .= "\n\t<div style=\"font-size: 24px; font-weight= bold;\" class=\"title\">" . $thisTitle . "</div>";    
    $newStuff .= "\n\t<div class=\"message\">" . $thisMessage . "</div>";
    $newStuff .= "\n</div>";

	$allStuff = $newStuff . $existingText;
	//echo "test";
    fwrite($handle, $allStuff);
    fclose($handle);
} // end writeToBlog

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Simple Blog | Insert Post</title>
        <!-- These must be in place to use Bootstrap ! -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../styles.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container">

            <div class="banner">
                <h2>Add a new post</h2>
                <a href="../index.php">View Blog Entries?</a>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title" style="font-size:20px; font-weight: bold;">Title:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="Title here">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="message" style="font-size:20px; font-weight: bold;">Message:</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="message" placeholder="Enter message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- / .container -->

    </body>

    </html>