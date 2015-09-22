<?php 
  session_start(); 
  include_once('includes/dbutil.php');  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
include_once('includes/header_post_add.php');

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
        	<div class="container">
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
							   <option value="">Select Property type</option>

                                <option value="Residential Properties" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Residential Properties"))? "selected" : ''; ?>>Residential Properties</option>
                                <option value="Commercial Properties" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Commercial Properties"))? "selected" : ''; ?>>Commercial Properties</option>
                                
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
                       
                        
                           
                            <div class="list-check singlecheck">
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
                             
                               <select name="state" id="state">
                                <option value="">Select State</option>
								<?php $result = get_all_data('tbl_state');
								foreach($result as $resu){?>
                                <option value="<?= $resu['state_name']?>" <?php echo (isset($post_details['addres_state']) && ($resu['state_name'] == $post_details['addres_state']))? "selected" : ''; ?>><?= $resu['state_name'] ?></option>
								<?php } ?>
                                
                              </select>
                              
                              </div>
                              
                              <div class="form-1" id="cat_data" >
                             
                               <select name="city" id="city">
                                <option value="">select City</option>
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
                              
                               <div class="input-title"><input type="text" id="test2" placeholder="Adress" name="address1"  value='<?php echo  @$post_details['address'];?>' /></div>
                               <div class="input-title"><input type="text" id="test3" placeholder="" name="address2" value='<?php echo  @$post_details['address_next'];?>' /></div>
                            
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
        
        <div class="main-wrapper">
             <div class="banner-footer">
                 <div class="what-service">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#"><span>Contact Us</span></a>
                    <div class="clear"></div>
                 </div>
             </div>
          </div>
          
          
        <div class="footer-bt">
             <div class="footer">
             	<img src="images/img1.png" class="img1"/>
                 <div class="cont-about">
                    <ul>
                          <li><a href="#"> About Us</a></li>
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">News</a></li>
                          <li><a href="#">Terms</a></li>
                          <li><a href="#">FAQ</a></li>
                    </ul>
                 </div>
                 <div class="adress-maill">
                     <form class="address-mails"  method="post" action="#">
                        <label>
                          <input type="text" name="name" placeholder="User Name">
                        </label>
                        <label>
                          <input type="text" name="email" placeholder="E-mail">
                        </label>
                        <div class="clear"></div>
                        <label>
                          <textarea name="message" placeholder="Message"></textarea>
                        </label>
                         <label>
                          <input type="submit" name="submit" value="Save" style="border:none !important;">
                          <input type="button" value="Clear" class="clear-but">
                          <div class="clear"></div>
                        </label>
                        <div class="clear"></div>
                     </form>
                 </div>
                 <div class="social-media">
                   <div class="cont-btm">
                       <img src="images/map1.png" style="width:18px;">
                       <span>12-6-23/6/4. opp kukatpally depot,<br>moosapet,hyderabad-72</span>
                       <div class="clear"></div>
                    </div>
                      <div class="cont-btm">
                       <img src="images/mail1.png" style="width:24px;">
                       <span style="margin-top:5px;">sisirreddy@yahoo.com</span>
                       <div class="clear"></div>
                    </div>
                    <div class="cont-btm">
                       <img src="images/call1.png" style="width:24px;">
                       <span>+91 8464892222<br>+91 40 23862386</span>
                       <div class="clear"></div>
                    </div> 
                    <ul class="sol-ic">
                       <li><img src="images/fb.png"></li>
                       <li><img src="images/tw.png"></li>
                       <li><img src="images/you.png"></li>
                       <div class="clear"></div>
                    </ul>
                  </div>
               <div class="clear"></div>
             </div>
          </div>
          
          
        <div class="footer-strip">
              <p>2015 Toletbro.All Right Reserved.Terms and Conditions</p>
          </div>
     
    </section>
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
