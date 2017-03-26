<html>
<head>
<title>Find Trains</title>
</head>
<body>
<h2>Welcome</h2>
<hr/>
<form action="findtrains2.php" method="post">
 <center>
<b>Find Train</b>
<p>From Station:
<input type="text" name="from" size="30" value="" />
</p>

<p>To Station:
<input type="text" name="to" size="30" value="" />
</p>
<p>Date:
<input name="datedepart" type="date"  value="<?php echo date('d/m/Y',strtotime($data["congestart"])) ?>"/>
</p>


<p>
<input type="submit" name="submit" value="Submit" />
</p>


<p>
<a href="p1.html">Home Page</a></p> 

<p>
<a href="bookingformn.php">Book Now</a></p></center>
</form>
</body>
</html>