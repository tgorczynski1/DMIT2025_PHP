<!DOCTYPE html>
<html>
<head>
	<title>My Hobbies</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
	
</head>
<body>
<?php

    echo "\t<div id=\"container \">\n";    

    echo "\t\t<div class=\"Aclass\">\n";

    echo "\t\t<h1>My Hobbies</h1>\n\n";

    echo "\t\t<span>Jestem programistą</span>";

    echo "\t\t<p>I am a software developer </p> <br/>";

    echo "\t\t<p>Born in Winnipeg, I grew up loving video games and computers. I appreciated the idea of new worlds being created and being able to explore them, 
    without leaving the comforts of home. </p>";

    echo "<p>Some of my favourite subjects are:</p>";

    echo "<ul>
        <li>Computers, Video Games, Information Technology</li>
        <li>Physics and Cosmology</li>
        <li>Psychology</li></ul>";
    
    echo "\t\t<h3>Musica</h3>";
    echo "\t\t<p>I like a lot of different genres, {except modern country} some of them include: Pink Floyd, Tool, Kendrick Lamar, Chopin, Eminem, Daft punk  </p>";

    echo "\t\t<h3>Gaming</h3>";
    echo "\t\t<p>Some of my all time favs are: TES:Oblivion, Modern Warfare 2, League of Legends, World of Warcraft, Super Metroid, Pokemon:Silver</p>";

    echo "\t\t</div>\n";

    echo "\t\t<div class=\"Moonclass\">\n";

    echo "\t\t<img src=\"moon.jpg\"/>";

    echo "\t\t</div>\n";

    echo "\t\t</div>\n";
?>
</body>
</html>