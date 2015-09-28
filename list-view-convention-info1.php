<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  /*if (!isset($_SESSION['cnv_upid']) || $_SESSION['cnv_upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}*/
include_once('includes/inner-header.php');
?>
<script src="js1/jquery-ui1.js"></script>
   <link rel="stylesheet" href="css/jquery-ui.css">

        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	 <div class="list-uls">
                        	<form>
                        	<ul class="list3">
                            	<li>Refine Results</li>
                                <li>
                                	<select class="refine1">
                                    	<option>Date</option>
                                        <option>12</option>
                                        <option>12</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>Price List</option>
                                        <option>1,00,000</option>
                                        <option>2,00,000</option>
                                        <option>3,00,000</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine3">
                                    	<option>Seating Capacity</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine3">
                                    	<option>Hall Ideally Suited For</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                               
                                <li>
                                	<a class="reset">Reset
                                    <i class="fa fa-undo"></i>
                                    </a>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                                
                            </form>
                        </div>
<?php $query= mysql_query("select * from convention_post_add where convention_post_id=".$_REQUEST['convention']); 
                            $count = mysql_num_rows($query);
                            //if($count>0){
                              $p_info = mysql_fetch_array($query);
                            //}
                           ?>
                            <ul class="filter-ul">
                            	<li><a>Map</a></li>
                                <li><a>List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="flats-home">
                           <ul>
                             <li>Home/</li>
                             <li>Rent/</li>
                             <li>Hyderabad/</li>
                             <li>Jubilee Hills</li>
                              <div class="clearfix"></div>
                           </ul>
                          <h2>Convention Centres in Hyderabad </h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          <h6>6 flats found. <span style="color:#f2635d;">Include nearby flats</span></h6>
                          <ul class="date-add">
                            <li>Sort by: <span style="color:#f2635d;">Relevance</span> </li>    
                            <li>Date Added (Recent First)</li>  
                            <li>Price: Low High</li>
                            <li><i class="fa fa-heart-o" style="margin-right:2px;"></i>0 Shortlisted Properties </li>
                            
                          </ul>
                         <div class="clear"></div>
                        </div>
                        <div class="container-fluid"> 
                             <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12" style="padding:0px;">
                                  <div class="col-sm-6 sider-div">
                                       <div class="image-side">
                                              <img src="images/banner-fit.png">
                                       </div>
                                   </div><!-- /clearfix -->
                                  <div class="col-md-6">
                                      <div class="visiable-cal">
                                          <div class="mrng-but">
                                             <a>Morning</a>
                                             <a>Evening</a>
                                             <div class="clearfix"></div>
                                          </div>
                                          <div class="date-pick3">
                                           <div id="datepicker"></div>
											 <script>
                                            $( "#datepicker" ).datepicker();
                                            </script>
                                        </div>
                                            <div class="send-div">
                                               <a>Send query</a>
                                               <span>Contact</span>
                                            </div>
                                        </div>
                                   </div>
                              </div>
                                   
                               </div>  
                            
                        	<div class="clearfix"></div>	
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                                     <div class="bhk-un">
                                        <div class="cont-bhk">
                                        <h1><?=$p_info['title']?></h1>
                                        <i class="fa fa-heart-o"></i>
                                        <div class="clear"></div>
                                        </div>
                                     </div>
                                     <div class="apx-price">
                                       <ul>
                                          <li>
                                            <p>Appx Price</p>
                                            <span>Rs  <?=$p_info['price_per_plate']?> Per Head</span>
                                          </li>
                                          <li>
                                            <p> Location </p>
                                            <span> <?=$p_info['location']?></span>
                                          </li>
                                          <li>
                                            <p>Capacity </p>
                                            <span>20-250 Max</span>
                                          </li>
                                       </ul>
                                     
                                     </div>
                          </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                         
                        </div>
                         <div class="container-fluid"> 
                            <div class="row">
                               <ul class="nav-contab">
                                  <li class="active"><a data-toggle="tab" href="#home" >Overview</a></li>
                                  <li><a data-toggle="tab" href="#menu1" >Facilities</a></li>
                                   <div class="clearfix"></div>
                                </ul>
                                  <div class="clearfix"></div>
                                <div class="tab-content">
                                  <div id="home" class="tab-pane fade in active">
                                     <div class="map-div">
                                      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15228.240037099087!2d78.45813229999999!3d17.40890755!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1439450263006" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen style="position:fixed;"></iframe>
                                   
                                   </div>
                                  
                                  </div>
                                  <div id="menu1" class="tab-pane fade">
                                      <div class="container-fluid">
                                           <div class="row">
                                              <div class="col-md-12 mob-pad">
                                                <div class="col-md-6 sty-padding">
                                                    <div class="seating">
                                                    <h2>Seating Capacity</h2>
                                                        <ul>
                                                           <li>
                                                             <p>Minimum</p>
                                                             <span>:200</span>
                                                           </li>
                                                           <li>
                                                             <p>Maximum</p>
                                                             <span>:500</span>
                                                           </li>
                                                           <li>
                                                             <p>Floating</p>
                                                             <span>:800</span>
                                                           </li>
                                                           <li>
                                                             <p>Dining Capacity</p>
                                                             <span>:1000</span>
                                                           </li>
                                                           <div class="clearfix"></div>
                                                        </ul>
                                                      <div class="clearfix"></div>
                                                    </div>
                                                    
                                                    

                                                </div>
                                                 <div class="col-md-6 mob-pad">
                                                    <div  class="food-drink mob-pad">
                                                           <h2>Food and Drinks</h2>
                                                           <ul>
                                                             <li style="color:#f2635d;">Veg </li>
                                                              <li style="color:#f2635d;">Non-Veg</li>
                                                              <li>Alocohol</li>
                                                              <li>Self Cooking</li>
                                                              <li>Outside Catering </li>
                                                                <div class="clearfix"></div>
                                                           </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                              </div>
                                           </div>
                                           
                                           <div class="row">
                                              <div class="col-md-12 mob-pad">
                                                <div class="col-md-6 sty-padding">
                                                    <div class="seating">
                                                         <h2>Parking Capacity</h2>
                                                       <form>
                                                          <div class="parking">
                                                             <p>Two Wheeler</p>
                                                              <input type="text" placeholder="" />
                                                             <p>Apprex</p>
                                                             <div class="clearfix"></div>
                                                          </div>
                                                           <div class="parking">
                                                             <p>Four Wheeler</p>
                                                              <input type="text" placeholder="" />
                                                             <p>Apprex</p>
                                                             <div class="clearfix"></div>
                                                          </div>
                                                           <div class="parking">
                                                             <p>Valet Parking </p>
                                                              <input type="text" placeholder="" />
                                                            
                                                             <div class="clearfix"></div>
                                                          </div>
                                                       
                                                       </form>
                                                      <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 sty-padding">
                                                   <div  class="food-drink">
                                                           <h2>Hall Ideally suited For</h2>
                                                           <ul>
                                                             <li>Wedding </li>
                                                              <li> Receptions </li>
                                                              <li>Engagement</li>
                                                              <li  style="color:#f2635d;">Birthday </li>
                                                              <li> Anniversary </li>
                                                              <li>Corporate events</li> 
                                                              <li>  Get together  </li>
                                                              <li> Business purpose </li>
                                                              <li> Bachelor party </li>
                                                              <li>Conference</li>
                                                              <li> Naming ceremonies </li>
                                                              <li>Others  </li>
                                                               <div class="clearfix"></div>
                                                           </ul>
                                                           <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                              </div>
                                           </div>
                                           
                                           <div class="row">
                                              <div class="col-md-12 mob-pad">
                                                <div class="col-md-6 sty-padding">
                                                    <div class="seating">
                                                         <h2>Technology & Equipment</h2>
                                                       <ul>
                                                           <li style="color:#f2635d;">
                                                             Power Backup / Generator 
                                                            
                                                           </li>
                                                           <li style="color:#f2635d;">
                                                             Projector
                                                      
                                                           </li>
                                                           <li style="color:#f2635d;">
                                                             Internet & Wi-Fi
                                                       
                                                           </li>
                                                           <li>
                                                            Internet & Wi-Fi
                                                     
                                                           </li>
                                                            <li>
                                                              Mike
                                                     
                                                           </li>
                                                          
                                                           <div class="clearfix"></div>
                                                        </ul>
                                                      <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 sty-padding">
                                                   <div  class="food-drink">
                                                           <h2>Hall Ideally suited For</h2>
                                                           <ul>
                                                             <li>Wedding </li>
                                                              <li> Receptions </li>
                                                              <li>Engagement</li>
                                                              <li  style="color:#f2635d;">Birthday </li>
                                                              <li> Anniversary </li>
                                                              <li>Corporate events</li> 
                                                              <li>  Get together  </li>
                                                              <li> Business purpose </li>
                                                              <li> Bachelor party </li>
                                                              <li>Conference</li>
                                                              <li> Naming ceremonies </li>
                                                              <li>Others  </li>
                                                               <div class="clearfix"></div>
                                                           </ul>
                                                           <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                              </div>
                                           </div>
                                           
                                           <div class="row">
                                              <div class="col-md-12 mob-pad">
                                                 <div class="col-md-6 sty-padding">
                                                   <div  class="food-drink food-drink3">
                                                           <h2>Additional Services</h2>
                                                           <ul>
                                                             <li>Wedding </li>
                                                              <li> Receptions </li>
                                                              <li>Engagement</li>
                                                              <li  style="color:#f2635d;">Birthday </li>
                                                              <li> Anniversary </li>
                                                              <li>Corporate events</li> 
                                                              <li>  Get together  </li>
                                                              <li> Business purpose </li>
                                                              <li> Bachelor party </li>
                                                              <li>Conference</li>
                                                              <li> Naming ceremonies </li>
                                                              <li>Others  </li>
                                                               <div class="clearfix"></div>
                                                           </ul>
                                                           <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                              </div>
                                           </div>
                                       </div>
                                  </div>
                                  
                                </div>
                            </div>
                            <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12 div-pad">
                                  <p style="border-bottom:1px solid #f2635d;">About Convention Center</p>
                                <span class="des-spa">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut elementum risus, ut auctor nisl. Donec a euismod mi. Ut accumsan, enim nec luctus ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut elementum risus, ut auctor nisl. Donec a euismod mi. Ut accumsan, enim nec luctus ullamcorper.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut elementum risus, ut auctor nisl. Donec a euismod mi.
                               </span>
                               <div class="clearfix"></div>
                            <p style="border-bottom:1px solid #f2635d;">Share this venue</p>
                            
                               <div class="social-icons">
                                    <a ><i class="fa fa-facebook"></i></a>
                                    <a><i classs="fa fa-twitter"></i></a>
                                    <div class="clear"></div>
                               </div>
                               </div>  
                               
                        	<div class="clearfix"></div>
                           	
                        </div>
                        </div>
                        
                           
                         </div>

                    </div>
                    
                </div>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
     
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
<!------login-popup--------->
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index.js"></script>
<!------login-popup--------->

</body>
</html>
