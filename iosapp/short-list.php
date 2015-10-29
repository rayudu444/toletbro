<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('user_id','post_id','post_type');	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$count=get_row_count_by_condition("users","WHERE upid=".$user_id);

	if($count>0){

	$usrData=array('user_id'=>$user_id,
        'post_id'=>$post_id,
    	'post_type'=>$post_type
    	);
		//$pcount=get_row_count_by_condition("post_add","WHERE post_id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
		
		 insertdata($usrData,'short_lists');
		 //$result['post_id'] = mysql_insert_id(); 
		 $result['status'] = 'success';
		 echo json_encode($result);
		 }else
		{
			echo json_encode(array("status" => "failed"));
		}

		}
		else
		{
			echo json_encode(array("status" => "failed"));
		}
		
?>