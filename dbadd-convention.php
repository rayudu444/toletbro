<?php 
session_start();
include_once('includes/dbutil.php');
	
	extract($_POST);
	$imagescount = count($_FILES);
	
	
   $errors= array();
	$val=array();
	if(isset($_FILES['images']))
	{
		foreach($_FILES['images']['tmp_name'] as $key => $tmp_name ){
	    	if(!empty($_FILES['images']['name'][$key])){
			$ran = strtotime(date('d-m-Y h:i:s'));
								
		    $file_name = $ran.str_replace(" ", "_", $_FILES['images']['name'][$key]);
			$file_size =$_FILES['images']['size'][$key];
			$file_tmp =$_FILES['images']['tmp_name'][$key];
			$file_type=$_FILES['images']['type'][$key];	
	        
			   
			   if($file_size < 5242880)
	            {
	                  $desired_dir = "uploads/convention_images/";
	                  //$desired_dir = 'images/projectimages/2';
	                  if(is_dir($desired_dir)==false){
	
	                     mkdir("$desired_dir", 0700);    
	                  }
					  /*if(is_dir("$desired_dir/".$file_name)==false){
	                  move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
	                 }else{         // rename the file if another one exist
	                 $new_dir="$desired_dir/".$file_name.time();
	                 rename($file_tmp,$new_dir) ;    
	                }*/
					  move_uploaded_file($file_tmp,"$desired_dir".$file_name);
					  $val[]=$file_name;
					
				}
				else{
	              $msg = "<div class='errordiv'>Please Upload image less than .</div>";
	            }
			   
			   
		}
		}
		$images=implode(",",$val);
	}
	
	$isSuccess = 0;
	$usrData=array(
		'cnv_upid'=>$_SESSION['cnv_upid'],
        'title'=>$title,
		'convention_type'=>$convention_type,
    	'contact_person_name'=>$contact_person_name,
    	'contact_person_mobile'=>$contact_person_mobile,
    	'contact_person_email'=>$contact_person_email,
		'state'=>$state,
    	'city'=>$city,
        'locality'=>$locality,
		'address'=>$address,
		'location_lat'=>$latitude,
		'location_long'=>$longitude
    	);
    	
    	if(isset($images))
    	{
    		$usrData['images'] = $images;
    	}
		
		if(!isset($_POST['post_id'])){
		 insertdata($usrData,'convention_post_add');
		 $post_id = mysql_insert_id(); 
		 ++$isSuccess;
		}
		else{
			//update($usrData,'post_add',"WHERE id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
			unset($usrData['cnv_upid']);
			$usrData['convention_post_id'] = $post_id;
			
			$usrData['images'] = (isset($images))? ','.$usrData['images'] :'' ;
			$sql = "UPDATE `convention_post_add` SET `title`=:title,`images`=concat(images,:images),`convention_type`=:convention_type,`contact_person_name`=:contact_person_name,`contact_person_mobile`=:contact_person_mobile,`contact_person_email`=:contact_person_email,`state`=:state,`city`=:city,`locality`=:locality,`address`=:address,`location_lat`=:location_lat,`location_long`=:location_long  WHERE  `convention_post_id` = :convention_post_id";
			$statement = $dbh->prepare($sql);
			$statement->execute($usrData);
			$post_id = $_POST['post_id'];
			 ++$isSuccess;
		}
		
		$result['status'] = $isSuccess;
		$result['post_id'] = $post_id;
		echo json_encode($result);
		
?>