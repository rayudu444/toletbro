<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
	
	
	
	$usrData=array(
        'price_monthly'=>$monthly,
    	'price_deposite'=>$deposite,
		'negotiable'=>$Negotiable,
		'maintenance_monthly'=>$maintance_month,
    	'additional_charges'=>$maintance_additional_charge,
		'additional_charges1'=>$maintance_additional_charge1,
    	'plot_area'=>$plot_area,
    	'plot_state'=>$state,
        'door_facing'=>$facing,
		'water_supply'=>$water
    	
    	);
		//print_r($usrData);exit;
		 update($usrData,'post_add','where id='.$_SESSION['last_id'].' and upid='.$_SESSION['upid']);
		 
		 
		header('location:post-add3.php');
?>