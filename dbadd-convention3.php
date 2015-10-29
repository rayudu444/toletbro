<?php 
session_start();
include_once('includes/dbutil.php');
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$_SESSION['cnv_upid']."' and convention_post_id='".$convention_post_id."'");	
	$count = mysql_num_rows($query);
	$query_info=mysql_fetch_assoc($query);
	
	if($count>0){

		$usrData=array('price_per_plate'=>$price_per_plate,
        'deposite'=>$deposite,
    	'negotiable'=>$negotiable,
    	'other_charges'=>$other_charges,
    	'contact_manager'=>$contact_manager,
    	'description'=>$description,
    	'status'=>2
    	);

    	/*if($query_info['status']==0){
    		
    	}*/
		
		update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
		echo ("<SCRIPT>
		
	    window.location.href='index.php?message=2';

	    </SCRIPT>");//?message=1
	}
		else{
			echo ("<SCRIPT>
		window.alert('Sorry');
	    window.location.href='convention-post.php';

	    </SCRIPT>");
		}
		
		
?>