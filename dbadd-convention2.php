<?php 
session_start();
include_once('includes/dbutil.php');
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$_SESSION['cnv_upid']."' and convention_post_id='".$convention_post_id."'");	
	$count = mysql_num_rows($query);
	if($count>0){
		$space_available_for1 =implode(",", $space_available_for);
		$other_services1 =implode(",", $other_services);
		$additional_services1 = implode(",", $additional_services);

		$usrData=array('space_available_for'=>$space_available_for1,
        'other_services'=>$other_services1,
    	'additional_services'=>$additional_services1
    	);
		
		update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
		header("location:convention-post3.php?post=$convention_post_id");
	}
		else{
			header("location:convention-post.php");
		}
		
?>