<?php
include("mysql_connect.php"); // here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" >

  <title> Simple blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../styles.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

  <style>
    html,
    body {
      background: rgb(255, 223, 223);
    }

    .row-container {
      display: flex;
      margin: 0 auto;
      width: 70vw;
      margin-bottom: 1rem;
      padding: 1rem .25rem;
      background: rgb(230, 199, 165);
      border-radius: 10px;
      box-shadow: 10px 7px 5px 0 rgb(145, 139, 131);
    }
  </style>

</head>

<body>


  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 fixed-top">
    <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">home</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="<?php echo BASE_URL ?>admin/insert.php">Insert</a>
            <?php
            session_start();

            if (isset($_SESSION['PHP_Test_Secure'])) {
              echo "<a class=\"dropdown-item\" href=\"" .
                BASE_URL .
                "admin/logout.php\">Logout</a>";
            }
            ?>


          </div>
        </li>
      </ul>
    </div>
  </nav>

  <main role="main" class="container">