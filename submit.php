<!DOCTYPE html>
<html>
<head>
<title> Calorie Witch</title>
<style>
	body {
				background-image: url(images/bg.jpg);
				background-repeat: no-repeat;
				background-size: 100%;
			}
	</style>

</head>
<body>
	<header>
		<img src="images/submit.png"
				 width=100px
				 height=100px
				 align="left"/> 
			<br clear=”left” /> 
			<p style="font-family: sans-serif; font-size: 24px; color: maroon">Welcome to our community...</p>
	</header>
	
	<br>

	<!-- Home Button -->
	<form>
	<input type=button onClick="parent.location='index.php'" value="Back to home?">
	</form>
	
	<br>
	
<?php
	// Enable error logging: 
	error_reporting(E_ALL ^ E_NOTICE);
	// mysqli connection via user-defined function

	include('./my_connect.php');
	$mysqli = get_mysqli_conn();

	// SQL statement
	$query = "INSERT INTO Person(p_name,p_age,p_gender,p_city,p_height,p_weight, p_duration,p_pounds) VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $mysqli->prepare($query);

	// FORM DATA
	$p_name = $_POST['p_name'];
	$p_age = intval($_POST['p_age']);
	$p_gender = $_POST['p_gender'];
	$p_city = $_POST['p_city'];
	$p_height = intval($_POST['p_height']);
	$p_weight = intval($_POST['p_weight']);
	$p_pounds = intval($_POST['p_pounds']);
	$p_duration = intval($_POST['p_duration']);
	$ap_date = date($_POST['ap_date']);

	$stmt->bind_param('sissiiii', $p_name, $p_age, $p_gender, $p_city, $p_height, $p_weight,$p_duration,$p_pounds);

	if ($stmt->execute()){
		echo "Successfully Added New User";
	}else{
		echo "Sorry, there was an error. Please contact the Database Designer";
	}
	$stmt->close(); 
?>

</body>
</html>