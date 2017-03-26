<?php

require_once('../mysqli_connect.php');
 
$query = "SELECT * FROM user";
 

$response = @mysqli_query($dbc, $query);
 

if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr><td align="left"><b>User_id</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Age</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Password</b></td></tr>';
 

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' . 
$row['User_Id'] . '</td><td align="left">' . 
$row['First_Name'] . '</td><td align="left">' .
$row['Last_Name'] . '</td><td align="left">' .
$row['Age'] . '</td><td align="left">' .
$row['Email'] . '</td><td align="left">' .
$row['Password'] . '</td>';
 
echo '</tr>';
}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br />";
 
echo mysqli_error($dbc);
 
}
 

mysqli_close($dbc);
 
?>
 
