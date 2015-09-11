<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  include_once('includes/header_post_add.php');
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
?>    
 <script>
			              $(document).ready(function(){
							 //alert("hiiiiiiiiiii");
							$("#state").change( function() {
							   var main_cat = $(this).val();
							   //alert(main_cat);exit;
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
                         <form action="addpostanadd.php" method="post" class="cont2-form" enctype="multipart/form-data">
                           
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test81"  name="Property_for" value="Rent"/>
                                <label for="test81">Rent</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test82"  name="Property_for" value="Sale"/>
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
                                <div class="list-box">
                                    
                                    <!--<input type="file"  value="image"/>-->
                                
                                </div>
                              
                               <!-- <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>
                                
                                <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>
                                
                                <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>
                                
                                <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>
                                <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>
                                
                                <div class="list-box1">
                                    
                                    <input type="file"  value="image"/>
                                
                                </div>-->
                            <div class="clearfix"></div>   
                           </div>
                           
                            <div class="upload-btns">
                                <div class="upload-inpt">
                                   <input type="text" placeholder="Your Uploaded Properties" name="img_des" />
                                </div>
                             <div class="browse-buts">
                                <!-- <div class="delete-but">
                                    <img src="images/up-but.jpg"/>
                                 </div>-->
                                 
                                 <div class="delete-but1">
                                    <input type="file" required name="property_img[]" multiple  />
                                 </div>
                                 
                                 <!--<div class="delete-but2">
                                    <input type="file" />
                                 </div>-->
                              <div class="clearfix"></div> 
                            </div>
                             <div class="clearfix"></div>
                            </div>
                        
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
							   <option value="">Property type</option>

                                <option value="Residential Properties">Residential Properties</option>
                                <option value="Commercial Properties">Commercial Properties</option>
                                <option> </option>
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
                                <div class="input-title"><input type="text" id="test1" required placeholder="Full Name" name="name" /></div>
                               <div class="input-title"><input type="text" id="test1" required placeholder="Mobile" name="mobile" /></div>
                               <div class="input-title"><input type="text" id="test1" required placeholder="Email" name="email"/></div>
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
                                <input type="checkbox" id="test83" value="Landlord" name="listed"/>
                                <label for="test83">Landlord</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test84" value="Agent" name="listed" />
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
                                <option value="<?= $resu['state_name']?>"><?= $resu['state_name'] ?></option>
								<?php } ?>
                                
                              </select>
                              
                              </div>
                              
                              <div class="form-1" id="cat_data" >
                             
                               <select name="city" id="city">
                                <option value="">select City</option>
                                
                              </select>
                              
                              </div>
                              
                              
                              
                              <div class="form-1">
                             
                               <div class="input-title"><input type="text" id="test1" placeholder="Locality" name="locality"  /></div>
                               
                                
                             
                              
                              </div>
                             <div class="list-check">
                              
                               <div class="input-title"><input type="text" id="test2" placeholder="Adress" name="address1" /></div>
                               <div class="input-title"><input type="text" id="test3" placeholder="" name="address2" /></div>
                            
                            <div class="clearfix"></div>   
                           </div>
                               
                              <div class="form-1">
							  <div class="input-title"><input type="text" id="Society" name="Society" placeholder="Name of Project/Society" /></div>
                             
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
                     <input type="submit" name="Next" value="Next" class="ne-but" />
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
                     <form class="address-mails" method="post" action="#">
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
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"rounded"
				});
				
			});
		})(jQuery);
	</script>
</body>
</html>
