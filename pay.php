<?php
session_start();
$Train_No=$_SESSION["Train_No"];
$d_time=$_SESSION["D_Time"];
$a_time=$_SESSION["A_Time"];
?>

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
<title>Pay Now</title>
</head>
<body>
<center>
<?php
if(isset($_POST['submit'])){
	$from=$_POST['Train_From'];
	$to=$_POST['Train_To'];
	$date=$_POST['Date'];
	$name=$_POST['Name'];
	$age=$_POST['Age'];
	$Child=$_POST['Child'];
	$add=$_POST['Address'];
	$class=$_POST['Class'];
	
	
     
	$sql1 = "select (B.Distance - A.Distance) from train_schedule A,train_schedule B where A.Train_No='$Train_No' and A.Train_No='$Train_No' and A.Station='$from' and B.Station='$to' and B.Distance>A.Distance";
    $dist = mysqli_query($dbc,$sql1);
	$a = mysqli_fetch_array($dist);
	//echo $a[0];
	
	
	 if($class=='AC1'){
		 
		 $amt=intval($a[0])*5;
	 }
	 else if($class=='AC2'){
		 $amt=intval($a[0])*4;
	 }
	 else if($class=='AC3'){
		 $amt=intval($a[0])*3;
	 }else if($class=='SL'){
		 $amt=intval($a[0])*2;
	 }else {
		 $amt=intval($a[0])*1;
	 }
	
	
	if(empty($from)||empty($to) || empty($date))
	{
		
		
		echo "<script type='text/javascript'>alert('INVALID CREDENTIALS--Fill All!!')</script>";
						header("refresh: 0.5; url = p2.php");
	}
	else
	{
		//echo 'Train_No';
		//echo 'from';        echo 'To';
  
	 //echo "<table><th><td>Train ID</td>\n\n\n<td>Train Name</td></th>";
	  echo "<table border='4' width=100% id= results>
	  <tr>
<th>Train No</th>
<th>From</th>
<th>To</th>
<th>Date</th>
<th>Departure Time</th>
<th>Arrival</th>
<th>Distance</th>
<th>Class</th>
<th>Amount</th>
<th></th>

</tr>";
	
       //echo $Train_No;
		  echo "<tr>"; 
	//echo "hello";
		  echo '<tr><td>'.$Train_No.'</td><td>'.$from.'</td><td>'.$to.'</td><td>'.$date.'</td><td>'.$d_time.'</td><td>'.$a_time.'</td><td>'.$a[0].'</td><td>'.$class.'</td><td>'.$amt.'</td><td>';
		  $_SESSION["Class"] = $class;
		  $_SESSION["Child"] = $Child;
		  $_SESSION["Address"] = $add;
		  $_SESSION["Age"] = $age;
		  $_SESSION["Name"] = $name;
		  $_SESSION["Class"] = $class;
		  
		  
	  
      echo "</table>";
	  
	      
		  
	 
}
}
?>
<p>
<li><a href="final.php">Book Now</a></li>	
</p>
	</center>
</body>
</html>