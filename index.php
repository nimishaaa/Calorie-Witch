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
	<!-- Header -->
	<header>
			<h1 style="font-family: sans-serif; font-size: 48px">Calorie Witch</h1>
			<p style="font-family: sans-serif; font-size: 22px; color: maroon">A simple web application for a healthier world...<br/>
			Created by - Group 6 (Nimisha and Defne)
			</p>
	</header>
	
<br>

	<!-- Sign Up Button -->
	<form>
	<input type=button onClick="parent.location='sign_up.php'" value="Don't know your ID? SIGN UP HERE">
	</form>
	
<br>
	
	<!-- Search Bar -->
	<form action="person_info.php" method="GET">
	<input type="textbox" name="p_id" placeholder="Enter your ID..">
	<input type="submit" value="Find">
	</form>

<br>

	<!-- Average Price Button -->
	<form>
	<input type=button onClick="parent.location='avg_price.php'" value="Explore AVERAGE PRICES around you!">
	</form>
	
<br>
	
	<!-- Gym Info -->
	<form>
	<input type=button onClick="parent.location='gym_info.php'" value="Explore GYMS around you!">
	</form>
	
<br>
	
	<!-- Clinic Info -->
	<form>
	<input type=button onClick="parent.location='clinic_info.php'" value="Explore CLINICS around you!">
	</form>
	
<br>
	

<?php
	include('./my_connect.php');
	$mysqli = get_mysqli_conn();

?>
	
</body>

</html>
