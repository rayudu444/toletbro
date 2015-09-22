<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}include_once('includes/header_post_add.php');
?>
        
      
              
                                          
        	<div class="container">
              <div class="container-sub3">
            	
<form method="post" action="addpostanadd2.php">
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Amount</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                        
                            <div class="list-input">
                                 <p class="price-p">Price</p>
                                   <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input"   name="monthly" placeholder="Monthly"/>
                             </div>
                               <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input"  name="deposite" placeholder="Deposite"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                                         
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   
                     
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Negotiable</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         <div class="cont2-form">
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test116" name="Negotiable" value="Yes">
                                <label for="test116">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test117" name="Negotiable" value="No">
                                <label style="float:right;" for="test117">No</label>
                                  </p><div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                         </div>
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Maintenance Charges</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                         
                            <div class="list-input">
                                
                              <!--<div class="input-title" style="margin-top:10px;"><input type="text" id="test1" placeholder="Maintenance Charges"></div>-->
                                <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input"  name="maintance_month" placeholder="Monthly"/>
                             </div>
                               <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input"   name="maintance_additional_charge" placeholder="Price & Other additional Charges" class="cont-inp23"/>
                                
                                <input type="input"   name="maintance_additional_charge1" placeholder="" class="cont-inp23"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                         
                 
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Area</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                                  
                                  <div class="input-title"><input type="text" id="test1" placeholder="Plot Area" name="plot_area" class="cont-inp23"></div>
                               <div class="form-1 form-34">
                             
                               <select name="plot_state" >
                                <option value="">--select--</option>
                                <option value="1">square Feet</option>
								                <option value="2">Square Yards</option>
                               </select>
                              
                              </div>
                                 <div class="clearfix"></div>  
                                 
                            <div class="clearfix"></div>   
                           </div>
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Door Facing</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">

                               <div class="form-1 form-34">
                             
                               <select name="facing">
							   <option value="">--select--</option>
                                <option value="North">North</option>
                                <option value="East">East</option>
								<option value="West">West</option>
                                <option value="South">South</option>
                              </select>
                              
                              </div>
                                 <div class="clearfix"></div>  
                                 
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Water Supply</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check ">
                              <p>
                                <input type="checkbox" id="test131" name="water[]" value="Govt">
                                <label for="test131">Govt</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test132" name="water[]" value="Bore" >
                                <label for="test132">Bore</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test133" name="water[]" value="Water tanker">
                                <label for="test133">Water tanker</label>
                              </p>
                           

                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                 <div class="nex-but">
                      <input type="submit" name="Next" value="Next" class="ne-but" />
                    
                 
				  </form>
                     <a href="post-add1.php" class="bc-but">Back</a>
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
