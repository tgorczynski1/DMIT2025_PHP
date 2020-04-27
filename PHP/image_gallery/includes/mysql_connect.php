<?php
session_start();

// Connect to DB: Since all files depend on this, this will be included in our header, which is then included in all files.
$con = mysqli_connect("localhost", "tgorczynski1","warsaw12345","tgorczynski1");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//This stops SQL Injection in POST vars 
  foreach ($_POST as $key => $value) { 
    $_POST[$key] = mysqli_real_escape_string($con, $value); 
  } 

  //This stops SQL Injection in GET vars 
  foreach ($_GET as $key => $value) { 
    $_GET[$key] = mysqli_real_escape_string($con, $value); 
  }

  define("BASE_URL", "http://tgorczynski1.dmitstudent.ca/dmit2025/image_gallery/");


  // Your App Name
  define("APP_NAME", "Image Gallery");
?>