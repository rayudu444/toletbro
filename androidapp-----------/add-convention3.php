<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = 
array('cnv_upid',
	'convention_post_id',
     'price_per_plate',
        'deposite',
    	'negotiable',
    	'other_charges',
    	'contact_manager',
    	'description'
    	);
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$cnv_upid."' and convention_post_id='".$convention_post_id."'");	
	 $count = mysql_num_rows($query);
	if($count>0){
	$usrData=array('price_per_plate'=>$price_per_plate,
        'deposite'=>$deposite,
    	'negotiable'=>$negotiable,
    	'other_charges'=>$other_charges,
    	'contact_manager'=>$contact_manager,
    	'description'=>$description
    	);

		 update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
		 $result['status'] = "success";
		$result['convention_post_id'] = $convention_post_id;
		echo json_encode($result);
		
		}
		else
		{
			echo json_encode(array("status" => "failed"));
		}
}
else
{
	echo json_encode(array("status" => "failed"));
}
		
?>