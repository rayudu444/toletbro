<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('property','lat','long','property_type');	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$result=array();
	 $con=explode(",",$property_type);
	 $con1=implode("','", $con);
	 $property_type = "'".$con1."'";

	 $sql = "select *, (((acos(sin((".$lat."*pi()/180)) * 
            sin((`location_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
            cos((`location_lat`*pi()/180)) * cos(((".$long."- `location_long`)* 
            pi()/180))))*180/pi())*60*1.1515* 1.609344
        )  as distance  from post_add where property_type in ($property_type) and property='$property' and status=2 HAVING distance  <=5 ";

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