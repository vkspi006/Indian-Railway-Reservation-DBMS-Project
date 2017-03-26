<html>
<head>
<title>Add user</title>
</head>
<body>


<?php

 
if(isset($_POST['submit'])){
    
    $data_missing = array();
	
	
	if(empty($_POST['User_Id'])){
 
        
        $data_missing[] = 'User Id';
 
    } else{
 
        
        $u_name = trim($_POST['User_Id']);
 
    }
    
    if(empty($_POST['First_Name'])){
 
        
        $data_missing[] = 'First Name';
 
    } else {
 
        
        $f_name = trim($_POST['First_Name']);
 
    }
	 
 
    if(empty($_POST['Last_Name'])){
 
        
        $data_missing[] = 'Last Name';
 
    } else{
 
        
        $l_name = trim($_POST['Last_Name']);
 
    }
	 if(empty($_POST['Age'])){
 
        
        $data_missing[] = 'Age';
 
    } else{
 
        
        $a_ge = trim($_POST['Age']);
 
    }
	 if(empty($_POST['Email'])){
 
        
        $data_missing[] = 'Email';
 
    } else{
 
        
        $e_mail = trim($_POST['Email']);
 
    }
	
	 if(empty($_POST['Password'])){
 
       
        $data_missing[] = 'Password';
 
    } else{
 
       
        $p_assword = trim($_POST['Password']);
 
    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO user (User_Id,First_Name,Last_Name,Age,Email,Password) VALUES (?,?,?,?,?,?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "sssdss", $u_name,$f_name,$l_name,$a_ge,$e_mail,$p_assword);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'user Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}
 
?>
 
<form action="useradded.php" method="post">
    
    <b>Add a New User</b>
	
	<p>User Name:
<input type="text" name="User_Id" size="30" value="" />
</p>
    
    <p>First Name:
<input type="text" name="First_Name" size="30" value="" />
</p>
 
<p>Last Name:
<input type="text" name="Last_Name" size="30" value="" />
</p>

<p>Sex:
<input type="radio" name="Sex"  value="Male" />Male
<input type="radio" name="Sex"  value="Female" />Female

</p>

<p>Age:
<input type="ini_set" name="Age" size="5" value="" />
</p>



<p>Email:
<input type="text" name="Email" size="30" value="" />
</p>



<p>Password:
<input type="password" name="Password" size="30" value="" />
</p>

 
<p>
    <input type="submit" name="submit" value="Submit" />
</p>
    
</form>
</body>
</html>