<?php
include ('../includes/dbutil.php');

include ('includes/validation.php');

$parameters = array("user_name","user_email","fb_id","device_id");

	$is_parameter_available = is_post_parameters_exists($parameters);

	if($is_parameter_available == 0)

	{

		extract($_POST);



			$userprofile_count = get_row_count_by_condition("users","where user_email='".$user_email."'");

			if($userprofile_count <= 0){

				
				
				$userdata = array('user_name'=>$user_name,
                  'user_email'=>$user_email,
				  'fb_id'=>$fb_id,
				  'device_id'=>$device_id);

			$isinserted = insertdata($userdata,"users");
			$result = selected_columns_by_condition("users","upid,user_email","where user_email='".$user_email."'");

			$result['status'] = 'success';

				echo json_encode($result);
		}

		else{

			$result = selected_columns_by_condition("users","upid,user_email","where user_email='".$user_email."'");

			$result['status'] = 'success';

				echo json_encode($result);

		}


	}

	else{

			echo json_encode(array("status" => "failed"));

		}

		

?>