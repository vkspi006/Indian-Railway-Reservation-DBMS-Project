<?php
session_start();
if(!isset($_SESSION["id"]))
	header("location:login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>BANK</title>
	<link rel= "stylesheet" type= "text/css" href="style.css">
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #808080;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>
	<ul>
  <li><a href="home_request.php">Home</a></li>
  <li style="float:right"><a  href="logout_request.php">Logout</a></li>
</ul>
	<p>
		<?php
		
		echo "EMPLOYEE ID: ".$_SESSION['id'];
		?>
	</p>
	<?php
	//passing values from new_account page
	$cid = $_POST["cid"];
	
	//to prevent sql injection
	$cid = stripcslashes($cid);
	
	$cid = mysql_real_escape_string($cid);
	
	//connect to server
	mysql_connect("localhost", "root", "");
	mysql_select_db("BANKING_DATABASE");
	
	//Query
		$id = $_SESSION['id'];
	$cus = mysql_query("select * from customers where C_ID = $cid;") or die ("failed to connect" .mysql_error());
	echo "<table border='4' width=100% id= results>
<tr>
<th>CUSTOMER ID</th>
<th>NAME</th>
<th>DATE OF BIRTH</th>
<th>GENDER</th>
<th>PHONE NO</th>
<th>ADDRESS</th>
</tr>";

while($row = mysql_fetch_array($cus))
  {


  echo "<tr>"; 

    echo "<td>" . $row['C_ID'] . "</td>";
    echo"<td>". $row['NAME']."</td>";
    echo"<td>". $row['DOB']."</td>";
    echo"<td>". $row['GENDER'] ."</td>";
    echo"<td>". $row['PHN_NO'] ."</td>";
    echo"<td>". $row['ADDRESS'] ."</td>";
  echo "</tr>";
  }
echo "</table>";
?>
	<div>
			<center><form action="view_account.php" method= "POST">
			<p>
				<input style="width: 150px; height: 30px;" type="Submit" id="btn" value="BACK" />
			</p>
			</form>
			</center>
	</div>
</body>

</html>
