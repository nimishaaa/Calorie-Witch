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
			<img src="images/avg_price.png"
				 width=100px
				 height=100px
				 align="left"/> 
			<br clear=”left” /> 
			<p style="font-family: sans-serif; font-size: 30px; color: maroon">The average prices of trainers and dieticians in your cities...</p>
	</header>
	<br>
		<!-- Home Button -->
	<form>
	<input type=button onClick="parent.location='index.php'" value="Back to home?">
	</form>
	
<?php
	include('./my_connect.php');
	$mysqli = get_mysqli_conn();

//	SQL Query Statement to find the average price info
    $query = "SELECT (Dietitian.dt_city)as City, (ROUND(AVG(Dietitian.dt_price)))as Avg_Dietitian_Price, 
			   (ROUND(AVG(Trainer.tr_price)))as Avg_Trainer_price
			   FROM Dietitian JOIN Trainer
			   ON Dietitian.dt_city=Trainer.tr_city
			   GROUP BY Dietitian.dt_city
			   ORDER BY Dietitian.dt_city";
        echo "<br> <br><b> <left>Database Result</left> </b> <br> <br>";
        echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="sans-serif" color="maroon">Clinic</font> </td> 
          <td> <font face="sans-serif" color="maroon">Dietician Price</font> </td> 
          <td> <font face="sans-serif" color="maroon">Trainer Price</font> </td> 
          
      </tr>';
        
        if ($result = $mysqli->query($query)) {
        
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["City"];
                $field2name = $row["Avg_Dietitian_Price"];
                $field3name = $row["Avg_Trainer_price"];
                echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  
              </tr>';
            }
        
        $result->free();
        }

?>

</body>

</html>
