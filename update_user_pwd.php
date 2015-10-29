<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
	$current_pwd1 = md5($current_pwd);
		$query =mysql_query("select * from  users where upid='".$_SESSION['upid']."' and password='$current_pwd1'");	
	 $count = mysql_num_rows($query);

	if($count>0){
	$pwd1 = md5($pwd);
	$usrData=array(
        'password'=>$pwd1
    	);
		//print_r($usrData);exit;
		 $isupdated=update($usrData,'users','where  upid='.$_SESSION['upid']);
		 
		 if($isupdated){
		header("location:user-change-pwd.php?message=1");
	}else{header("location:user-change-pwd.php?message=3");}
	}
	else{
			header("location:user-change-pwd.php?message=2");
		}
?>