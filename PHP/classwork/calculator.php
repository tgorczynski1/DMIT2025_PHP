<?php

	// Collecting post variables
	$num1 = $_POST['num1'];
	$math_op = $_POST['math_operator'];
	$num2 = $_POST['num2'];

	// Generating an array of mathematical variables
	$op_arr = array(
		'+',
		'-',
		'*',
		'/'
	);

	// Variable to capture the result of our calculation
	$result = '';

	// Variable to assemble the various options for our select field
	$operator_options = '';

	// Loop through our operator array
	foreach ($op_arr as $op) {

		// Determine if the element that is active in the loop, matches the $math_op value
		if ($op == $math_op) {
			// Apply the 'selected' attribute to a $op_sel variable
			$op_sel = ' selected="selected"';
		} else {
			// If this option isn't selected, make sure that the selected attribute isn't set
			$op_sel = '';
		}

		$operator_options .= '<option value="' . $op . '"' . $op_sel . '>' . $op . '</option>';
	}

	// Utilizing switch statement to make caluclation based on selected operator
	switch ($math_op) {
		case '+':
			$result = $num1 + $num2;
			break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '/':
            $result = $num1 / $num2;
                break;
        case '*':
            $result = $num1 * $num2;
                break;
		default:
			$result = "ERROR!";
			break;
	}

	// What happens if we try to concatenate the numbers and the operator?
	// $result = $num1 . $math_op . $num2;
?>

<!DOCTYPE html>
<html>
<head>
	<title>My rudimentary calculator</title>
	<!-- These must be in place to use Bootstrap ! -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

	<style type="text/css">
		.btm-mar {
			margin-bottom: 1rem;
		}
		.btm-mar-collapse {
			margin-bottom: 0;
		}
		.sr-hide {
			display: block;
			margin-bottom: 0;
			max-height: 0;
			overflow: hidden;
		}
		.btn {
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<h1 class="col-sm">My rudimentary calculator</h1>
		</div>

		<form name="myform" class="row" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

			<div class="col-5 col-sm-4 col-lg-3">
				<div class="form-group">
					<label for="number" class="sr-hide">Number 1:</label>
					<input type="number" class="form-control" name="num1" value="<?php echo $num1; ?>">
				</div>
			</div>

			<div class="col-2 col-sm-2 col-lg-1">
				<div class="form-group">
					<label for="math_operator" class="sr-hide">Mathematical operator:</label>
					<select class="form-control" name="math_operator">
						<?php echo $operator_options; ?>
					</select>
				</div>
			</div>

			<div class="col-5 col-sm-4 col-lg-3">
				<div class="form-group">
					<label for="number" class="sr-hide">Number 2:</label>
					<input type="number" class="form-control" name="num2" value="<?php echo $num2; ?>">
				</div>
			</div>

			<div class="col-sm-2">
				<input type="submit" class="btn btn-primary btm-mar-collapse" name="submit" value="Calculate">
			</div>

			<div class="col-sm-12 col-md-3">
			<?php if ($_POST['submit']) : ?>

				<h2>= <?php echo $result; ?></h2>

			<?php endif; ?>
			</div>

		</form>

	</div><!-- / .container -->

</body>
</html>