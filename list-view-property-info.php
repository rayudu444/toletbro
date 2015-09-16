<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
include_once('includes/inner-header.php');
?>
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
                                  <div class="col-sm-4 sider-div">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $dbimg =explode(",", $p_info['property_image']);
                      $count_img = count($dbimg);
                      $x=0;
                      foreach ($dbimg as $dbimg_info) {
                        ?>
                      <div class="item <?php if($x==0){?>active<?php }?>">
                        <img src="uploads/property_images/<?=$dbimg_info?>">
                      </div>  
                      <?php $x++;}
                 ?>
            </div>
        </div> 
    <div class="clearfix">
        <div id="thumbcarousel" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="item active">
                    <?php $y=0;
                    foreach ($dbimg as $dbimg_info) {?>
                    <div data-target="#carousel" data-slide-to="<?=$y?>" class="thumb"><img src="uploads/property_images/<?=$dbimg_info?>"></div>
                    <?php $y++; }?>
                </div><!-- /item -->
            </div><!-- /carousel-inner -->
            <a class="left carousel-control left-arrow" href="#thumbcarousel" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="right carousel-control right-arrow" href="#thumbcarousel" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>
        </div> <!-- /thumbcarousel -->
    </div><!-- /clearfix -->
    </div>
                                   <div class="col-md-7" style="margin-left:5%;">
                                      <div class="room-price">
                                          <div class="unfurnish">
                                              <p>3 BHK, Unfurnished</p>
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
                                                   <span>Location</span>
                                                    <p><?=$p_info['addres_city']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Sublocation </span>
                                                    <p><?=$p_info['addres_city']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Agency</span>
                                                    <p></p>
                                                 </li>
                                                 <li>
                                                   <span>Property Type </span>
                                                    <p><?=$p_info['property_type']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Garages  </span>
                                                    <p></p>
                                                 </li>
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
                                              </ul>
                                          
                                          </div>
                                      </div>
                                     <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Flat Amenities</h5>
                                        <ul class="list-flatani">
                                        <?php 
                                        if($p_info['amenities']!=""){
                                          $amen =explode(",", $p_info['amenities']);
                                          foreach ($amen as $amen_info) {
                                            # code...
                                          }
                                          ?>
                                          <li><?=$amen_info?></li>
                                        <?php
                                         }
                                        ?>
                                          <div class="clearfix"></div>
                                        </ul>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Society Amenities</h5>
                                       
                                        <ul class="list-flatani">
                                          <?php 
                                        if($p_info['society_amenities']!=""){
                                          $amen1 =explode(",", $p_info['society_amenities']);
                                          foreach ($amen1 as $amen_info1) {
                                            # code...
                                          }
                                          ?>
                                          <li><?=$amen_info1?></li>
                                        <?php
                                         }
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