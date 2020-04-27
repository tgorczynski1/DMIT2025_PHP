<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Blog</title>
    <!-- These must be in place to use Bootstrap ! -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container" style="">
        <div class="banner" style="">
            <h2>Blog Entries</h2>
            <a href="admin/login.php">login</a>
        </div>        
        
    </div>
</body>


<?php
	include ("admin/blogfile.txt");

?>