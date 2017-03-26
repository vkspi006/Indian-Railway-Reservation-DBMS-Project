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
$d_time=$_SESSION["D_Time"];
$a_time=$_SESSION["A_Time"];
$from=$_SESSION["Train_From"];
$to=$_SESSION["Train_To"];
$date=$_SESSION["Date"];
$add=$_SESSION["Address"];
$Child=$_SESSION["Child"];
$age=$_SESSION["Age"];
?>
<html>
<head>
<title>Print Tickets</title>
</head>
<body>

<center>
<h2>
Transaction Complete
</h2>
<hr>
<h3>
Your Ticket Has Been Booked
</h3>
<?php

 
if(isset($_POST['submit'])){
	$id=$_POST['User_Id'];
	
	
	if(empty($id))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID CREDENTIALS--Fill All!!')</script>";
						header("refresh: 0.0001; url = final.php");
	}
	else
	{
		$ans = array();
		$pnr=rand(1000000000,9999999999);
		//$from = mysqli_real_escape_string($dbc,$_POST['From_Station']);
      //$to = mysqli_real_escape_string($dbc,$_POST['To_Station']); 
      //$sql = "SELECT Pnr_No FROM admin_tickets where User_Id='asd'";
      //$result = mysqli_query($dbc,$sql);
	 //echo "<table><th><td>Train ID</td>\n\n\n<td>Train Name</td></th>";
	  echo "<table border='4' width=100% id= results>
	  <tr>
	  <th>User Id</th>
<th>PNR No</th>
<th>Train No</th>
<th>From</th>
<th>To</th>
<th>Class</th>
<th>Status</th>
<th>Seat No</th>
<th>No Of Children</th>
</tr>";
	  
      while($ans = mysqli_fetch_array($result))
	  {
		  echo "<tr>"; 

		  echo "<tr><td>".$user."</td><td>".$pnr."</td><td>".$Train_No."</td><td>".$from."</td></tr>".$to."</td></tr>".$class."</td></tr>".$status."</td></tr>".$seat."</td></tr>".$Child."</td></tr>";
		  
	  }
      echo "</table>";
	 
	}
}
?>
<br>
<p>

<li><a href="p2.php">Home Page</a></li>
<p>	
	</center>
</body>
</html>