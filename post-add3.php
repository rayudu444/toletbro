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
        
                      
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Pets Allowed</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                             <form action="addpostanadd3.php" method="post" class="cont2-form">     
                         <div class="cont2-form">
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test45" name="pets" value="Yes"/>
                                <label for="test45">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test46" name="pets" value="No" />
                                <label style="float:right;" for="test46">No</label>
                                  <div class="clearfix"></div> 
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         </div>
                 
                               
                               </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>For</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check singlecheck" >
                              <p>
                                <input type="checkbox" id="test47" name="rent_for" value="Family" />
                                <label for="test47">Family</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test48" name="rent_for" value="Bachelor" />
                                <label for="test48">Bachelor</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test49" name="rent_for" value="Any" />
                                <label for="test49">Any</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Amenities</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test50" name="Amenities[]" value="AC"/>
                                <label for="test50">AC</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test51" name="Amenities[]" value="TV" />
                                <label for="test51">TV</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test52" name="Amenities[]" value="Cupboard" />
                                <label for="test52">Cupboard</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test53" name="Amenities[]" value="Bed" />
                                <label for="test53">Bed</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test661" name="Amenities[]" value="Sofa" />
                                <label for="test661">Sofa</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test55" name="Amenities[]" value="Dining table" />
                                <label for="test55">Dining table</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test56" name="Amenities[]" value="Micro wave" />
                                <label for="test56">Micro wave</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test57" name="Amenities[]" value="Fridge" />
                                <label for="test57">Fridge</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test58" name="Amenities[]" value="Stove" />
                                <label for="test58">Stove</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test59" name="Amenities[]" value="Washing machine" />
                                <label for="test59">Washing machine</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test60" name="Amenities[]" value="Servent room" />
                                <label for="test60">Servent room</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test61" name="Amenities[]" value="Securities" />
                                <label for="test61">Securities</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test62" name="Amenities[]" value="Electricity backup" />
                                <label for="test62">Electricity backup</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                  <div class="clearfix"></div>
                  
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Society amenities</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test63" name="SocietyAmenities[]" value="Gym" />
                                <label for="test63">Gym</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test64" name="SocietyAmenities[]" value="Swimming pool" />
                                <label for="test64">Swimming pool</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test65" name="SocietyAmenities[]" value="Lift" />
                                <label for="test65">Lift</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test66" name="SocietyAmenities[]" value="Gas pipeline" />
                                <label for="test66">Gas pipeline </label>
                              </p>
    
                           
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                  
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Description</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post1">
                        
                           <textarea rows="10" cols="10" class="post-textearea" name="pro_description"></textarea>
                        
                   </div>
                    <div class="clearfix"></div>
                    
                   
                </div>
                
                  <div class="nex-but">
                    <input type="submit" name="Next" value="Submit" class="ne-but" />
                    
                 
				  </form>
                     <a  href="post-add2.php" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
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
