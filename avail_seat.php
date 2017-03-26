<?php
session_start();
$Train_No=$_SESSION["Train_No"];
//echo "<script>alert('$Train_No');</script>";
?>
<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'Vivek123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'railway1');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
<html>
<head>
<title>Print Ticket</title>
</head>
<body>
<center>
<h2>
Available Seats
</h2>
<?php


$sql = "select GROUP_CONCAT(Seat_Avail) from avail_seats where Train_No='$Train_No'";
$result = mysqli_query($dbc,$sql);
echo "<table border='4' width=100% id= results>
<tr>
<th>Train No</th>
<th>Avilable Seats [AC1,AC2,AC3,SL,CC]</th>



</tr>";
	  
      while($ans = mysqli_fetch_array($result))
	  {
		  echo "<tr>"; 
	//echo "hello";
		  echo '<tr><td>'.$Train_No.'</td><td>'.$ans[0].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="booknow.php">Book Now</a></td><td>';
		  
	  }
      echo "</table>";
	
	

?>



<br>
<br>
<br>
<br>
<br>

 



	</center>
</body>
</html>