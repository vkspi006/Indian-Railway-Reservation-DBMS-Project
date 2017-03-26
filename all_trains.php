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
<title>All Trains</title>
</head>
<body>

<center>
<?php

 
 {
	
		$ans1 = array();
		//$from = mysqli_real_escape_string($dbc,$_POST['From_Station']);
      //$to = mysqli_real_escape_string($dbc,$_POST['To_Station']); 
      $sql2 = "SELECT Train_No, Train_Name,Avail_Days FROM train";
      $result = mysqli_query($dbc,$sql2);
	 //echo "<table><th><td>Train ID</td>\n\n\n<td>Train Name</td></th>";
	  echo "<table border='4' width=100% id= results>
	  <tr>
<th>Train No</th>
<th>Train Name</th>
</tr>";
	  
      while($ans1 = mysqli_fetch_array($result))
	  {
		  echo "<tr>"; 

		  echo "<tr><td>".$ans1[0]."</td><td>".$ans1[1]."</td></tr>";
		  
	  }
      echo "</table>";
	 
	}

?>
<p>
	 <li><a href="admin.php">Home Page</a></li>
	 </p>
	
	</center>
</body>
</html>