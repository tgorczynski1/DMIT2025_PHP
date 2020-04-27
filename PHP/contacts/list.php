<?php

include ("includes/header.php");


?>

<h3 style="">Game of Thrones Characters</h3>
<br>
<div class='my-legend'>
<div class='legend-title'>Card Legend:</div>
<div class='legend-scale'>
  <ul class='legend-labels'>
    <li><span style='background:lightblue;'></span>North</li>
    <li><span style='background:lightgoldenrodyellow;'></span>South</li>
    <li><span style='background:lightgreen;'></span>West</li>
    <li><span style='background:darkslategray;'></span>Neutral</li>
  </ul>
</div>
<br>

<?php
$result = mysqli_query($con, "SELECT * FROM tgo_Characters ORDER BY tgo_firstname ") or die(mysqli_error($con));

while($row = mysqli_fetch_array($result)){
    echo "<hr />";
    if (strtolower($row['tgo_lastname']) == 'stark' || strtolower($row['tgo_lastname']) == 'tully' || strtolower($row['tgo_lastname']) == 'snow'  )
    {
        echo "<div class=\"north-card\">";
    }
    else{
        if (strtolower($row['tgo_lastname']) == 'lannister' || strtolower($row['tgo_lastname']) == 'baelish' || strtolower($row['tgo_lastname']) == 'baratheon' )
    {
        echo "<div class=\"south-card\">";
    }
    else{
        if(strtolower($row['tgo_lastname']) == 'drogo' || strtolower($row['tgo_lastname']) == 'stormborn targaryen' || strtolower($row['tgo_lastname']) == 'mormont')
        {
            echo "<div class=\"west-card\">"; 
        }
        else{

            echo "<div class=\"char-card\">"; 
        }
    }
}
    echo "<div class=\"card-body\">";
    echo "<h3 class=\"card-title\">" . $row['tgo_firstname'] . " " . $row['tgo_lastname'] . "</h3>";
    echo "<p class=\"card-text\">" . $row['tgo_description'] . "</p>";
    

    
    echo "</div>";
    echo "</div>";
    
    //echo "<hr>";
    //echo $row['tgo_firstname'] . " " . $row['tgo_lastname']. "<br>";
    //echo $row['tgo_description']. "<br>";
}

include ("includes/footer.php");
?>