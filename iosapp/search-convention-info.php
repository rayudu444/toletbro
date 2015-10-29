<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('convention_post_id');	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
	extract($_POST);
	$result=array();
	 $sql = "select * from convention_post_add where convention_post_id='$convention_post_id'";
 $count = mysql_num_rows(mysql_query($sql));

	if($count>0){
	$resp=mysql_query($sql);
	$result[]=mysql_fetch_assoc($resp);
	/*while ($resultss=mysql_fetch_assoc($resp)) {
		$result[]=$resultss;
	}*/

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