<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('price_monthly','post_id','price_deposite','negotiable','maintance_month',
	'additional_charges','plot_area','plot_state','facing',
        'water_supply','upid'
    	);	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{

	extract($_POST);
	
	
	
	$usrData=array(
        'price_monthly'=>$price_monthly,
    	'price_deposite'=>$price_deposite,
		'negotiable'=>$negotiable,
		'maintenance_monthly'=>$maintance_month,
    	'additional_charges'=>$additional_charges,
		
    	'plot_area'=>$plot_area,
    	'plot_state'=>$plot_state,
        'door_facing'=>$facing,
		'water_supply'=>$water_supply
    	
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