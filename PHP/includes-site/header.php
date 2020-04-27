<?php
$thisFile =  basename($_SERVER['PHP_SELF']);

switch ($thisFile)
{
    case "index.php":
        $thisPageTitle = "Edgar Allen Poe";
        $thisSideBarFile = "/home/tgorczynski1/public_html/dmit2025/includes-site/content/summaries/home.txt";  
        break;
    case "berenice.php":
        $thisPageTitle = "Edgar Allen Poe -Berenice";
        $thisSideBarFile = "/home/tgorczynski1/public_html/dmit2025/includes-site/content/summaries/berenice.txt";
        break;
    case "caskofamontillado.php":
        $thisPageTitle = "Edgar Allen Poe -Cask Of Amontillado";
        $thisSideBarFile = "/home/tgorczynski1/public_html/dmit2025/includes-site/content/summaries/cask of amontillado.txt";
        break;
    case "descentintothemaelstrom.php":
        $thisPageTitle = "Edgar Allen Poe -Descent Into The Maelstrom";
        $thisSideBarFile = "/home/tgorczynski1/public_html/dmit2025/includes-site/content/summaries/descent into the maelstrom.txt";
        break;
    case "theangeloftheodd.php":
        $thisPageTitle = "Edgar Allen Poe -The Angel Of The Odd";
        $thisSideBarFile = "/home/tgorczynski1/public_html/dmit2025/includes-site/content/summaries/the angel of the odd.txt";
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edgar Allen Poe</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<div class="site-content">

		<div class="masthead band-wrapper lt-gray-bg">
			<div class="container txt-centered">
				<h1>PHP Includes</h1>
			</div>
		</div>

		<div class="band-wrapper blood-red-bg">
			<div class="container">
				<ul class="nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class='nav-link' href="berenice.php">Berenice</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="caskofamontillado.php">The Cask of Amontillado</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="descentintothemaelstrom.php">Descent into the Maelstrom</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="theangeloftheodd.php">The Angel of the Odd</a>
					</li>
				</ul>
			</div>
		</div>
	    
		<div class="band-wrapper">
			<div class="container">
				<div class="row">

					<div class="sidebar col-sm-4 top-pad btm-pad">
						<h2>Summary</h2>
						<p>
                            <?php include ($thisSideBarFile);?>
						</p>
					</div>

					<div class="main-content col-sm-8 top-pad btm-pad">

                    <h1><?php echo $thisPageTitle; ?></h1>

