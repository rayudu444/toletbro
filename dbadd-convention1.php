<?php 
session_start();
include_once('includes/dbutil.php');
	extract($_POST);
	$query =mysql_query("select * from  convention_post_add where cnv_upid='".$_SESSION['cnv_upid']."' and convention_post_id='".$convention_post_id."'");	
	echo $count = mysql_num_rows($query);
	if($count>0){
		$food1 =implode(",", $food);
		$hall_suitable_for1 =implode(",", $hall_suitable_for);
		$technical_equipment1 = implode(",", $technical_equipment);
	$usrData=array('seating_cap_min'=>$seating_cap_min,
        'seating_cap_max'=>$seating_cap_max,
    	'seating_cap_floating'=>$seating_cap_floating,
		'dining_seating_cap'=>$dining_seating_cap,
		'food'=>$food1,
    	'2wheeler_parking_cap'=>$twowheeler_parking_cap,
    	'4wheeler_parking_cap'=>$fourwheeler_parking_cap,
    	'vallet_parking'=>$vallet_parking,
		'hall_suitable_for'=>$hall_suitable_for1,
    	'technical_equipment'=>$technical_equipment1
    	);
		//$pcount=get_row_count_by_condition("convention_post_add","WHERE post_id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
		/*if($pcount == 0){
		 insertdata($usrData,'convention_post_add');
		 $last_id = mysql_insert_id(); 
		}*/
		echo $char=update($usrData,'convention_post_add',"WHERE convention_post_id=".$convention_post_id." and cnv_upid=".$_SESSION['cnv_upid']);
		header("location:convention-post2.php?post=$convention_post_id");
	}
	else{
			header("location:convention-post.php");
		}
?>