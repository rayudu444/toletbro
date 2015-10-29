<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);

		
			$query =mysql_query("select * from  post_add where upid='".$_SESSION['upid']."' and post_id='".$post_id."'");	
	 $count = mysql_num_rows($query);
	if($count>0){
		
	$usrData=array(
        'pets_allowed'=>$pets,
    	'property_for'=>$rent_for,
    	'description'=>$pro_description,
    	'status'=>2    	
    	);

	$usrData1=array(
        'ac'=>$ac, 'tv'=>$tv, 'cupboard'=>$cupboard, 'sofa'=>$sofa, 'bed'=>$bed,'microwave'=>$microwave,
         'waching_machine'=>$waching_machine, 'dining_table'=>$dining_table, 'fridge'=>$fridge, 'stove'=>$stove,
          'servent_room'=>$servent_room, 'security'=>$security, 'electricity_backup'=>$electricity_backup, 
          'pooja_room'=>$pooja_room, 'store_room'=>$store_room,  
         'gym'=>$gym, 'swimming_pool'=>$swimming_pool, 'lift'=>$lift, 'gas_pipeline'=>$gas_pipeline   	
    	);

	$query1 =mysql_query("select * from  post_add_amenties where upid='".$_SESSION['upid']."' and post_id='".$post_id."'");	
 	 $count1 = mysql_num_rows($query1);
	if($count1>0)
	{
		update($usrData1,'post_add_amenties','where post_id='.$post_id.' and upid='.$_SESSION['upid']);	
	}
	else
	{
		$usrData1['post_id'] = $post_id;
		$usrData1['upid'] = $_SESSION['upid'];
		insertdata($usrData1,"post_add_amenties");
	}


	 update($usrData,'post_add','where post_id='.$post_id.' and upid='.$_SESSION['upid']);

		 echo ("<SCRIPT LANGUAGE='JavaScript'>

  

    window.location.href='index.php?message=1';

    </SCRIPT>");
		 
	}else{
			header("location:post-add.php");
		}
	
?>