echo '<tr><td>'.$ans[0].'</td><td>'.$ans[1].'</td><td>'.$ans[2].'</td><td>'.$ans[3].'</td><td>'.$ans[4].'</td><td>'.$ans[5].'</td><td>'.$ans[6].'</td><td><a href="avail_seat.php?from='.$from.'&&to='.$to.'&&date='.$date.'&&train_no='.$ans[0].'">'.$ans[7]."</a></td><td>"


<?php
session_start();
if(!isset($_SESSION["id"]))
	header("location:login.php");

	//passing values from new_account page
	$acc_no = $_POST["acc_no"];
	$trans_type = $_POST["trans_type"];
	$amt = $_POST["amt"];
	$mode = $_POST["mode"];
	
	//to prevent sql injection
	$acc_no = stripcslashes($acc_no);
	$trans_type = stripcslashes($trans_type);
	$amt = stripcslashes($amt);
	$mode = stripcslashes($mode);
	
	$acc_no = mysql_real_escape_string($acc_no);
	$trans_type = mysql_real_escape_string($trans_type);
	$amt = mysql_real_escape_string($amt);
	$mode = mysql_real_escape_string($mode);
	
	//connect to server
	mysql_connect("localhost", "root", "");
	mysql_select_db("BANKING_DATABASE");
	
	//Query
		$id = $_SESSION['id'];
		$br_id = mysql_query("select * from employees where E_ID = $id;") or die ("failed to connect" .mysql_error());
		$br_id1= mysql_fetch_array ($br_id);
	$acc = mysql_query("select * from account_info where ACC_NO =".$acc_no.";") or die ("failed to connect" .mysql_error());
	$acc1 = mysql_fetch_array($acc);
	
		if( $acc1['STATUS'] == "Y" and $acc1['ACC_TYPE'] != "LOAN"){
			$start_date= mysql_query("select curdate() datte;") or die ("failed to connect".mysql_error());
			$start_date1= mysql_fetch_array ($start_date);
		
				if( $trans_type == "DEPOSIT"){
					$post = $acc1['BALANCE'] + $amt;
					$sql3="insert into transactions values (".$acc1['ACC_NO'].",'C','".$start_date1['datte']."',".$amt.",".$acc1['BALANCE'].",".$post.",'".$mode."');";
					$tf = mysql_query($sql3) or die ("failed to connect" .mysql_error());
					//$sql2="update account_info set balance = ".$post." where acc_no = ".$acc1['ACC_NO'].";";
					//mysql_query($sql2) or die ("failed to connect" .mysql_error());
					echo "<script type='text/javascript'>alert('TRANSACTION COMPLETED!')</script>";
					if($br_id1['ROLE'] == 'MANAGER'){
					header("refresh: 1; url =  manager_login.php");
					}
					ELSE{
					header("refresh: 1; url =  employee_login.php");
					}
				}
		
				elseif ($trans_type == "WITHDRAW" ){
					$post = $acc1['BALANCE'] - $amt;
					if($acc1['ACC_TYPE'] == "CURRENT" and $post >= 0){
						$sql3="insert into transactions values (".$acc1['ACC_NO'].",'D','".$start_date1['datte']."',".$amt.",".$acc1['BALANCE'].",".$post.",'".$mode."');";
						mysql_query($sql3) or die ("failed to connect" .mysql_error());
						//$sql2="update account_info set balance = ".$post." where acc_no = ".$acc1['ACC_NO'].";";
						//mysql_query($sql2) or die ("failed to connect" .mysql_error());
						echo "<script type='text/javascript'>alert('TRANSACTION COMPLETED!')</script>";
						if($br_id1['ROLE'] == 'MANAGER'){
						header("refresh: 1; url =  manager_login.php");
						}
						ELSE{
						header("refresh: 1; url =  employee_login.php");
				}
					}
					elseif($acc1['ACC_TYPE'] == "SAVINGS" and $post >= 1000){
						$sql3="insert into transactions values (".$acc1['ACC_NO'].",'D','".$start_date1['datte']."',".$amt.",".$acc1['BALANCE'].",".$post.",'".$mode."');";
						mysql_query($sql3) or die ("failed to connect" .mysql_error());
						//$sql2="update account_info set balance = ".$post." where acc_no = ".$acc1['ACC_NO'].";";
						//mysql_query($sql2) or die ("failed to connect" .mysql_error());
						echo "<script type='text/javascript'>alert('TRANSACTION COMPLETED!')</script>";
						if($br_id1['ROLE'] == 'MANAGER'){
						header("refresh: 1; url = manager_login.php");
						}
						ELSE{
						header("refresh: 1; url = employee_login.php");
						}
					}
		
					else{
						echo "<script type='text/javascript'>alert('INSUFFICIENT BALANCE!')</script>";
						header("refresh: 1; url = transactions.php");
					}
				}
				else{
					header("refresh: 1; url = wd.php");
				}
				
			}
		else{
			echo "<script type='text/javascript'>alert('INCORRECT ACCOUNT NUMBER OR INACTIVE ACCOUNT!')</script>";
			header("refresh: 1; url = transactions.php");
			}
?>