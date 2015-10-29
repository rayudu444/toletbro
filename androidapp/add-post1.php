<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('upid','post_id','latitude','longitude','no_bedroos','no_bathrooms','no_balconies','no_parking2','no_parking4',
        'funished_status','floore'
    	);	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$usrData=array(
        'location_lat'=>$latitude,
    	'location_long'=>$longitude,
		'bedrooms'=>$no_bedroos,
		'bathrooms'=>$no_bathrooms,
    	'balconies'=>$no_balconies,
    	'parking_2wheeler'=>$no_parking2,
    	'parking_4wheeler'=>$no_parking4,
        'property_furnished_status'=>$funished_status,
		'floore_no'=>$floore
    	
    	);
		
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