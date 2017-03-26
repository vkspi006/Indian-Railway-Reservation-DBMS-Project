<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'Vivek123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'railway1');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?><?php
session_start();
$from=$_SESSION["Train_From"];
$to=$_SESSION["Train_To"];
$date=$_SESSION["Date"];

//echo "<script>alert('$Train_No');</script>";
?>
<head>
<title>Data Base Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="pay.php" method="post">

<div id="Container">
  <div id="header_"> 
    <ul class="navi">
	  <li><a href="p2.php">Home Page</a></li>
	 
      <!--<li><a href="">About Us</a></li>
      <li><a href="">Contact Us</a></li>
      <li><a href="">Latest Events</a></li> -->
      
     <form action="signout.php" method="post"> <li><a href="signout.php">Sign Out</a></li></form>
    </ul>
  </div>
  <div id="left_">
    <h2>BOOKING</h2>
    <p><span><b></b>

<p>                         
</p>


<p><span><b></b>
    
    <p></p>
    <p></p>
    <p><a href=""></a></p>
    <p></p>
    <p><span></span>  </p>
    <p></p>
  </div>
  <div id="right_">
    <h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Fill The Details</h2>
    <p><span class="style1"></span>  </p>
	<p>From Station:
<input type="text" name="Train_From" size="30" value="<?php echo $from?>" />
</p>
<br>
<p>To Station:&nbsp &nbsp
<input type="text" name="Train_To" size="30" value="<?php echo $to?>" />
</p>
<br>
<p>Date of journey:&nbsp &nbsp &nbsp &nbsp
<input name="Date" type="Date"  value="<?php echo $date?>"/>
</p>
<br>
<p>Class:&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp
<select name="Class">
  <option value="AC1">AC1</option>
  <option value="AC2">AC2</option>
  <option value="AC3">AC3</option>
  <option value="SL">SL</option>
   <option value="CC">CC</option>
</select>
<p>

<br>
<p>Full Name:&nbsp &nbsp 
<input type="text" name="Name" size="30" value="" />
</p>
<br>
<p>Age:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<input type="ini_set" name="Age" size="30" value="" />
</p>
<br>
<p>No of Child:
<input type="ini_set" name="Child" size="30" value="" />
</p>
<br>
<p>Address:&nbsp &nbsp &nbsp 
<input type="text" name="Address" size="30" value="" />
</p>
<p>

</p>
<br>

<p>
<input type="submit" name="submit" value="submit" />
</p>

	</br></br>
    <p></p>
    <p></p>
   <br>
  </div>
  <div id="footer1_"> </div>
  <div id="footer2_">
    <p></p>
	<br>
    <p>Designed by 14CS01003 & 14CS01006 </a></br><br />
      
      <br /></br>
      
  </div>
  <div id="footer3_"> </div>
</div>
</body>
</html>
