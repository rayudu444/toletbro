<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);

		extract($_POST);
			$query =mysql_query("select * from  post_add where upid='".$_SESSION['upid']."' and post_id='".$post_id."'");	
	 $count = mysql_num_rows($query);
	if($count>0){
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
		 //update($usrData,'post_add','where post_id='.$_SESSION['last_id'].' and upid='.$_SESSION['upid']);
		 update($usrData,'post_add','where post_id='.$post_id.' and upid='.$_SESSION['upid']);

		 echo ("<SCRIPT LANGUAGE='JavaScript'>

    

    window.location.href='post-add.php?message=1';

    </SCRIPT>");
		 
	}else{
			header("location:post-add.php");
		}
	//header('location:postanadd.php');
?>