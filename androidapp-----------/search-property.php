<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('property','lat','long','property_type');	
$params = json_decode ( file_get_contents ( "php://input" ) );
$is_parameter_available = is_post_parameters_exists($parameters,$params);

if(!$is_parameter_available)
{
$property = $params->property;
$lat = $params->lat;
$long = $params->long;
$property_type = $params->property_type;

	$result=array();
	 $sql = "select *, (((acos(sin((".$lat."*pi()/180)) * 
            sin((`location_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
            cos((`location_lat`*pi()/180)) * cos(((".$long."- `location_long`)* 
            pi()/180))))*180/pi())*60*1.1515* 1.609344
        )  as distance  from post_add where property_type='$property_type' and property='$property' HAVING distance  <=5 ";

/*$sql = "select *, (((acos(sin((".$lat."*pi()/180)) * 
            sin((`location_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
            cos((`location_lat`*pi()/180)) * cos(((".$long."- `location_long`)* 
            pi()/180))))*180/pi())*60*1.1515* 1.609344
        )  as distance  from post_add where property_type='$property_type' and property='$property' HAVING distance  <=5 ";
*/ $count = mysql_num_rows(mysql_query($sql));

	if($count>0){
	$resp=mysql_query($sql);

	while ($resultss=mysql_fetch_assoc($resp)) {
		

	    $dbimages = explode(",", $resultss['property_image']);
		$resultss['property_image']=URI."/uploads/property_images/$dbimages[0]";
		$result[]=$resultss;

	}

		 //$result['post_id'] = mysql_insert_id(); 
		 $result['status'] = 'success';
		 echo json_encode($result);
		}
		else{
		echo json_encode(array("status" => "O results"));	
		}
}
else
{
	echo json_encode(array("status" => "failed"));
}
		
?>