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
		$usrData=array('price_per_plate'=>$price_per_plate,
        'deposite'=>$deposite,
    	'negotiable'=>$negotiable,
    	'other_charges'=>$other_charges,
    	'contact_manager'=>$contact_manager,
    	'description'=>$description
    	);
		
		update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
	}
		else{
			//update($usrData,'post_add',"WHERE id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
		}
		//header("location:convention-post.php");
		echo ("<SCRIPT>
		window.alert('Convention Post added successfully');
	    window.location.href='convention-post.php';

	    </SCRIPT>");
?>