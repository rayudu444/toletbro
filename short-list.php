<?php
	include_once "includes/dbutil.php";
	
	extract($_POST);
	
	if($post_id != '' && $user_id != '' && $user_type != '' && $post_type != '')
	{
		$sql = "SELECT count(*) FROM `short_lists` WHERE `post_type`=? AND `post_id`=? AND `user_id` = ? AND `user_type` = ?";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_type,$post_id,$user_id,$user_type));
		$count = $statement->fetchColumn();
		if($count)
		{
			$sql = "DELETE FROM `short_lists`  WHERE `post_type`=? AND `post_id`=? AND `user_id` = ? AND `user_type` = ?";
			$statement = $dbh->prepare($sql);
			if($statement->execute(array($post_type,$post_id,$user_id,$user_type)))
			{
				echo 3;exit;
			}else{
				echo 4;exit;
			}
			
		} else {
			$sql = "INSERT INTO `short_lists` SET `post_type`=?,`post_id`=?,`user_id`=?,`user_type`=?";
			$statement = $dbh->prepare($sql);
			if($statement->execute(array($post_type,$post_id,$user_id,$user_type)))
			{
				echo 1;exit;
			}else{
				echo 2;exit;
			}
		}
				 
	}


