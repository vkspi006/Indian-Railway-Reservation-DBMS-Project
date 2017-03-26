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
<title>Print Tickets</title>
</head>
<body>

<center>
<?php

 
if(isset($_POST['submit'])){
	$id=$_POST['User_Id'];
	
	
	if(empty($id))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID CREDENTIALS--Fill All!!')</script>";
						header("refresh: 0.5; url = print_ticket.php");
	}
	else
	{
		$ans = array();
		//$from = mysqli_real_escape_string($dbc,$_POST['From_Station']);
      //$to = mysqli_real_escape_string($dbc,$_POST['To_Station']); 
      $sql = "SELECT * FROM admin_tickets where User_Id='$id'";
      $result = mysqli_query($dbc,$sql);
	 //echo "<table><th><td>Train ID</td>\n\n\n<td>Train Name</td></th>";
	  echo "<table border='4' width=100% id= results>
	  <tr>
<th>User Id</th>
<th>Pnr No</th>
<th>Train From</th>
<th>Train To</th>
<th>Date</th>
<th>Status</th>
<th>Train No</th>
<th>Class</th>
<th>Seat No</th>
<th>Name</th>
<th>Age</th>
<th>No Of Child</th>
</tr>";
	  
      while($ans = mysqli_fetch_array($result))
	  {
		  echo "<tr>"; 

		  echo "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2]."</td><td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$ans[8]."</td><td>".$ans[9]."</td><td>".$ans[10]."</td><td>".$ans[11]."</td></tr>";
		  
	  }
      echo "</table>";
	 
	}
}
?>

<p>
	 <li><a href="p2.php">Home Page</a></li>
	 </p>
	</center>
</body>
</html>