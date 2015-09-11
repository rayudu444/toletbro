<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
	//print_r($_POST);exit;
	
	if(isset($Amenities)){
	$amenities = implode(',',$Amenities);
	}else{$amenities=null;}
	if (isset($SocietyAmenities)) 
	{
	$socialamenities = implode(',',$SocietyAmenities);
	}else{$socialamenities=null;}
		
	$usrData=array(
        'pets_allowed'=>$pets,
    	'property_for'=>$rent_for,
		'amenities'=>$amenities,
		'society_amenities'=>$socialamenities,
    	'description'=>$pro_description
    	
    	);
		//print_r($usrData);exit;
		 update($usrData,'post_add','where id='.$_SESSION['last_id'].' and upid='.$_SESSION['upid']);
		 unset($_SESSION['last_id']);
		 echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.alert('You are successfully post an add.. ')

    window.location.href='post-add.php';

    </SCRIPT>");
		 
		//header('location:postanadd.php');
?>