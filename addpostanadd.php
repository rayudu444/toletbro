<?php 
session_start();
include_once('includes/dbutil.php');

	extract($_POST);
	
	$imagescount = count($_FILES);
	
		
    $date=strtotime(date('d-m-Y h:i:s'));
    $errors= array();
	$val=array();
	if(isset($_FILES['property_img']))
	{
		foreach($_FILES['property_img']['tmp_name'] as $key => $tmp_name ){
    	if(!empty($_FILES['property_img']['name'][$key])){
		$ran = strtotime(date('d-m-Y h:i:s'));
							
	    $file_name = $ran.str_replace(" ", "_", $_FILES['property_img']['name'][$key]);
		$file_size =$_FILES['property_img']['size'][$key];
		$file_tmp =$_FILES['property_img']['tmp_name'][$key];
		$file_type=$_FILES['property_img']['type'][$key];	
        
		   
		   if($file_size < 5242880)
            {
                  $desired_dir = "uploads/property_images/";
	                  if(is_dir($desired_dir)==false){
	
	                     mkdir("$desired_dir", 0700);    
	                  }
					  
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
	
	$usrData=array(
		'upid'=>$_SESSION['upid'],
        'property'=>$Property_for,
		'property_type'=>$property_type,
    	'contact_name'=>$name,
    	'contact_mobile'=>$mobile,
    	'contact_email'=>$email,
        'listed_by'=>$listed,
		'addres_state'=>$state,
    	'addres_city'=>$city,
        'addres_locality'=>$locality,
		'address'=>$address1,
		'address_next'=>$address2,
		'name_project_society'=>$Society
    	);
    	if(isset($images))
    	{
    		$usrData['property_image'] = $images;
    	}
    	
		/*$pcount=get_row_count_by_condition("post_add","WHERE post_id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);*/
		$issuccess = 0;
		
		if(!isset($_POST['post_id'])){
		 insertdata($usrData,'post_add');
		 $post_id = mysql_insert_id(); 
		 ++$issuccess;
		}
		else{
			//update($usrData,'post_add',"WHERE id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
			unset($usrData['upid']);
			$usrData['post_id'] = $post_id;
			
			$usrData['property_image'] = (isset($images))? ','.$usrData['property_image'] :'' ;
			$sql = "UPDATE `post_add` SET `property`=:property,`property_image`=concat(property_image,:property_image),`property_type`=:property_type,`contact_name`=:contact_name,`contact_mobile`=:contact_mobile,`contact_email`=:contact_email,`listed_by`=:listed_by,`addres_state`=:addres_state,`addres_city`=:addres_city,`addres_locality`=:addres_locality,`address`=:address,`address_next`=:address_next,`name_project_society`=:name_project_society WHERE  `post_id` = :post_id";
			$statement = $dbh->prepare($sql);
			$statement->execute($usrData);
			$post_id = $_POST['post_id'];
			 ++$issuccess;
		}
		$result['status'] = $issuccess;
		$result['post_id'] = $post_id;
		echo json_encode($result);
?>