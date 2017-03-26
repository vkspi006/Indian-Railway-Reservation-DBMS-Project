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
	$id=$_POST['User_Id'];
	$first =$_POST['First_Name'];
	$last =$_POST['Last_Name'];
	$age =$_POST['Age'];
	$email =$_POST['Email'];
	$pass =$_POST['Password'];
	
	if(empty($id) ||empty($first) ||empty($last) ||
	empty($age) ||empty($email) ||empty($pass))
	{
		
		echo "Ooops can't leave any field blank!";
	}
	
	else{
		
		$sql="INSERT INTO user(User_id,First_Name,Last_Name,Age,Email,Password)".
		"VALUES('$id','$first','$last','$age','$email','$pass')";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!".mysqli_error($dbc));
		}
		else
		{
			echo"Data inserted succesfully!";
			header('Location: p1.html');
		}
		
	}
}
?>
	
</body>
</html>