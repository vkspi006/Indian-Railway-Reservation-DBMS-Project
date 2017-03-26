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
	$name =$_POST['Train_Name'];
	$type =$_POST['Train_Type'];
	$days =$_POST['Avail_Days'];
	$from =$_POST['Train_From'];
	$to =$_POST['Train_To'];
	
	
	if(empty($no) ||empty($name) ||empty($type) ||
	empty($days) ||empty($from) ||
	empty($to))
	{
		
		echo "Ooops can't leave any field blank!";
	}
	
	else{
		
		$sql="INSERT INTO train(Train_no,Train_Name,Train_Type,Avail_Days,Train_From,Train_To)".
		"VALUES('$no','$name','$type','$days','$from','$to')";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!".mysqli_error($dbc));
		}
		else
		{
			
			echo "<script type='text/javascript'>alert('NEW TRAIN ADDED!')</script>";
						header("refresh: 0.5; url = add_new_train.php");
		}
		
	}
}
?>
	
</body>
</html>