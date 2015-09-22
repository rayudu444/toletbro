<?php 
session_start();
include_once('includes/dbutil.php');
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$_SESSION['cnv_upid']."' and convention_post_id='".$convention_post_id."'");	
	$count = mysql_num_rows($query);
	if($count>0){

		$usrData=array('price_per_plate'=>$price_per_plate,
        'deposite'=>$deposite,
    	'negotiable'=>$negotiable,
    	'other_charges'=>$other_charges,
    	'contact_manager'=>$contact_manager,
    	'description'=>$description
    	);
		
		update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
		echo ("<SCRIPT>
		window.alert('Convention Post added successfully');
	    window.location.href='convention-post.php';

	    </SCRIPT>");
	}
		else{
			echo ("<SCRIPT>
		window.alert('Sorry');
	    window.location.href='convention-post.php';

	    </SCRIPT>");
		}
		
		
?>