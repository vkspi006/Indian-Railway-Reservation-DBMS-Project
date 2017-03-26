<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'Vivek123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'railway1');
 

 
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
<?php
session_start();
$Train_No=$_SESSION["Train_No"];
//$Train_No=$_GET['Train_No'];
?>

<html>
<head>
<title>Train Schedule</title>
</head>
<body>
<center><h2>Train Schedule  <br> Train No: &nbsp<?php echo $Train_No; ?> <h2></center>


<?php


		$ans=array();
		$sql="select Station,Time,Day,Station_Id,Distance from train_schedule where Train_No=$Train_No";
		$res=(mysqli_query($dbc,$sql));
		
		echo "<table border='4' width=100% id= results>
	  <tr>


<th>Station</th>
<th>Time</th>
<th>Day</th>
<th>Starion Id</th>
<th>Distance</th>

</tr>";
	  
      while($ans = mysqli_fetch_array($res))
	  {
		  echo "<tr>"; 
	//echo "hello";
		  echo '<tr><td>'.$ans[0].'</td><td>'.$ans[1].'</td><td>'.$ans[2].'</td><td>'.$ans[3].'</td><td>'.$ans[4].'</td></tr>';
		  //echo "<script>alert('$ans[0]');</script>";
		
		  
		  
	  }
      echo "</table>";
	 
	
		
	

?>
<center>
<p>
	 <li><a href="p2.php">Back</a></li>
	 </p>
	 </center>
</body>
</html>