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
			<img src="images/gym_icon.png"
				 width=100px
				 height=100px
				 align="left"/> 
			<br clear=”left” /> 
			<p style="font-family: sans-serif; font-size: 24px; color: maroon">EXPLORE OUR PARTNER GYMS...</p>
	</header>
	<br>
		<!-- Home Button -->
	<form>
	<input type=button onClick="parent.location='index.php'" value="Back to home?">
	</form>
	
<?php
	include('./my_connect.php');
	$mysqli = get_mysqli_conn();

//	SQL Query Statement to find the gym info
    $query = "SELECT Gym.gym_name,Gym.gym_city, (COUNT(Trainer.tr_id))as Number_of_Trainers, (ROUND(AVG(Trainer.tr_price)))as Avg_Trainer_price
	FROM Trainer JOIN Gym
					ON Trainer.gym_id=Gym.gym_id
	GROUP BY  Gym.gym_name,Gym.gym_city
	ORDER BY Gym.gym_name";
        echo "<br> <br><b> <left>Database Result</left> </b> <br> <br>";
        echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="sans-serif" color="maroon">Name</font> </td> 
          <td> <font face="sans-serif" color="maroon">City</font> </td> 
          <td> <font face="sans-serif" color="maroon">Available Trainers</font> </td>
		  <td> <font face="sans-serif" color="maroon">Average Price</font> </td> 
      </tr>';
        
        if ($result = $mysqli->query($query)) {
        
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["gym_name"];
                $field2name = $row["gym_city"];
                $field3name = $row["Number_of_Trainers"];
				$field4name = $row["Avg_Trainer_price"];
                echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
				  <td>'.$field4name.'</td> 
                  
              </tr>';
            }
        
        $result->free();
        }

?>

</body>

</html>