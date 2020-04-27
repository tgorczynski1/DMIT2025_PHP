<?php
include("../includes/mysql_connect.php");

$char_id = $_GET['id']; // page-setter variable
    if(!is_numeric($char_id)) {
        header("Location: edit.php");
    } else {
        // echo $char_id;
    
        // Removing data in a DB: DELETE
    
        mysqli_query($con, "DELETE FROM tgo_Characters
        WHERE cid=$char_id") or die(mysqli_error($con));
    
        header("Location: edit.php");
    }

    ?>