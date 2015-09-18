<?php
session_start();
	include_once('includes/dbutil.php');

	extract($_POST);

	$count=get_row_count_by_condition("convention_users","where fb_token='$id' and user_email='$email'");
	
	if($count>0){
		
		$row=get_row_by_condition("convention_users","where user_email='$email'");
		
		$_SESSION['cnv_upid'] = $row['cnv_upid'];
		$_SESSION['user_name'] = $row['user_name'];
		$result['status'] = "true";
		echo json_encode($result);
	}else{
		$name = $first_name." ".$last_name;
		$userdata = array('user_name'=>$name,'fb_token'=>$id,'user_email'=>$email);
	 $isupdated = insertdata($userdata,"convention_users");
	 if($isupdated>0){
		 $row1=get_row_by_condition("convention_users","where user_email='$email'");
		 $_SESSION['cnv_upid'] = $row1['cnv_upid'];
		$_SESSION['user_name'] = $row1['user_name'];
	 	$result['status'] = "true";
		echo json_encode($result);
	 }
	}

	
?>