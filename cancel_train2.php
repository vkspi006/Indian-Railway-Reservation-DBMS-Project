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
<title>Signup Page</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
	$no=$_POST['Train_No'];
	if(empty($no))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID TRAIN NO!!')</script>";
						header("refresh: 1; url = cancel_train.php");
	}
	
	else{
		
		$sql="DELETE FROM train WHERE Train_No='$no'";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!".mysqli_error($dbc));
		}
		else
		{
			echo "<script type='text/javascript'>alert('TRAIN CANCELLED!')</script>";
						header("refresh: 1; url = cancel_train.php");

		}
		
	}
}
?>
	
</body>
</html>