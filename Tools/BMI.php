<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>World Clock</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<h3 class="col-md-offset-1">Body Mass Index Calculator</h3>
	
	<form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
		<div class="form-group">
			<label class="control-label col-sm-2" for="height">Height(m):</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" placeholder="Enter height" id="height" name="height" maxlength="3">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="weight">Weight(kg):</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" placeholder="Enter weight" id="weight" name="weight" maxlength="3">
			</div>
		</div>
		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
      			<input type="submit" id="submit" name="bmi" value="Calculate BMI" class="btn btn-primary">
    		</div>
  		</div>
	</form>
	
	<?php
		//get input values and calculate BMI
		$height = $_GET["height"];
		$weight = $_GET["weight"];
		if($height != 0)
			$BMI = $weight/($height*$height);
		
		echo "<h3 class=\"col-md-offset-1\">Report:<br></h3>";
		//check for invalid input
		if($height <= 0 || $weight <= 0)
			echo "Wrong input! The height or weight cannot be nonpositive.";
		elseif(preg_match('/[^.0-9]/', $height) || preg_match('/[^.0-9]/', $weight))
			echo "Wrong input!";
		//valid input, classify BMI
		else {
			if($BMI <= 18.5)
				echo "<strong class=\"col-md-offset-1\">You are underweight.</strong>";
			elseif($BMI <= 24.9)
				echo "<strong class=\"col-md-offset-1\">You are at your normal weight.</strong>";
			elseif($BMI <= 29.9)
				echo "<strong class=\"col-md-offset-1\">You are overweight.</strong>";
			elseif($BMI <= 39.9)
				echo "<strong class=\"col-md-offset-1\">You are obese.</strong>";
			else
				echo "<strong class=\"col-md-offset-1\">You are morbidly obese.</strong>";
		}
	?>
	
	<strong>Your BMI is <?php echo substr($BMI, 0, 5); ?>.</strong>

</body>
</html>
