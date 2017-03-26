<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'Vivek123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'railway1');
 
echo "i am here";
 
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>



<html>
<head>
<title>SignUp Page</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
	
	echo "hello i am here";
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
		
		$sql="INSERT INTO user(id,first,last,age,email,pass)".
		"VALUES('$id','$first','$last','$age','$email','$pass')";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!".mysqli_error($dbc));
		}
		else
		{
			echo"Data inserted succesfully!";
		}
		
	}
}
?>

<form action="user.php" method="<?php $_SERVER["$PHP_SELF"]; ?>">
 
<b>Add a New user</b>
<p>User Id:
<input type="text" name="User_Id" size="30" value="" />
</p>

 
<p>First Name:
<input type="text" name="First_Name" size="30" value="" />
</p>
 
<p>Last Name:
<input type="text" name="Last_Name" size="30" value="" />
</p>

<p>Sex:
<input type="radio" name="Sex"  value="Male" />Male
<input type="radio" name="Sex"  value="Female" />Female

</p>

<p>Age:
<input type="ini_set" name="Age" size="5" value="" />
</p>




<p>Email:
<input type="text" name="Email" size="30" value="" />
</p>



<p>Password:
<input type="password" name="Password" size="30" value="" />
</p>



<p>
<input type="submit" name="submit" value="Submit" />
</p>
 
</form>
</body>
</html>