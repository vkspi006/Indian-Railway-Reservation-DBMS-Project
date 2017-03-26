<?php
session_start();
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
<title>Print Ticket</title>
</head>
<body>
<center>
<h2>
Available trains
</h2>
<?php
if(isset($_POST['submit'])){
	$from=$_POST['Train_From'];
	$to=$_POST['Train_To'];
	$date=$_POST['Date'];
	
	if(empty($from)||empty($to) || empty($date))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID CREDENTIALS--Fill All!!')</script>";
						header("refresh: 0.5; url = p2.php");
	}
	else
	{
		$ans = array();
		$from = mysqli_real_escape_string($dbc,$_POST['Train_From']);
      $to = mysqli_real_escape_string($dbc,$_POST['Train_To']); 
	  $date = mysqli_real_escape_string($dbc,$_POST['Date']); 
      $sql = "select A.Train_No, D.Train_Name,A.Station,CONCAT(HOUR(A.Time),':',MINUTE(A.Time)),B.Station,CONCAT(HOUR(B.Time),':',MINUTE(B.Time)),  GROUP_CONCAT(DISTINCT S.Days), GROUP_CONCAT(DISTINCT R.Class)
FROM train_schedule A
INNER JOIN train_schedule B
ON A.Train_No=B.Train_No
AND (B.DAY*24+(SELECT HOUR(B.TIME)))>(A.DAY*24+(SELECT HOUR(A.TIME)))	
INNER JOIN train_days S
ON A.Train_No=S.Train_No
INNER JOIN avail_seats R
ON A.Train_No=R.Train_No
INNER JOIN train D
ON A.Train_No=D.Train_No
INNER JOIN train_days E
ON A.Train_No=E.Train_No
WHERE A.Station='$from'
AND B.Station='$to'
AND E.Days=(SELECT DAYNAME('$date'))
GROUP BY A.Train_No, D.Train_Name";
      $result = mysqli_query($dbc,$sql);
	 //echo "<table><th><td>Train ID</td>\n\n\n<td>Train Name</td></th>";
	  echo "<table border='4' width=100% id= results>
	  <tr>
<th>Train No</th>
<th>Train Name</th>
<th>From</th>
<th>Departure Time</th>
<th>To</th>
<th>Arrivale Time</th>
<th>Availiable Days</th>
<th>Availiable Class</th>

</tr>";
	  
      while($ans = mysqli_fetch_array($result))
	  {
		  echo "<tr>"; 
	//echo "hello";
		  echo '<tr><td><a href="train_schedule.php?train_no='.$ans[0].'">'.$ans[0]."</a></td><td>".$ans[1].'</td><td>'.$ans[2].'</td><td>'.$ans[3].'</td><td>'.$ans[4].'</td><td>'.$ans[5].'</td><td>'.$ans[6].'</td><td>'.$ans[7].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="avail_seat.php">Check Availbilty</a></td><td>';
		  //echo "<script>alert('$ans[0]');</script>";
		  $_SESSION["Train_No"] = $ans[0];
		  $_SESSION["Train_From"] = $from;
		  $_SESSION["Train_To"] = $to;
		  $_SESSION["Date"] = $date;
		  $_SESSION["D_Time"] = $ans[3];
		  $_SESSION["A_Time"] = $ans[5];
		  
		  
	  }
      echo "</table>";
	 
	}
}
?>
	</center>
</body>
</html>