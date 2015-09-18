<?php 
session_start();
include_once('includes/dbutil.php');

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
		//print_r($usrData);exit;
		 update($usrData,'post_add','where post_id='.$_SESSION['last_id'].' and upid='.$_SESSION['upid']);
		 
		 
		header('location:post-add2.php');
?>