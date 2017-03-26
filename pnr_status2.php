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
<title>Pnr Status</title>
</head>
<body>
<center><h2>Pnr Status<h2></center>


<?php

 
if(isset($_POST['submit'])){
	$pnr=$_POST['pnr'];
	if(empty($pnr))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID TRAIN NO!!')</script>";
						header("refresh: 1; url = pnr_status.php");
	}
	
	else{
		$ans=array();
		$sql="select Pnr_No,Train_No,Status,Class,Seat_No from admin_tickets where Pnr_No='$pnr'";
		$res=(mysqli_query($dbc,$sql));
		
		echo "<table border='4' width=100% id= results>
	  <tr>
<th>Pnr No</th>
<th>Train No</th>
<th>Status</th>
<th>Class</th>
<th>Seat No</th>

</tr>";
	  
      while($ans = mysqli_fetch_array($res))
	  {
		  echo "<tr>"; 
	//echo "hello";
		  echo '<tr><td>'.$ans[0].'</td><td>'.$ans[1].'</td><td>'.$ans[2].'</td><td>'.$ans[3].'</td><td>'.$ans[4].'</td><td>';
		  //echo "<script>alert('$ans[0]');</script>";
		
		  
		  
	  }
      echo "</table>";
	 
	}
		
	
}
?>
<center>
<p>
	 <li><a href="p2.php">Home Page</a></li>
	 </p>
	 </center>
</body>
</html>