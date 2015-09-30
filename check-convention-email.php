<?php
	include('includes/dbutil.php');
	if(isset($_POST['email']))
	{
		$condition = "where user_email = '".$_POST['email']."'";	
	}else{
		$condition = "where user_mobile = '".$_POST['mobile']."'";	
	}
	 


	 $count = get_row_count_by_condition('convention_users',$condition);
	
	if($count >0)
	{
		echo json_encode(false);
	}else{
		echo json_encode(true);
	}
?>