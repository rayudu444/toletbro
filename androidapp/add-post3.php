<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('post_id','upid','pets','amenities','societyamenities',
	'property_for','description'
    	);	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{

	extract($_POST);
			
	$usrData=array(
        'pets_allowed'=>$pets,
    	'property_for'=>$property_for,
		'amenities'=>$amenities,
		'society_amenities'=>$societyamenities,
    	'description'=>$description
    	
    	);
		//print_r($usrData);exit;
		 update($usrData,'post_add','where post_id='.$post_id.' and upid='.$upid);
		 $result['post_id'] = $post_id;
		 $result['upid'] = $upid; 
		 $result['status'] = 'success';
		 echo json_encode($result);
		 }
		else
		{
			echo json_encode(array("status" => "failed"));
		}
		
?>