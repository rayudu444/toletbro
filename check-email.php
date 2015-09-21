<?php
	include('includes/dbutil.php');
	 $condition = "where user_email = '".$_POST['email']."'";
	 $count = get_row_count_by_condition('users',$condition);
	
	if($count >0)
	{
		echo json_encode(false);
	}else{
		echo json_encode(true);
	}
?>