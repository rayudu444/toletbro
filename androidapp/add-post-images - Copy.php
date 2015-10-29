<?php 
include ('../includes/dbutil.php');
include ('includes/validation.php');
$parameters = array('upid','post_id');	
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0 && isset($_FILES['property_img']))
{
	extract($_POST);
    	if(!empty($_FILES['property_img']['name'])){
		$ran = strtotime('now');
							
	    echo $file_name = $ran.str_replace(" ", "_", $_FILES['property_img']['name']);
		$file_size =$_FILES['property_img']['size'];
		$file_tmp =$_FILES['property_img']['tmp_name'];
		$file_type=$_FILES['property_img']['type'];	
        
		   
		   if($file_size < 5242880)
            {
                  $desired_dir = "../uploads/property_images/";
                  //$desired_dir = 'images/projectimages/2';
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
	
   $image_info =get_row_by_condition("post_add","where post_id=$post_id and upid=$upid");
	if($image_info['property_image']!=""){
		$pro_img=$image_info['property_image'].",".$file_name;
	}else{
		$pro_img=$file_name;
	}
	$usrData=array(
    	'property_image'=>$pro_img		
    	);
	
		
		 update($usrData,'post_add','where post_id='.$post_id.' and upid='.$upid);
		 
		 $result['status'] = 'success';
		 echo json_encode($result);
		}
		else
		{
			echo json_encode(array("status" => "worng"));
		}
		
?>