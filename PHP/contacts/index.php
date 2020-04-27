<?php
session_start();
include ("includes/header.php");
$result = mysqli_query($con, "SELECT * FROM tgo_Contacts ORDER BY tgo_company ASC");

?>

  <div class="jumbotron">
        <h1 style="color:white;"><?php echo APP_NAME ?></h1>
        <p style="color: white;" class="lead">A contact database with generated pages
        </p>
        
      </div>

     
  <ul style="list-style-type: none;">
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <li>
      <div class="row">
        <div class="col-10">
          <div class="row">
            <div class="col-7">
              <h3>
                <a href="companyprofile.php?id=<?php echo $row['cid']; ?>"><?php echo $row['tgo_company']; ?></a>
              </h3>
              <p><?php echo $row['tgo_description']; ?></p>
            </div>
            <div class="col-4 pt-4">
              <a href="companyprofile.php?id=<?php echo $row['cid']; ?>">
                Profile Details
              </a>
              <br />
              <!-- <php echo $row['tgo_website']; ?> targets the actual company URL, were not leaving the appllication so dont use this-->
              <a href="#" target="_blank">
                Visit Website
              </a>
              <?php if ($row['tgo_email'] != "") : ?>
                <br />
                <i><a href="mailto:<?php echo $row['tgo_email']; ?>">Contact</a></i>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->
</ul>

<?php

include ("includes/footer.php");
?>