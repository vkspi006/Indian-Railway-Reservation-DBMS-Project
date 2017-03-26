
<?php
session_start();
$user=$_SESSION["user"];
?>
<head>
<title>Data Base Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form action="findtrains2.php" method="post">

<div id="Container">
  <div id="header_"> 
    <ul class="navi">
      <li><a href="p2.php">Home Page</a></li>
      
      <li><a href="cancel.php">Cancel Ticket</a></li> 
       <li><a href="print_ticket.php">Print Tickets</a></li>	  
      <li><a href="pnr_status.php">PNR Status</a></li>
	  
	  <li><a href="signout.php">Sign Out</a></li>
    </ul>
  </div>
  <div id="left_">
  <br>
    <h2>&nbsp Hi, <?php echo $user;?></h2>
    <p><span>&nbsp &nbsp <b></b>

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
    <h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Plan Your Journey</h2>
    <p><span class="style1"></span>  </p>
	<br><p>From Station:
<input type="text" name="Train_From" size="30" value="" />
</p>
<br>
<p>To Station:&nbsp &nbsp
<input type="text" name="Train_To" size="30" value="" />
</p></br>

<p>Date:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<input name="Date" type="date"  >
</p>
<br>
<br>
<p>
<input type="submit" name="submit" value="Submit" />
</p></br></br>
</form>
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
</html>
