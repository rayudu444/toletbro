<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
			$query =mysql_query("select * from  post_add where upid='".$_SESSION['upid']."' and post_id='".$post_id."'");	
	echo $count = mysql_num_rows($query);
	if($count>0){
	if(isset($water)){
	$water = implode(',',$water);
	}else{$water=null;}
	
	$usrData=array(
        'price_monthly'=>$monthly,
    	'price_deposite'=>$deposite,
		'negotiable'=>$Negotiable,
		'maintenance_monthly'=>$maintance_month,
    	'additional_charges'=>$maintance_additional_charge,
		'additional_charges1'=>$maintance_additional_charge1,
    	'plot_area'=>$plot_area,
    	'plot_state'=>$plot_state,
        'door_facing'=>$facing,
		'water_supply'=>$water
    	
    	);
		//print_r($usrData);exit;
		 update($usrData,'post_add','where post_id='.$post_id.' and upid='.$_SESSION['upid']);
		 
		 


		header("location:post-add3.php?post=$post_id");
	}else{
			header("location:post-add.php");
		}
?>