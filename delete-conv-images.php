<?php
	include_once 'includes/dbutil.php';
	
	if($_POST['post_id'] && $_POST['image'])
	{
		extract($_POST);
		$sql = "SELECT `images` FROM `convention_post_add` WHERE `convention_post_id` = ?";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_id));
		$post = $statement->fetch(PDO::FETCH_ASSOC);
	
		$images = explode(",",$post["images"]);	
		
		if(($key = array_search($image, $images)) !== false) {
		    unset($images[$key]);
		    unlink("uploads/convention_images/$image");
		    $images = implode(',',$images);
		   
		    $sql = "UPDATE `convention_post_add` SET `images` = ? WHERE `convention_post_id` = ? ";
		    $statement = $dbh->prepare($sql);
		    $statement->execute(array($images,$post_id));
		    echo 1;exit;
		}
	}else{
		echo 0;
	}
	