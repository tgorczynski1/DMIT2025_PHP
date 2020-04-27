<div id="main">
<?php

include("includes/header.php");

$sql = "SELECT * FROM Cats";

//$result = mysqli_query($con,"SELECT * FROM Cats") or die (mysql_error());

$displayby = $_GET['displayby'];
$displayvalue = $_GET['displayvalue'];

if($displayby && $displayvalue){
	$sql = "SELECT * FROM Cats WHERE $displayby LIKE '$displayvalue'";
}

$min = $_GET['min'];
$max = $_GET['max'];

if($displayby == "weight" && $min && $max){
	$sql = "SELECT * FROM Cats WHERE weight BETWEEN $min AND $max";
}

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)) {
	$cid = ($row['cid']);
	$breed = ($row['breed']);
	$coat = ($row['coat']);
	$origin = ($row['origin']);
    $weight = ($row['weight']);
    $image = ($row['image']);
  
	echo "<div class=\"cats\">\n";
    echo "<div class=\"row\">\n ";
    echo "<div class=\"col-md-6\">\n ";
	echo "<span class=\"displayCategory\">Breed:</span> <span class=\"displayInfo\">". $breed ."</span><br />\n";
	echo "<span class=\"displayCategory\">Origin:</span> <span class=\"displayInfo\">". $origin ."</span><br />\n";
	echo "<span class=\"displayCategory\">Coat:</span> <span class=\"displayInfo\">". $coat ."</span><br />\n";
    echo "<span class=\"displayCategory\">Weight:</span> <span class=\"displayInfo\">". $weight ."</span><br />\n";
    echo "\n</div>\n";

    echo "<div class=\"col-md-6\">\n ";
    echo "<img src=\"../catalog/images/thumbs150/$image\" alt=\"thumbnail\" />";
    echo "\n</div>\n";
    echo "\n</div>\n";
    
echo "<div class=\"clearFix\"></div>\n";
echo "\n</div>\n";
}

if(mysqli_num_rows($result)==0){
	echo "<h1>Nothing to Show</h1>";
  }
?>
</div>

<div id="rightcol">
<h2>Filters</h2>
<a href="filters.php">All Cats</a><br />

<h4>My Cat </h3>
<a href="filters.php?displayby=breed&displayvalue=My Cat">Luna</a><br />
<h4>Origin</h4>
<a href="filters.php?displayby=origin&displayvalue=North America">North America</a><br />
<a href="filters.php?displayby=origin&displayvalue=Middle East">Middle East</a><br />
<a href="filters.php?displayby=origin&displayvalue=Asia">Asia</a><br />
<a href="filters.php?displayby=origin&displayvalue=Europe">Europe</a><br />
<a href="filters.php?displayby=origin&displayvalue=Oceania">Oceania</a><br />
<a href="filters.php?displayby=origin&displayvalue=Africa">Afrika</a><br />
<a href="filters.php?displayby=origin&displayvalue=South America">South America</a><br />


<h4>Coat</h4>
<a href="filters.php?displayby=coat&displayvalue=Short">Short</a><br />
<a href="filters.php?displayby=coat&displayvalue=Medium">Medium</a><br />
<a href="filters.php?displayby=coat&displayvalue=Long">Long</a><br />
<a href="filters.php?displayby=coat&displayvalue=Hairless">Hairless</a><br />
<a href="filters.php?displayby=coat&displayvalue=Mixed">Mixed Variety</a><br />

<h4>Weight(lb)</h4>
	<a href="filters.php?displayby=weight&min=4&max=8">Small Cats</a>
	<br />
	<a href="filters.php?displayby=weight&min=8&max=12">Average Cats</a>
	<br />
	<a href="filters.php?displayby=weight&min=12&max=20">Big Cats</a>
<h4>Breed</h4>
    <a href="filters.php?displayby=breed&displayvalue=Abyssinian">Abyssinian</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Balinese">Balinese</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Arabian Mau">Arabian Mau</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Munchkin">Munchkin</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Chartreux">Chartreux</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Cyprus">Cyprus</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Scottish Fold">Scottish Fold</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Siamese">Siamese</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Sphynx">Sphynx</a><br />
    <a href="filters.php?displayby=breed&displayvalue=Maine Coon">Maine Coon</a><br />

</div>
<?php

include("includes/footer.php");
?>