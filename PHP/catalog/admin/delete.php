<?php
    include("../includes/mysql_connect.php");// here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.

    session_start();
	if (isset($_SESSION['ghdhdtrnvgngdtfndnghsdw'])) {
        // echo "Logged In.";
    } else {
        header("Location:login.php");
    }

    $image_id = $_GET['id']; // page-setter variable
    if(!is_numeric($image_id)) {
        header("Location: edit.php");
    } else {
    
        mysqli_query($con, "DELETE FROM Cats
        WHERE cid=$image_id") or die(mysqli_error($con));
    
        header("Location: edit.php");
    }
?>