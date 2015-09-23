<?php
	session_start();
	include("includes/dbutil.php");

		$count = get_row_count_by_condition("convention_post_add","where cnv_upid = '".$_SESSION['cnv_upid']."' and convention_post_id = '".$_REQUEST['post']."'");

		if($count > 0)
		{
			$convention_info = get_row_by_condition("convention_post_add","where cnv_upid = '".$_SESSION['cnv_upid']."' and convention_post_id = '".$_REQUEST['post']."'");	
			if(!empty($convention_info["images"]))
			{
			$images = explode(",",$convention_info["images"]);
			   foreach ($images as $image) {
			    unlink("uploads/convention_images/$image");
			    }
			}
			    //delete_row("tbl_showcase","where showcase_id='$showcase_id' and school_id='$school_id'");
			mysql_query("delete from convention_post_add where cnv_upid = '".$_SESSION['cnv_upid']."' and convention_post_id = '".$_REQUEST['post']."'");
			    echo ("<SCRIPT>		    	
      window.location.href='convention-profile-list.php?message=del';
      </SCRIPT>"); 
			//}
		}
		
	
?>