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
			<p style="font-family: sans-serif; font-size: 30px; color: maroon">Become a part of a healthier world...</p>
	</header>

	<!--	 Signup Form -->
	<form action="submit.php" method="POST">
	
	<!-- Name Text -->
	<label for="p_name">Name:</label>
	<input type="textbox" name="p_name">
	
	<br><br>
	
	<!-- Age Field -->
	<label for="p_age">Age (18-65):</label>
	<input type="number" name="p_age" min="18" max="65">
		
	<br><br>
		
	<!-- Gender Field -->
	<label for="p_gender">Gender:</label>
	<input type="radio" name="p_gender" value="F">Female
	<input type="radio" name="p_gender" value="M">Male

	<br><br>
		
	<!-- City Field -->
	<label for="p_city">Pick your city</label>
	<select name="p_city">
    <option value="Toronto">Toronto</option>
    <option value="Oakville">Oakville</option>
	<option value="Missisauga">Missisauga</option>
    <option value="Milton">Milton</option>
	<option value="Richmond Hill">Richmond Hill</option>
    <option value="Brampton">Brampton</option>
	<option value="Oshawa">Oshawa</option>
    <option value="Vaughan">Vaughan</option>
	<option value="Markham">Markham</option>
	</select>
	
	<br><br>

	<!-- Height Field -->
	<label for="p_height">Height (cm):</label>
	<input type="number" name="p_height">
	
	<br><br>
		
	<!-- Weight Field -->
	<label for="p_weight">Weight (kg):</label>
	<input type="number" name="p_weight">
	
	<br><br>
		
	<!-- Pounds Field -->
	<label for="p_pounds">How many pounds do you want to lose?</label>
	<select name="p_pounds">
    <option value="5">5</option>
    <option value="10">10</option>
	<option value="15">15</option>
    <option value="20">20</option>
	</select>
	
	<br><br>

	<!-- Duration Field -->
	<label for="p_duration">In how many weeks?</label>
	<select name="p_duration">
    <option value="1">1</option>
    <option value="2">2</option>
	<option value="3">3</option>
    <option value="4">4</option>
	</select>
	
	<br><br>

	<!-- Date Field -->
	<label for="ap_date">Please enter an appointment date:</label>
	<input type="date" name="ap_date">
	
	<br><br>

	<input type="submit" value="SUBMIT">
		
	</form>
	
<br><br>

	<!-- Home Button -->
	<form>
	<input type=button onClick="parent.location='index.php'" value="Back to home?">
	</form>

</body>
</html>