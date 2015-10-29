<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = 
array('cnv_upid',
    	'space_available_for',
		'other_services',
    	'additional_services',
    	'convention_post_id'
    	);


$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$cnv_upid."' and convention_post_id='".$convention_post_id."'");	
	 $count = mysql_num_rows($query);
	if($count>0){
		/*$food1 =implode(",", $food);
		$hall_suitable_for1 =implode(",", $hall_suitable_for);
		$technical_equipment1 = implode(",", $technical_equipment);*/
	$usrData=array('space_available_for'=>$space_available_for,
        'other_services'=>$other_services,
    	'additional_services'=>$additional_services
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
