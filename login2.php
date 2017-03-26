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
<title>Administrator login Page</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
	  $user = mysqli_real_escape_string($dbc,$_POST['Login_Id']);
      $pass = mysqli_real_escape_string($dbc,$_POST['Admin_Password']); 
      $sql = "SELECT * FROM admin WHERE Login_Id = '$user' and Admin_Password = '$pass'";
      $result = mysqli_query($dbc,$sql);
      $row_cnt = mysqli_num_rows ($result );
      if( $row_cnt == 1) 
		{
			echo"SUCCESFULLY LOGGED IN!";
			echo "______________________WELCOME ___ '$user'";
			
			header('Location: admin.php');
			exit();
		}
		else
		{
			die("Invalid User Name Or Password!!".mysqli_error($dbc));
				exit();
		}
	}
?>
	
</body>
</html>