<?php
include ('../includes/dbutil.php');

include ('includes/validation.php');

include ('includes/gcm.php');

$parameters = array("user_email","password","gcm_id");

$params = json_decode ( file_get_contents ( "php://input" ) );

$is_parameter_available = is_post_parameters_exists($parameters,$params);

	//$is_parameter_available = is_post_parameters_exists($parameters);

	if(!$is_parameter_available){

		$user_email = $params->user_email;
		$password = $params->password;
		$gcm_id = $params->gcm_id;

			$password1 = md5($password);
			$userprofile_count = get_row_count_by_condition("users","where user_email='".$user_email."' and password='".$password1."'");

			if($userprofile_count > 0)
			{
				$userdata=array('gcm_id'=>$gcm_id);
				update($userdata,"users","where user_email='".$user_email."'");
				$result = selected_columns_by_condition("users","user_name,user_mobile,upid,user_email","where user_email='".$user_email."'");
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