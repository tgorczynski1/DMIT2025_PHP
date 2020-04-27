<!DOCTYPE html>
<html>
<head>
	<title>MadLibs</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

	<style type="text/css">
	.formstyle{ /* optional: in case you don't like the really wide form */
		max-width: 450px;
	}
	.btm-mar {
		margin-bottom: 1rem;
	}
	</style>
</head>
<body>
	<div class="container">

		<h1>MadLib</h1>

		<form name="myform" class="formstyle" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

			<div class="form-group">
				<label for="fname">First name:</label>
				<input type="text" class="form-control" name="fname">
			</div>

			<div class="form-group">
				<label for="lname">Last name:</label>
				<input type="text" class="form-control" name="lname">
			</div>

			<div class="form-group">
				<label for="weapon">Weapon of chocie? :</label>
				<input type="text" class="form-control" name="weapon">
			</div>

			<div class="form-group">
				<label for="deity">Favourite Deity? </label>
				<input type="text" class="form-control" name="deity">
			</div>

			<div class="form-group">
			<label for="options_from_select">Favourite color:</label>
				<select class="form-control" name="options_from_select">
					<option value="blue">blue</option>
					<option value="red">red</option>
					<option value="green">green</option>
				</select>
			</div>

			<div class="form-group">
			<label for="options_from_select2">Garment</label>
				<select class="form-control" name="options_from_select2">
					<option value="shirt">shirt</option>
					<option value="suit">suit</option>
					<option value="birthday suit">birthday suit</option>
				</select>
			</div>
			
			<div class="form-group">
			<label for="options_from_select3">How fast are you?</label>
				<select class="form-control" name="options_from_select3">
					<option value="fast">fast</option>
					<option value="slow">slow</option>
					<option value="quick">quick</option>
				</select>
			</div>

			<div class="btm-mar">
				<div>
					<label>Gender</label>
				</div>
				<label><input type="radio" name="radio_btn" value="radio button 1"> Male</label>
				<label><input type="radio" name="radio_btn" value="radio button 2"> Female</label>
			</div>

			<input type="submit" class="btn btn-primary" name="submit" value="Tell me a story...">	

		</form>

		<div class="story">
			<?php

				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$deity = $_POST['deity'];
				$weapon = $_POST['weapon'];
				$fav_colour = $_POST['options_from_select'];
				$garment = $_POST['options_from_select2'];
				$speed = $_POST['options_from_select3'];
				$radio_btn = $_POST['radio_btn'];

				$story = '';
				$gender = '';

				if ($radio_btn == "radio button 1"){
					$radio_conditional = "Radio button 1 clicked";	
					$gender = 'male';
				} else {
					$radio_conditional = "Radio button 2 was clicked instead";
					$gender = 'female';
				}

				//echo $fname . " | " . $lname. " | " . $fav_colour. " | " . $garment. " | " .$gender . " | " .$radio_conditional;// one way to test each variable; if we see || without anything between, we need to check on a missing variable.

				if (isset($_POST['submit'])) {
					/*
						Here, you create your story, appending your various variables that you generated above
						into a series of html content outputs. Use the append operator (.=) to add to the $story
						variable.

						Could look like this:

						$story .= "<p>Here's some text with fname: " . $fname . " appended to it.</p>";

						You need at least 8 variables in your story.
					*/
					$story .= "<p>Once upon a time, there was a " . $gender . " named " . $fname . "  " . $lname . ". On a sunny winters day, " . $fname . " emerged from their humble abode. They had just put on their fresh " . $garment . " and was prepared to take on the day. " . $fname . " noticed a faint scream and quickly jumped into action. Carefully navigating the mountain terrain, " . $fname . " went through the trees and the crumbling earth, they found what had made the noise. Lay beneath their feet was a managled corpse of a high elf. His silky " . $fav_colour . " hair, blood-stained, ripped and falling out. A large " . $weapon . " lodged straight into their back. Suddenly, a large figure pounces from the bush, " . $fname . " was " . $speed  . " to grab their knife. A red haze... then nothing. " . $fname . " woke a couple of hours later, the beast was dead, the " . $lname."s will need to hear this. Disgruntled, but alive they grabbed the " . $weapon . " from the dead elf. " . $fname . " said a thoughtful prayer to their god " . $deity . " and moved away from the scene. </p>";
					
				}

				echo $story;

			?>
		</div>

	</div><!-- / .container -->

</body>
</html>