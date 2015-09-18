<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('upid','property_for','property_image','img_desc','property_type','contact_name','contact_mobile','contact_email',
        'listed_by','addres_state','addres_city','addres_locality','address','address_next','name_project_society'
    	);	
	extract($_POST);
	$imagescount = count($_FILES);
	
		
    $date=strtotime(date('d-m-Y h:i:s'));
    $errors= array();
	$val=array();
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
	
	
	$usrData=array('upid'=>$_SESSION['upid'],
        'property'=>$Property_for,
    	'property_image'=>$images,
		'img_desc'=>$img_des,
		'property_type'=>$property_type,
    	'contact_name'=>$contact_name,
    	'contact_mobile'=>$contact_mobile,
    	'contact_email'=>$contact_email,
        'listed_by'=>$listed_by,
		'addres_state'=>$addres_state,
    	'addres_city'=>$addres_city,
        'addres_locality'=>$addres_locality,
		'address'=>$address,
		'address_next'=>$address_next,
		'name_project_society'=>$name_project_society
    	);
		$pcount=get_row_count_by_condition("post_add","WHERE post_id=".$_SESSION['last_id']." and upid=".$_SESSION['upid']);
		if($pcount == 0){
		 insertdata($usrData,'post_add');
		 $result['post_id'] = mysql_insert_id(); 
		 $result['status'] = 'success';
		 echo json_encode($result);
		}
		else
		{
			echo json_encode(array("status" => "failed"));
		}
		
?>