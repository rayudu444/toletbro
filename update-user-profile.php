<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
		$query =mysql_query("select * from  users where upid='".$_SESSION['upid']."'");	
	 $count = mysql_num_rows($query);
	if($count>0){
	
	$usrData=array(
        'user_name'=>$user_name,
		'user_mobile'=>$user_mobile
    	);
		//print_r($usrData);exit;
		 update($usrData,'users','where  upid='.$_SESSION['upid']);
		 
		 
		header("location:user-profile.php?message=1");
	}else{
			header("location:user-profile.php?message=1");
		}
?>