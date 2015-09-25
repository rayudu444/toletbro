<?php 
  session_start(); 
  include_once('includes/dbutil.php');

include_once('includes/inner-header.php');
?>
<!--thumbnile-slider-->
<link href="css1/demo.css" rel="stylesheet" type="text/css" />
 <link href="css1/flexslider.css" rel="stylesheet" type="text/css" />
<script src="js1/modernizr.js" type="text/javascript"></script>
<!--thumbnile-slider-->
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
                                    	<option>1 BHK</option>
                                        <option>2 BHK</option>
                                        <option>3 BHK</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine1">
                                    	<option>1 BHK</option>
                                        <option>2 BHK</option>
                                        <option>3 BHK</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>BUDGET</option>
                                        <option>1,00,000</option>
                                        <option>2,00,000</option>
                                        <option>3,00,000</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>Lease Type</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>Listed By</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine1">
                                    	<option>More</option>
                                        <option>Generator</option>
                                        <option>Generator</option>
                                        <option>Generator</option>
                                    </select>
                                </li>
                                <li>
                                	Reset
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                                
                            </form>
                        </div>
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
                           <?php $query= mysql_query("select * from post_add where post_id=".$_REQUEST['property']); 
                            $count = mysql_num_rows($query);
                            //if($count>0){
                              $p_info = mysql_fetch_array($query);
                            //}
                           ?>
                          <h2>Flats for Rent in Jubilee Hills </h2>
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
                                  




<div class="col-sm-5 sider-div">
	

                                       <div id="main" role="main">
      <section class="slider">
        <div id="slider" class="flexslider">
          <ul class="slides">
               
             
                 <?php $dbimg =explode(",", $p_info['property_image']);
                      $count_img = count($dbimg);
                      
                      foreach ($dbimg as $dbimg_info) {
                        ?>
                      <!-- <div class="item <?php if($x==0){?>active<?php }?>"> -->
                      <li>
                        <img src="uploads/property_images/<?=$dbimg_info?>">
                        </li>
                      <!-- </div> -->  
                      <?php }
                 ?>
            
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
             <?php $dbimg =explode(",", $p_info['property_image']);
                      $count_img = count($dbimg);
                      
                      foreach ($dbimg as $dbimg_info) {
                        ?>
                      <!-- <div class="item <?php if($x==0){?>active<?php }?>"> -->
                      <li>
                        <img src="uploads/property_images/<?=$dbimg_info?>">
                        </li>
                      <!-- </div> -->  
                      <?php }
                 ?>
            
          </ul>
        </div>
      </section>
    </div>
    
</div>


                                   <div class="col-md-6" style="margin-left:5%;">
                                      <div class="room-price">
                                          <div class="unfurnish">
                                              <p><?=$p_info['bedrooms']?>BHK <?=$p_info['property_furnished_status']?></p>
                                              <img src="images/a1.png"/>
                                              <div class="clear"></div>
                                          </div>
                                          <div class="unfurnish-list">
                                              <ul>
                                                 <li>
                                                   <span>Price</span>
                                                   <p><?=$p_info['price_monthly']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Negotiable</span>
                                                   <p><?=$p_info['negotiable']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Deposite</span>
                                                   <p><?=$p_info['price_deposite']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Maintenance Charges</span>
                                                   <p><?=$p_info['maintenance_monthly']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Location</span>
                                                    <p><?=$p_info['addres_city']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Address </span>
                                                    <p><?=$p_info['address']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Agency</span>
                                                    <p></p>
                                                 </li> -->
                                                 <li>
                                                   <span>Property Type </span>
                                                    <p><?=$p_info['property_type']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Garages  </span>
                                                    <p></p>
                                                 </li> -->
                                                 <li>
                                                   <span>Beds</span>
                                                    <p><?=$p_info['bedrooms']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Baths </span>
                                                    <p><?=$p_info['bathrooms']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Balconies</span>
                                                    <p><?=$p_info['balconies']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Price</span>
                                                   <p><?=$p_info['price_monthly']?></p>
                                                 </li> -->
                                                 <li>
                                                   <span>2 Wheeler parking</span>
                                                   <p><?=$p_info['parking_2wheeler']?></p>
                                                 </li>
                                                 <li>
                                                   <span>4 Wheeler parking</span>
                                                   <p><?=$p_info['parking_4wheeler']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Furnished Status</span>
                                                   <p><?=$p_info['property_furnished_status']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Floor Number</span>
                                                   <p><?=$p_info['floore_no']?></p>
                                                 </li>
                                              </ul>
                                          
                                          </div>
                                      </div>
                                     <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Flat Amenities</h5>
                                        <ul class="list-flatani">
                                        <?php echo $p_info['amenities'];
                                        /*if($p_info['amenities']!=""){
                                          $amen =explode(",", $p_info['amenities']);
                                          foreach ($amen as $amen_info) {
                                            # code...
                                          }
                                          ?>
                                          <li><?=$amen_info?></li>
                                        <?php
                                         }*/
                                        ?>
                                          <div class="clearfix"></div>
                                        </ul>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Society Amenities</h5>
                                       
                                        <ul class="list-flatani">
                                          <?php echo $p_info['society_amenities'];
                                        /*if($p_info['society_amenities']!=""){
                                          $amen1 =explode(",", $p_info['society_amenities']);
                                          foreach ($amen1 as $amen_info1) {
                                            # code...
                                          }
                                          ?>
                                          <li><?=$amen_info1?></li>
                                        <?php
                                         }*/
                                        ?>
                                          <div class="clearfix"></div>
                                        </ul>
                                         <div class="clearfix"></div>
                                        <div class="cont-but cont-but12">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6>Contact Agent</h6>
                                                  <div class="clearfix"></div>
                                             </div>
                                      </div>
                                   </div>
                               </div>  
                            
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                         
                        </div>
                        
                        <div class="container-fluid"> 
                        
                         <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12 div-pad">
                                  <p>Position on Map</p>
                                   
                               </div>  
                            
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                           <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12 div-pad">
                                  <div class="map-div">
                                      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15228.240037099087!2d78.45813229999999!3d17.40890755!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1439450263006" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen style="position:fixed;"></iframe>
                                   
                                   </div>
                               </div>  
                            
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                         <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12 div-pad">
                                  <p>Description</p>
                                <span class="des-spa">
                                 <?=$p_info['description']?>
                               </span>
                               </div>  
                            <div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                             <div class="row">
	                        <div class="results-list1">
                               <div class="col-md-12 div-pad" style="border-bottom:1px solid #919090;">
                                  <p>Download our app</p>
                                   <div class="app-divimg">
                                      <div class="and-img"><img src="images/android.png"/></div>
                                      <div class="and-img"><img src="images/apple.png"/></div>
                                      <div class="clearfix"></div>
                                   </div>
                               </div>  
                               
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                             <div class="clear-60"></div>
                        </div>
                    </div>
                    
                </div>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>        
        <div class="clearfix"></div>
        <div>
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

<!--thumbnile-slider-->
   <script src="js1/jquery-1.7.1.js" type="text/javascript"></script>
    <script src="js1/jquery.flexslider.js" type="text/javascript"></script>
  
    <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        itemWidth:150,
        itemMargin: 5,
    auto:true,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<!--thumbnile-slider-->
