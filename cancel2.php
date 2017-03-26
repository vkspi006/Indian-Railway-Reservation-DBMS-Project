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
$user=$_SESSION["user"];

?>

<html>
<head>
<title>Signup Page</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
	$pnr=$_POST['pnr'];
	if(empty($pnr))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID TRAIN NO!!')</script>";
						header("refresh: 1; url = cancel.php");
	}
	
	else{
		
		$sql="UPDATE admin_tickets SET Status='CANCELLED' ,Seat_No=0 WHERE Pnr_No='$pnr'";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!This Ticket Not Belong To You!!".mysqli_error($dbc));
		}
		else
		{
			echo "<script type='text/javascript'>alert('Ticket CANCELLED!')</script>";
						header("refresh: 1; url = p2.php");

		}
		
	}
}
?>
	
</body>
</html>