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
			<img src="images/person_info.png"
				 width=100px
				 height=100px
				 align="left"/> 
			<br clear=”left” /> 
			<p style="font-family: sans-serif; font-size: 24px; color: maroon">MY DASHBOARD</p>
	</header>
	
	<br>
	<!-- Home Button -->
	<form>
	<input type=button onClick="parent.location='index.php'" value="Back to home?">
	</form>

<?php
	include('./my_connect.php');
	$mysqli = get_mysqli_conn();
	
	$search_value=intval($_GET['p_id']);

	
//	SQL Query Statement to find the person info
	$query = "SELECT (Person.p_name), (Calories.c_ideal), (Calories.c_duration), (Calories.c_pounds), (Calories.c_target)
	FROM Person JOIN Calories
	ON Person.c_id = Calories.c_id
	WHERE Person.p_id=$search_value AND Person.p_duration=Calories.c_duration AND Person.p_pounds=Calories.c_pounds
	";
   
	echo "<br> <br><b> <left>My information:</left> </b> <br> <br>";
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
      
	  <tr> 
          <td> <font face="sans-serif" color="maroon">Name</font> </td> 
          <td> <font face="sans-serif" color="maroon">Ideal Calories</font> </td> 
          <td> <font face="sans-serif" color="maroon">Duration</font> </td>
		  <td> <font face="sans-serif" color="maroon">Pounds</font> </td> 
		  <td> <font face="sans-serif" color="maroon">Target Calories</font> </td> 
      </tr>';
        
        if ($result = $mysqli->query($query)) {
        
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["p_name"];
                $field2name = $row["c_ideal"];
                $field3name = $row["c_duration"];
				$field4name = $row["c_pounds"];
				$field5name = $row["c_target"];
                echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
				  <td>'.$field4name.'</td> 
				  <td>'.$field5name.'</td> 
                  
              </tr>';
            }
        
        $result->free();
         }
	
	$query1 = "SELECT Dietitian.dt_name, Dietitian.dt_price, Appointment.ap_date, Clinic.cl_name,Clinic.cl_city
	FROM Person, Dietitian, Appointment,Clinic
	WHERE Person.p_id=$search_value And Person.p_id = Appointment.p_id and Dietitian.dt_id = Appointment.dt_id and Dietitian.cl_id=Clinic.cl_id and Person.p_city IN
	(SELECT Dietitian.dt_city
	FROM Dietitian JOIN Clinic
    ON Dietitian.cl_id=Clinic.cl_id
  	WHERE Dietitian.dt_city= Clinic.cl_city)
	";
	
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
      
	  <tr> 
          <td> <font face="sans-serif" color="maroon">Dietitian Name</font> </td> 
          <td> <font face="sans-serif" color="maroon">Price</font> </td>
		  <td> <font face="sans-serif" color="maroon">Appointment Date</font> </td> 
		  <td> <font face="sans-serif" color="maroon">Clinic Name</font> </td> 
		  <td> <font face="sans-serif" color="maroon">City</font> </td> 
      </tr>';
      
	echo "<br> <br><b> <left>Medical Records:</left> </b> <br> <br>";
        if ($result1 = $mysqli->query($query1)) {
        
            while ($row = $result1->fetch_assoc()) {
                $field7name = $row["dt_name"];
                $field8name = $row["dt_price"];
				$field9name = $row["ap_date"];
				$field10name = $row["cl_name"];
				$field11name = $row["cl_city"];
                echo '<tr>  
                  <td>'.$field7name.'</td> 
                  <td>'.$field8name.'</td> 
				  <td>'.$field9name.'</td> 
				  <td>'.$field10name.'</td> 
				  <td>'.$field11name.'</td> 
                  
              </tr>';
            }
        
        $result1->free();
        }
	
	$query2 = "SELECT Trainer.tr_name, Trainer.tr_price,Gym.gym_name, Gym.gym_city
	FROM Person JOIN Trainer 
    ON Person.Tr_id = Trainer.tr_id and Trainer.tr_city=Person.p_city
	JOIN Gym
	ON Person.gym_id= Gym.gym_id and Gym.gym_city=Person.p_city
	WHERE Person.p_id =$search_value AND Person.p_city IN
	(SELECT Trainer.tr_city
	FROM Trainer JOIN Gym
    ON Trainer.gym_id=Gym.gym_id
    WHERE Trainer.tr_city = Gym.gym_city)
	";
	
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
      
	  <tr> 
          <td> <font face="sans-serif" color="maroon">Trainer Name</font> </td> 
          <td> <font face="sans-serif" color="maroon">Price</font> </td> 
		  <td> <font face="sans-serif" color="maroon">Gym Name</font> </td> 
		  <td> <font face="sans-serif" color="maroon">City</font> </td> 
      </tr>';
      
	echo "<br> <br><b> <left>Activity Records:</left> </b> <br> <br>";
        if ($result2 = $mysqli->query($query2)) {
        
            while ($row = $result2->fetch_assoc()) {
                $field12name = $row["tr_name"];
                $field13name = $row["tr_price"];
				$field14name = $row["gym_name"];
				$field15name = $row["gym_city"];
                echo '<tr>  
                  <td>'.$field12name.'</td> 
                  <td>'.$field13name.'</td> 
				  <td>'.$field14name.'</td> 
				  <td>'.$field15name.'</td> 
                  
              </tr>';
            }
        
        $result2->free();
        }

?>
	
</body>

</html>