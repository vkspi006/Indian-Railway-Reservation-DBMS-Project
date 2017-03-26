<html>
<head>
<title>Booking Form</title>
</head>
<body>
<h2>Book Ticket</h2>
<hr/>
<form action="findtrains2.php" method="post">
 <center>
<b>Fill The Details</b>
<p>From Station:
<input type="text" name="from" size="30" value="" />
</p>

<p>To Station:
<input type="text" name="to" size="30" value="" />
</p>

<p>Date of journey:
<input name="datedepart" type="date"  value="<?php echo date('d/m/Y',strtotime($data["congestart"])) ?>"/>
</p>

<p>Full Name:
<input type="text" name="Name" size="30" value="" />
</p>

<p>Age:
<input type="ini_set" name="Age" size="30" value="" />
</p>

<p>No of Child:
<input type="ini_set" name="no_of_child" size="30" value="" />
</p>

<p>Address:
<input type="text" name="address" size="30" value="" />
</p>





<p>
<input type="submit" name="submit" value="Submit" />
</p>


<p>
<a href="p1.html">Home Page</a></p> </center>
</form>
</body>
</html>