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
$name=$_SESSION["Name"];
$class=$_SESSION["Class"];
?>


<html>
<head>
<title>Book Tickets</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
	$user=$_SESSION["user"];
	$ccd=$_POST['ccd'];
	//$seat=1113;
	$status='confirm';
	$RANDOM=rand(1000000000,9999999999);
	
	if(empty($ccd))
	
	{
		
		echo "Ooops can't leave any field blank!";
	}
	
	else{
		$seat=array();
		$sql1 = "select Seat_Avail from avail_seats where Train_No='$Train_No' and Class='$class'";
        $disti = mysqli_query($dbc,$sql1);
	    $seat = mysqli_fetch_array($disti);
		if($seat[0]<=0){
			$status='waiting('.$seat[0].')';
			
		}
		$sql="INSERT INTO admin_tickets(User_Id,Pnr_No,Train_From,Train_To,Date,Status,Train_No,Class,Seat_No,Full_Name,Age,No_Of_Child,Address)".
		"VALUES('$user',$RANDOM,'$from','$to','$date','$status',$Train_No,'$class',$seat[0],'$name',$age,$Child,'$add')";
		$res=(mysqli_query($dbc,$sql));
		
		if(!$res)
		{
			die("Query failed!".mysqli_error($dbc));
		}
		else
		{
			
			echo "<script type='text/javascript'>alert('   Transaction Succesfull !!!Your Ticket Booked Succesfully!')</script>";
						header("refresh: 0.5; url = p2.php");
		}
		
	}
}
?>
	
</body>
</html>