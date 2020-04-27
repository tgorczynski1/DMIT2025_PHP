<?php
session_start();
include ("includes/header.php");
$count = mysqli_query($con, "SELECT COUNT(*) FROM tgo_Blog ");
$postnum = mysqli_fetch_array($count)[0];
$limit = 5;

function convertEmoticons($thisMessage) {

	$thisEmoticon = "<img src=\"emoticons/icon_biggrin.gif\" />";
	$thisMessage =  str_replace(":D", $thisEmoticon, $thisMessage);

	$thisEmoticon = "<img src=\"emoticons/icon_confused.gif\" />";
	$thisMessage =  str_replace(":S", $thisEmoticon, $thisMessage);

	$thisEmoticon = "<img src=\"emoticons/icon_cool.gif\" />";
  $thisMessage =  str_replace("8)", $thisEmoticon, $thisMessage);
  
  $thisEmoticon = "<img src=\"emoticons/icon_wink.gif\" />";
	$thisMessage =  str_replace(";)", $thisEmoticon, $thisMessage);

  return $thisMessage;
}
function makeClickableLinks($text) {
	$text = " " . $text;

	$text = preg_replace(
		'/(((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
		'<a href="\\1">\\1</a>', 
		$text
	);
	$text = preg_replace(
		'/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
		'\\1<a href="http://\\2">\\2</a>', 
		$text
	);
	$text = preg_replace(
		'/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
		'<a href="mailto:\\1">\\1</a>', 
		$text
	);
	
	return trim($text);
}
?>
<!--build limit argu for query -->
<?php
	if ($postnum > $limit) {
		// Fires if the number of posts in the DB is MORE than the limit
		/*
			DOCUMENTATION for round()

			- https://www.php.net/manual/en/function.round.php
			- https://www.w3schools.com/php/func_math_round.asp
		*/
		// Checks to see if the number of posts is divisible by the limit value
		$tagend = round($postnum % $limit);
		// Sets a rounded value for the number of pages within the pagination structure
		$splits = round(($postnum - $tagend)/$limit);
		
		if ($tagend == 0) {
			// If number of posts is divisible by the limit
			$num_pages = $splits;
		} else {
			// Add one to accommodate remainders from the last posts for post counts not divisible by the post count
			$num_pages = $splits + 1;
		}

		// Sets the $pg value from the query string if available, otherwise defaults to 1
		if (isset($_GET['pg'])) {
			$pg = $_GET['pg'];
		} else {
			$pg = 1;
		}
		
		// Sets a starting point value for the paginated query
		$startpos = ($pg * $limit) - $limit;
		// Sets the query string argument
		// DOCUMENTATION: https://www.w3schools.com/php/php_mysql_select_limit.asp
		$limstring = "LIMIT $startpos,$limit";
	} else {
		// Fires if the number of posts in the DB is LESS than the limit
		// DOCUMENTATION: https://www.w3schools.com/php/php_mysql_select_limit.asp
		$limstring = "LIMIT 0,$limit";
	}

	$result = mysqli_query($con, "SELECT * FROM table_name ORDER BY datetime DESC $limstring");
?>
<div class="jumbotron">
      <h1 style="color:white;"><?php echo APP_NAME ?></h1>
      <p style="color: white;" class="lead">A Blog database with emojis, pagination and a pre-loaded drop-down list</p>
  </div>
<?php /*** 3) BUILD LIMIT ARGUMENTS FOR QUERY ***/ ?>
<?php if ($postnum > $limit) : ?>
	<?php
		$next_inc = $pg + 1;
		$prev_inc = $pg - 1;
		$thisroot = $_SERVER['PHP_SELF'];
		
		$next_href = "$thisroot?pg=$next_inc";
		$prev_href = "$thisroot?pg=$prev_inc";
	?>

<?php
$result = mysqli_query($con, "SELECT * FROM tgo_Blog ORDER BY bid DESC $limstring");
?>
<ul class="" style="list-style-type:none;" >
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <li class="">
      <div class="row">
        <div class="col-12">
          <div class="row" style="border: 1.5px solid black; margin-bottom: 10px; background-color: lightblue;">
            <div class="col-1" style="font-weight: bold;">
              <p style="margin-top:10px;">
                <span style="font-size: 10px;"><?php echo $row['tgo_date'] ?> </span>
              </p>
            </div>
            <div class="col-10 message-box">
                <h4 style="margin-top:10px;">Title: <?php echo $row['tgo_title']; ?></h4>
                <h6 style="font-size:13px;">Blog Entry: <?php echo $row['bid']; ?></h6>
              <p><?php echo nl2br(makeClickableLinks(convertEmoticons($row['tgo_message']))); ?></p>
            </div>
          </div>
        </div>
      </div>
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->

</ul>
  <div class="pagination">
	<?php // Loop through number of pages for pagination & build links ?>
	<?php for($i=1; $i<=$num_pages; $i++) : ?>
		<?php if($i!= $pg) : ?>
			<?php $pg_href = "$thisroot?pg=$i"; ?>
			<li>
				<a href="<?php echo $pg_href; ?>"><?php echo $i; ?></a>
			</li>
		<?php else : ?>
			<li class="active">
				<a href=""><?php echo $i; ?></a>
			</li>
		<?php endif; ?>
	<?php endfor; ?>

	<?php // Check if there's a next paginated page in relation to the current page query string ?>
	<?php if($pg < $num_pages) : ?>
		<li>
			<a href="<?php echo $next_href; ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
		</li>
	<?php endif; ?>
<?php endif; ?>
</div>

<?php

include ("includes/footer.php");
?>