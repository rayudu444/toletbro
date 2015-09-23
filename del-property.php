<?php
	session_start();
	include("includes/dbutil.php");

		$count = get_row_count_by_condition("post_add","where upid = '".$_SESSION['upid']."' and post_id = '".$_REQUEST['post']."'");

		if($count > 0)
		{
			$convention_info = get_row_by_condition("post_add","where upid = '".$_SESSION['upid']."' and post_id = '".$_REQUEST['post']."'");	
			if(!empty($convention_info["property_image"]))
			{
			$images = explode(",",$convention_info["property_image"]);
			   foreach ($images as $image) {
			    unlink("uploads/property_images/$image");
			    }
			}
			    //delete_row("tbl_showcase","where showcase_id='$showcase_id' and school_id='$school_id'");
			mysql_query("delete from post_add where upid = '".$_SESSION['upid']."' and post_id = '".$_REQUEST['post']."'");
			    echo ("<SCRIPT>		    	
      window.location.href='property-profile-list.php?message=del';
      </SCRIPT>"); 
			//}
		}
		
	
?>