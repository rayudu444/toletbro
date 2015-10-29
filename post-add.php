<?php 
  session_start(); 
  include_once('includes/dbutil.php');  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
  /*if(isset($_SESSION['cnv_upid']))
  {
    echo "<script>window.alert('Please LogIn as user....')</script>";
    echo "<script>window.location.href='index.php'</script>";exit;
  }*/
  echo "<script>window.alert('Please LogIn....')</script>";
  echo "<script>window.location.href='index.php'</script>";exit;
}
include_once('includes/property_header.php');

if(isset($_GET['post']))
{
	try{
		$post_id = $_GET['post'];
		$sql = "SELECT `property`,`property_image`,`property_type`,`contact_name`,`contact_mobile`,`contact_email`,`listed_by`,`addres_state`,`addres_city`,`addres_locality`,`address`,`address_next`,`name_project_society` FROM `post_add` WHERE `post_id` = ? ";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_id));
		$post_details = $statement->fetch(PDO::FETCH_ASSOC);
		
		$sql  = "SELECT `city_name` FROM `tbl_city` INNER JOIN `tbl_state` ON `tbl_city`.`state_id` = `tbl_state`.`id` WHERE `tbl_state`.`state_name` = ?";
	 
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_details['addres_state']));
		$cities = $statement->fetchAll(PDO::FETCH_ASSOC);	
		
	}catch(PDOException $e)
	{
		echo $e->getmessage();exit;
	}	
}
?> 

<script type="text/javascript" src="js/fileupload.js"></script>
 <script>
			              $(document).ready(function(){
							
							$("#state").change( function() {
							   var main_cat = $(this).val();
									$.ajax({
									   type: "POST",
									   url: "find_city.php",
									   dataType: 'html',
									   data: { main_cat : main_cat },
									   success: function(data) {
										   
										   $('#cat_data').html(data);
									   }
									});
							});
						 }); 
			                    </script> 
                         
<div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">POST AN AD</p>
    </div>
        	<div class="container">
        	
  <body>         
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Property Info</p>
                               </div>
                                <div class="clearfix"></div>
								
                      <div class="container-post " >
                             <p class="price-p">Property for</p>   
                         <form name="myForm2" method="post"  id="image-upload" class="cont2-form" enctype="multipart/form-data">
                           
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test81"  name="Property_for" value="Rent" <?php echo  (isset($post_details['property']) && $post_details['property'] == "Rent" )? "checked" : ''; ?> />
                                <label for="test81">Rent</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test82"  name="Property_for" value="Sale" <?php echo  (isset($post_details['property']) && $post_details['property'] == "Sale" )? "checked" : '';?> />
                                <label style="float:right;" for="test82">Sale</label>
                                  <div class="clearfix"></div> 
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                        
                 
                               
                               </div>
                    <div class="clearfix"></div>
                </div>

                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Add Image</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                            <?php if(isset($post_details['property_image']))
                            	  {
                            	  	if($post_details['property_image'] != '')
                            	  	{
                            	  	$images = explode(',',trim($post_details['property_image'],','));
                            	  	$inc = 0;
                            	  	
                            	  	foreach ($images as $image)
                            	  	{
                             ?>
                             	<div id='abcd<?= $inc; ?>' class='abcd'>
                            			<img id='previewimg<?= $inc; ?>' src='<?php echo "uploads/property_images/$image"; ?>'/>
                            			<img id='img' data = '<?= $image; ?>' class='delete-exiting-images' src='images/x.png'/>
                            	</div>
                            <?php } } } ?>
                            	
                                <div class="list-box filediv1" >
                                    <input name="file[]" type="file"  id="file" class="input-add" multiple/>
                                </div>
                              
                              
                            <div class="clearfix"></div>   
                           </div>
                           
                            <div class="upload-btns">
                                
                             <!--<div class="browse-buts">
                                <div class="delete-but">
                                    <img src="images/up-but.jpg"/>
                                 </div>
                                 
                                 <div class="delete-but1">
                                    <input type="file" required name="property_img[]" multiple  />
                                 </div>
                                 
                                 <div class="delete-but2">
                                    <input type="file" />
                                 </div>
                              <div class="clearfix"></div> 
                            </div>
                             <div class="clearfix"></div>
                            </div>-->
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                   <div class="clearfix"></div>
                </div>
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Property Type</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="form-1">
                             
                               <select name="property_type">
							   <option value="" hidden>Select</option>

                                <option value="Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Apartments"))? "selected" : ''; ?>>Apartments</option>

                                <option value="Individual houses" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Individual houses"))? "selected" : ''; ?>>Individual houses</option>

                                <!-- <option value="PG/Hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "PG/Hostels"))? "selected" : ''; ?>>PG/Hostels</option> -->
								<optgroup label="PG/Hostels">
                                <option value="Boys hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Boys hostels"))? "selected" : ''; ?>>Boys hostels</option>

                                <option value="Girls hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Girls hostels"))? "selected" : ''; ?>>Girls hostels</option>
                                </optgroup>
                                <optgroup label="Commercial space">
                                <option value="Shops/shutters" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Shops/shutters"))? "selected" : ''; ?>>Shops/shutters</option>

                                <option value="Offices" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Offices"))? "selected" : ''; ?>>Offices</option>
                                </optgroup>
                                <!-- <option value="Commercial space" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Commercial space"))? "selected" : ''; ?>>Commercial space</option> -->
                                <option value="Land & Plot" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Land & Plot"))? "selected" : ''; ?>>Land & Plot</option>
                                <option value="Farm house" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Farm house"))? "selected" : ''; ?>>Farm house</option>
                                <option value="Service Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Service Apartments"))? "selected" : ''; ?>>Service Apartments</option>
                                <option value="Pent house" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Pent house"))? "selected" : ''; ?>>Pent house</option>
                                <optgroup label="Gated community">
                                <option value="Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Apartments"))? "selected" : ''; ?>>Apartments</option>
                                <option value="Individual" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Individual"))? "selected" : ''; ?>>Individual</option>

                                </optgroup>service apartments

                                                                
                              </select>
                              
                              </div>
                              
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Contact Details</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                            <?php $query1= mysql_query("select * from users where upid='".$_SESSION['upid']."'");
                                $user_info=mysql_fetch_array($query1);
                            ?>
                                <div class="input-title"><input type="text" value="<?=$user_info['user_name']?>" id="test1"  placeholder="Full Name" name="name" /></div>
                               <div class="input-title"><input type="text" value="<?=$user_info['user_mobile']?>" id="test1"  placeholder="Mobile" name="mobile" /></div>
                               <div class="input-title"><input type="text" value="<?=$user_info['user_email']?>" id="test1"  placeholder="Email" name="email"/></div>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row" >
                              <div class="col-md-12 div-pad2">
                                  <p>Listed by</p>
                               </div>
                                <div class="clearfix"></div>
                      <div class="container-post">
                       
                        
                           
                            <div class="list-check cont2-form singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test83" value="Landlord" name="listed" <?php echo  (isset($post_details['listed_by']) && $post_details['listed_by'] == "Landlord" )? "checked" : ''; ?>/>
                                <label for="test83">Landlord</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test84" value="Agent" name="listed" <?php echo  (isset($post_details['listed_by']) && $post_details['listed_by'] == "Agent" )? "checked" : ''; ?> />
                                <label style="float:right;" for="test84">Agent</label>
                                  <div class="clearfix"></div> 
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         
                 
                               
                               </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Address</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">

                   <div class="form-1">
                             
                               <!-- <div class="input-title"><input type="text"  placeholder="Country" name="country"  value='<?php echo  @$post_details['country'];?>' /></div> -->
                               <div class="form-1">
                             
                               <select name="country">
                                
                
                                <option value="India" selected>India</option>
                
                                
                              </select>
                              
                              </div>
                              </div>
                        
                            <div class="form-1">
                             
                               <select name="state" id="state">
                                <option value="" hidden>Select State</option>
								<?php $result = get_all_data('tbl_state');
								foreach($result as $resu){?>
                                <option value="<?= $resu['state_name']?>" <?php echo (isset($post_details['addres_state']) && ($resu['state_name'] == $post_details['addres_state']))? "selected" : ''; ?>><?= $resu['state_name'] ?></option>
								<?php } ?>
                                
                              </select>
                              
                              </div>
                              
                              <div class="form-1" id="cat_data" >
                             
                               <select name="city" id="city">
                                <option value="" hidden>Select City</option>
                                <?php if(isset($cities)){
                                	
                                		foreach ($cities as $city)
                                		{ 
                                ?>
                                	 <option value="<?= $city['city_name']?>" <?php echo ( $city['city_name'] == $post_details['addres_city'])? "selected" : ''; ?>><?= $city['city_name'] ?></option>
                                <?php } }?>
                                
                              </select>
                              
                              </div>
                              
                              
                              
                              <div class="form-1">
                             
                               <div class="input-title"><input type="text" id="test1" placeholder="Locality" name="locality"  value='<?php echo  @$post_details['addres_locality'];?>' /></div>
                               
                              </div>
                             <div class="list-check">
                              
                               <div class="input-title"><input type="text" id="test2" placeholder="Address" name="address1"  value='<?php echo  @$post_details['address'];?>' /></div>
<!--                                <div class="input-title"><input type="text" id="test3" placeholder="" name="address2" value='<?php echo  @$post_details['address_next'];?>' /></div>
 -->                            
                            <div class="clearfix"></div>   
                           </div>
                               
                              <div class="form-1">
							  <div class="input-title"><input type="text" id="Society" name="Society" placeholder="Name of Project/Society" value='<?php echo  @$post_details['name_project_society'];?>' /></div>
                             
                              <!-- <select>
                                <option>Name of Project/Society</option>
                                <option> </option>
                                <option> </option>
                              </select>-->
                              
                              </div> 
							  
                   </div>
				   
                        
                    <div class="clearfix"></div>
                </div>
                
                
                
                
                 <div class="nex-but">
                     <input type="button" name="Next" value="Next" id="upload" class="ne-but" />
                    <div class="clear"></div>
                 </div>
				  </form>
                </div>
            </div>
        </div>
        
        <?php include("includes/footer.php");?>
    <!-- custom scrollbar plugin -->
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	
	<script>
		(function($){
			var post_id = '<?php echo (isset($_GET['post']))? $_GET['post'] : ''; ?>';
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"rounded"
				});
				
			});

			//delete existing images
$(document).on("click",".delete-exiting-images",function(){

            var delete_button = $(this);
			var image = $(this).attr('data');
           if(confirm("Do you want delete this image"))

           {

              var file = $(this).attr("data");

              $.ajax({

              url : "delete-existing-images.php",

              type : "POST",

              data : {'post_id' : post_id,"image" : image },

              statusCode : {

                200: function(data){

                  delete_button.parent().remove();

                }

              }
              });

           }
		});

			//images uploading functionailty

		    $('#upload').click(function(e) {
		    	

		    	var other_data = $('form#image-upload').serializeArray();


		    	
		        if (document.myForm2.name.value != "")

		        {
              

		          if (posting_images.length == 0 && post_id == '' && post_id != null)

		          {
                
		              alert("Please upload property image.");

		              e.preventDefault();

		          }else{

		             var data = new FormData();



		             for(var j=0, len=posting_images.length; j<len; j++) {

		                  

		                 data.append("property_img["+j+"]", posting_images[j]); 

		             }

		             data.append('city',$("#city").val());
					 if((post_id != '') && post_id != null)
					 {
						 data.append('post_id',post_id);
             
					 }
		            



		                  $.each(other_data,function(key,input){

		                      data.append(input.name,input.value);

		                  });

		                $("#dialog-background").show();

		                $(".dialog").show();

		               $.ajax({


		                   type: 'POST',

		                   url : 'addpostanadd.php',

		                   data : data,

		                   processData: false,

		                   contentType: false,

		                   statusCode: {

		                      200: function(data) {
		            	   		var response = JSON.parse(data);
		                        if(response.status == 1)

		                        {
		                        	
		                         window.location = "post-add1.php?post="+response.post_id;
		                         

		                        }else{

		                          alert("Error while posting images");

		                        }

		                      },

		                      500: function(){

		                        alert("Error while posting please try again");

		                      }

		                    }



		                 });



		          }   
		        }else{

		          alert("Please enter title");

		          return false;

		        }



		        

		    });

		    
		})(jQuery);
	</script>
</body>
</html>
