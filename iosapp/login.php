<?php
include ('../includes/dbutil.php');

include ('includes/validation.php');

$parameters = array("user_email","password","device_id");

	$is_parameter_available = is_post_parameters_exists($parameters);

	if($is_parameter_available == 0)

	{

		extract($_POST);


			$password1 = md5($password);
			$userprofile_count = get_row_count_by_condition("users","where user_email='".$user_email."' and password='".$password1."'");

			if($userprofile_count > 0)
			{
				$userdata=array('device_id'=>$device_id);
				update($userdata,"users","where user_email='".$user_email."'");
				$result = selected_columns_by_condition("users","upid,user_email","where user_email='".$user_email."'");
				$result['status'] = 'success';
				echo json_encode($result);
			}

		else{


			$result['status'] = 'failed';

				echo json_encode($result);

		}


	}

	else{

			echo json_encode(array("status" => "failed"));

		}

		

?>