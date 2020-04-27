<?php
session_start();

include("includes/header.php");

$id = $_GET['id'];

?>


<?php
$result = mysqli_query($con, "SELECT * FROM Cats WHERE cid = $id");
?>
<style>
    .info {
        height: 20vh;
    }

    .downloads {
        height: 10vh;
    }
</style>

<?php while ($row = mysqli_fetch_array($result)) : ?>
    <div class="row">
        <div class="col-xl-9">
            <?php if ($row['image'] != "") : ?>
                <img src="images/display/<?php echo $row['image']; ?>" alt="">
            <?php endif; ?>
        </div>

        <div class="col-xl-3">
            <div class="row info">
                <div class="col-12">
                <?php if ($row['breed'] != "") : ?>
                    <h1><?php echo $row['breed']; ?></h1>
                <?php endif; ?>
                <?php if ($row['origin'] != "") : ?>
                    <p>Origin: <?php echo $row['origin']; ?></p>
                <?php endif; ?>
                <?php if ($row['body'] != "") : ?>
                    <p>Body Type: <?php echo $row['body']; ?></p>
                <?php endif; ?>
                <?php if ($row['coat'] != "") : ?>
                    <p>Coat Length: <?php echo $row['coat']; ?></p>
                <?php endif; ?>
                <?php if ($row['colour'] != "") : ?>
                    <p>Coat Colour: <?php echo $row['colour']; ?></p>
                <?php endif; ?>
                <?php if ($row['pattern'] != "") : ?>
                    <p>Coat Pattern: <?php echo $row['pattern']; ?></p>
                <?php endif; ?>
            </div>
            </div>
            <div style="margin-top: 200px;" class="row downloads">
                <strong class="pl-3">Download</strong>
                <div class="d-flex col-12">
                    <a href="images/originals/<?php echo $row['image']; ?>" download>
                        [ Original ]
                    </a>
                    -
                    <a href="images/display/<?php echo $row['image']; ?>" download>
                        [ Display ]
                    </a>
                </div>
                <div class="d-flex col-12">
                    <a href="images/thumbs100/<?php echo $row['image']; ?>" download>
                        [ T100 ]
                    </a>
                    -
                    <a href="images/thumbs150/<?php echo $row['image']; ?>" download>
                        [ T150 ]
                    </a>
                    -
                    <a href="images/thumbs200/<?php echo $row['image']; ?>" download>
                        [ T200 ]
                    </a>
                </div>
            </div>
            <br />
            <br />
            <div>
                <button class="btn btn-info back-button">
                    <<-Prev</button> --- <button class="btn btn-info next-button">Next->>
                </button>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<script type="text/javascript">
    nextButton = document.querySelector(".next-button");
    backButton = document.querySelector(".back-button");

    nextButton.addEventListener("click", e => {
        <?php
        $result = mysqli_query($con, "SELECT * FROM Cats WHERE cid > $id ORDER BY cid ASC LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['cid'] != null) : ?>
                window.location.href = "http://tgorczynski1.dmitstudent.ca/dmit2025/catalog/gallery.php?id=<?php echo $row['cid'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })

    backButton.addEventListener("click", e => {
        <?php
        $result = mysqli_query($con, "SELECT * FROM Cats WHERE cid < $id ORDER BY cid DESC LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['cid'] != null) : ?>
                window.location.href = "http://tgorczynski1.dmitstudent.ca/dmit2025/catalog/gallery.php?id=<?php echo $row['cid'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })
</script>

<?php
include("includes/footer.php");
?>