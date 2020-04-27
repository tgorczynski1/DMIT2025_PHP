<?php

include("includes/header.php");
//////////// pagination
$getcount = mysqli_query($con, "SELECT COUNT(*) FROM Cats");
$postnum = mysqli_result($getcount, 0); // this needs a fix for MySQLi upgrade; see custom function below
$limit = 9;
if ($postnum > $limit) {
  $tagend = round($postnum % $limit, 0);
  $splits = round(($postnum - $tagend) / $limit, 0);

  if ($tagend == 0) {
    $num_pages = $splits;
  } else {
    $num_pages = $splits + 1;
  }

  if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }
  $startpos = ($pg * $limit) - $limit;
  $limstring = "LIMIT $startpos,$limit";
} else {
  $limstring = "LIMIT 0,$limit";
}

// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field = 0)
{
  $res->data_seek($row);
  $datarow = $res->fetch_array();
  return $datarow[$field];
}
//////////////
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?> List Items</h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM Cats ORDER BY cid ASC $limstring");
?>

<style>
  .gallery-card-container {
    margin: 0 auto;
    max-width: 960px;
    padding-left: 1rem;
  }

  a:hover {
    text-decoration: none;
    /* no underline */
  }

  .gallery-a:hover {
    box-shadow: 0 0 5px 0 black;
  }

  .gallery-card h4 {
    color: #2a2a2a;
  }

  .gallery-card {
    color: gray;
    padding-top: .3rem;
    height: 220px;
    background: black;
    border: 2px solid black;
    border-radius: 6px;
    margin-right: 1rem;
    margin-bottom: 1rem;
  }

  .gallery-card-image {
    padding-top: .5rem;
    padding-left: .5rem;
    padding-right: .5rem;
    background: white;
    height: 98%;
  }
</style>
<div class="row d-flex gallery-card-container justify-content-center justify-content-sm-start">
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <a href="gallery.php?id=<?php echo $row['cid']; ?>">
      <div class="gallery-card gallery-a">
        <div class="gallery-card-image">
          <img style="border:1px solid grey;" src="images/squares150/<?php echo $row['image']; ?>" alt="thumbnail" />
          <h4 class="pt-2"><?php echo $row['breed']; ?></h4>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
<div class="row custom-pagination gallery-card-container pb-1">
  <div class="col-12">
    <?php include('includes/pagination.php'); ?>
  </div>
</div>
<?php

include("includes/footer.php");
?>