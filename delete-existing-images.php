<?php
	include_once 'includes/dbutil.php';
	
	if($_POST['post_id'] && $_POST['image'])
	{
		extract($_POST);
		$sql = "SELECT `property_image` FROM `post_add` WHERE `post_id` = ?";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_id));
		$post = $statement->fetch(PDO::FETCH_ASSOC);
	
		$images = explode(",",$post["property_image"]);	
		
		if(($key = array_search($image, $images)) !== false) {
		    unset($images[$key]);
		    unlink("uploads/property_images/$image");
		    $images = implode(',',$images);
		   
		    $sql = "UPDATE `post_add` SET `property_image` = ? WHERE `post_id` = ? ";
		    $statement = $dbh->prepare($sql);
		    $statement->execute(array($images,$post_id));
		    echo 1;
		}
	}else{
		echo 0;
	}
	