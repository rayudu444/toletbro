<?php
session_start();
	include('includes/dbutil.php');

	if(isset($_POST['current_pwd']))
	{
		$pwd=md5($_POST['current_pwd']);
		$condition="where password='".$pwd."' and upid=".$_SESSION['upid'];	
	
	
	 
	 $count = get_row_count_by_condition('users',$condition);
	
	if($count >0)
	{
		echo json_encode(true);
	}else{
		echo json_encode(false);
	}
	}
?>