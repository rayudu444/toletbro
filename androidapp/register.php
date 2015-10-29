<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
include ('includes/gcm.php');

$parameters = array("user_name","user_email","password","user_mobile","gcm_id");

$params = json_decode ( file_get_contents ( "php://input" ) );

$is_parameter_available = is_post_parameters_exists($parameters,$params);

	//$is_parameter_available = is_post_parameters_exists($parameters);

	if(!$is_parameter_available)

	{

		$user_name = $params->user_name;
		$user_email = $params->user_email;
		$password = $params->password;
		$user_mobile = $params->user_mobile;
		$gcm_id = $params->gcm_id;



			$userprofile_count = get_row_count_by_condition("users","where user_email='".$user_email."'");

			if($userprofile_count <= 0){

				
				$password1 = md5($password);
				$userdata = array('user_name'=>$user_name,
                  'user_email'=>$user_email,
				  'user_mobile'=>$user_mobile,
				  'password'=>$password1,
				  'gcm_id'=>$gcm_id);

			$isinserted = insertdata($userdata,"users");
			$result = selected_columns_by_condition("users","upid,user_email","where user_email='".$user_email."'");

			$result['status'] = 'success';

				echo json_encode($result);
		}

		else{

			//$result = selected_columns_by_condition("users","upid,user_email","where user_email='".$user_email."'");

			$result['status'] = 'Already registered';

				echo json_encode($result);

		}


	}

	else{

			echo json_encode(array("status" => "failed"));

		}

		

?>