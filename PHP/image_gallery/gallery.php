<?php
session_start();

include("includes/header.php");

$id = $_GET['id'];
?>

<?php
$result = mysqli_query($con, "SELECT * FROM tgo_Image WHERE id = $id");
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
            <?php if ($row['tgo_file'] != "") : ?>
                <img src="images/display/<?php echo $row['tgo_file']; ?>" alt="">
            <?php endif; ?>
        </div>

        <div class="col-xl-3">
            <div class="row info">
                <div class="col-12">
                <?php if ($row['tgo_title'] != "") : ?>
                    <h1><?php echo $row['tgo_title']; ?></h1>
                <?php endif; ?>
                <?php if ($row['tgo_description'] != "") : ?>
                    <p><?php echo $row['tgo_description']; ?></p>
                <?php endif; ?>
            </div>
            </div>
            <div class="row downloads">
                <strong class="pl-3">Download</strong>
                <div class="d-flex col-12">
                    <a href="images/originals/<?php echo $row['tgo_file']; ?>" download>
                        [ Original ]
                    </a>
                    -
                    <a href="images/display/<?php echo $row['tgo_file']; ?>" download>
                        [ Display ]
                    </a>
                </div>
                <div class="d-flex col-12">
                    <a href="images/thumbs100/<?php echo $row['tgo_file']; ?>" download>
                        [ T100 ]
                    </a>
                    -
                    <a href="images/thumbs150/<?php echo $row['tgo_file']; ?>" download>
                        [ T150 ]
                    </a>
                    -
                    <a href="images/thumbs200/<?php echo $row['tgo_file']; ?>" download>
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
        $result = mysqli_query($con, "SELECT * FROM tgo_Image WHERE id > $id ORDER BY id ASC LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['id'] != null) : ?>
                window.location.href = "http://tgorczynski1.dmitstudent.ca/dmit2025/image_gallery/gallery.php?id=<?php echo $row['id'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })

    backButton.addEventListener("click", e => {
        <?php
        $result = mysqli_query($con, "SELECT * FROM tgo_Image WHERE id < $id ORDER BY id DESC LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['id'] != null) : ?>
                window.location.href = "http://tgorczynski1.dmitstudent.ca/dmit2025/image_gallery/gallery.php?id=<?php echo $row['id'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })
</script>

<?php
include("includes/footer.php");
?>