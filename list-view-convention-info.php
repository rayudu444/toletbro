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
<!--thumbnile-slider-->
<link href="css1/demo.css" rel="stylesheet" type="text/css" />
 <link href="css1/flexslider.css" rel="stylesheet" type="text/css" />
<script src="js1/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
<!--thumbnile-slider-->

<style type="text/css">
#gmap {
    height:400px;
  width:100%;
}.controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        padding: 0 11px 0 13px;
        width: 300px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
        margin-left: -1px;
        padding-left: 14px;  /* Regular padding-left + 1. */
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
#target {
        width: 345px;
      }
</style>

        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div">
                	<div>
                    	
                        <div class="flats-home">
                           
                           <?php $query= mysql_query("select * from convention_post_add where convention_post_id=".$_REQUEST['convention']); 
                            $count = mysql_num_rows($query);
                            //if($count>0){
                              $p_info = mysql_fetch_array($query);
                            //}
                           ?>
                          <h2>Convention Centre in Hyderabad </h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          
                         
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
               
             <?php $dbimg =explode(",", $p_info['images']);
                      //$count_img = count($dbimg);
                      //$x=0;
                      foreach ($dbimg as $dbimg_info) {
                        ?>
                      <li>
                        <img src="uploads/convention_images/<?=$dbimg_info?>">
                      </li>  
                      <?php //$x++;
                    }
                 ?>
            
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
             <?php $dbimg =explode(",", $p_info['images']);
                      //$count_img = count($dbimg);
                      //$x=0;
                      foreach ($dbimg as $dbimg_info) {
                        ?>
                      <li>
                        <img src="uploads/convention_images/<?=$dbimg_info?>">
                      </li>  
                      <?php //$x++;
                    }
                 ?>
            
          </ul>
        </div>
      </section>
    </div>
    </div>
                                   <div class="col-md-6" style="margin-left:5%;">
                                      <div class="room-price">
                                          <div class="unfurnish">
                                              <p><?=$p_info['title']?></p>
                                              <img src="images/a1.png"/>
                                              <div class="clear"></div>
                                          </div>
                                          <div class="unfurnish-list">
                                              <ul>
                                                 <li>
                                                   <span>Price per plate</span>
                                                   <p><?=$p_info['price_per_plate']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Location</span>
                                                    <p><?=$p_info['locality']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Sublocation </span>
                                                    <p><?=$p_info['city']?></p>
                                                 </li>
                                                 
                                                 <li>
                                                   <span>Convention Type </span>
                                                    <p><?=$p_info['convention_type']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Seating Capacity</span>
                                                    <p><?=$p_info['seating_cap_min']." - ".$p_info['seating_cap_max']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Floating Capacity  </span>
                                                    <p><?=$p_info['seating_cap_floating']?></p>
                                                 </li>
                                                 
                                                 <li>
                                                   <span>Food And Drink </span>
                                                    <p><?=$p_info['food']?></p>
                                                 </li>
                                                 
                                                 <li>
                                                   <span>Hall Ideally suited For  </span>
                                                    <p><?=$p_info['hall_suitable_for']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Technology & Equipment  </span>
                                                    <p><?=$p_info['technical_equipment']?></p>
                                                 </li>

                                                  <li>
                                                   <span>Spaces Available  </span>
                                                    <p><?=$p_info['space_available_for']?></p>
                                                 </li>

                                                  <li>
                                                   <span>other Services  </span>
                                                    <p><?=$p_info['other_services']?></p>
                                                 </li>

                                                  <li>
                                                   <span>Additional Services  </span>
                                                    <p><?=$p_info['additional_services']?></p>
                                                 </li>

                                                  <!-- <li>
                                                   <span>Price per plate</span>
                                                    <p><?=$p_info['price_per_plate']?></p>
                                                 </li> -->

                                                  <li>
                                                   <span>Technology & Equipment  </span>
                                                    <p><?=$p_info['seating_cap_floating']?></p>
                                                 </li>

                                                  <li>
                                                   <span>Deposite Amount  </span>
                                                    <p><?=$p_info['deposite']?></p>
                                                 </li>

                                                 <li>
                                                   <span>Negotiable</span>
                                                    <p><?=$p_info['negotiable']?></p>
                                                 </li>
                                                  <li>
                                                   <span>Price & Other Charges</span>
                                                    <p><?=$p_info['other_charges']?></p>
                                                 </li>


                                              </ul>
                                          
                                          </div>
                                      </div>
                                     <div class="clearfix"></div>
                                     

                                                 <div class="flat-div">
                                        <h5>Parking Capacity</h5>
                                        
                                        
                                          <P>Two wheeler  <?=$p_info['2wheeler_parking_cap']?></p><br>
                                           <p>Four wheeler  <?=$p_info['4wheeler_parking_cap']?></p>
                                        
                                          <div class="clearfix"></div>
                                        
                                      </div>
                                      <div class="flat-div">
                                        <h5>Description</h5>
                                        <ul class="list-flatani">
                                        
                                          <li><?=$p_info['description']?></li>
                                        
                                          <div class="clearfix"></div>
                                        </ul>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="flat-div">
                                         <div class="clearfix"></div>
                                        <a href="#test-popup9<?=$p_info['convention_post_id']?>" class="inline-popups-a"  style="color:#fff; outline:none;"data-effect="mfp-zoom-in"><div class="cont-but cont-but12">
                                              
                                                 <i class="fa fa-phone"></i>
                                                  <h6> Contact</h6>

                                                  <div class="clearfix"></div>
                                             </div></a>
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
<!--                                       <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15228.240037099087!2d78.45813229999999!3d17.40890755!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1439450263006" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen style="position:fixed;"></iframe>
 -->                                  
                                     <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15228.240037099087!2d78.45813229999999!3d17.40890755!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1439450263006" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen style="position:fixed;"></iframe> -->
                                   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
var map;
var marker=false;
function initialize() {
  var myLatlng = new google.maps.LatLng(<?=$p_info['location_lat']?>,<?=$p_info['location_long']?>);
  var markers = [];
  var map = new google.maps.Map(document.getElementById('gmap'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

 
  var myOptions = {
    zoom: 8,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  map = new google.maps.Map(document.getElementById("gmap"), myOptions);
  
  marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        draggable: true
    });
  
  google.maps.event.addListener(map, 'center_changed', function() {
    var location = map.getCenter();

    var address = getaddress(location.lat(),location.lng());

    document.getElementById("lat1").value = location.lat();
    document.getElementById("lon1").value = location.lng();

    placeMarker(location);
  });
   markers.push(marker);
  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));
  
  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(15, 15)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        title: place.name,
        position: place.geometry.location,
        draggable: true
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  auto= document.getElementById('pac-input');
  // [END region_getplaces]
  google.maps.event.addDomListener(auto, 'keydown', function(e) { 
      if (e.keyCode == 13) { 
          e.preventDefault(); 
      }
     
    });

  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });

  google.maps.event.addListener(map, 'zoom_changed', function() {
    zoomLevel = map.getZoom();
  document.getElementById("zoom_level").innerHTML = zoomLevel;
  });
  google.maps.event.addListener(marker, 'dblclick', function() {
    zoomLevel = map.getZoom()+1;
    if (zoomLevel == 21) {
     zoomLevel = 12;
    }    
  document.getElementById("zoom_level").innerHTML = zoomLevel; 
  map.setZoom(zoomLevel);
   
  });

  }
 function getaddress(lat,lng){
                    var geocoder = new google.maps.Geocoder();
                    var latLng = new google.maps.LatLng(lat,lng);
                    geocoder.geocode({       
                                     latLng: latLng     
                                     }, 
                    function(responses) 
                                     {     
                                     if (responses && responses.length > 0) 
                                     {        
                                    document.getElementById('address').value=responses[0].formatted_address;  
                                                 
                                    } 
                                     else 
                                      {       
                                    // alert('Not getting Any address for given latitude and longitude.');     
                                      }   
                                      })   
                       } 
                       
function placeMarker(location) {
  var clickedLocation = new google.maps.LatLng(location);
  marker.setPosition(location);
}
google.maps.event.addDomListener(window, 'load', initialize);
//window.onload = function(){initialize();};

</script>
<div id="gmap"> 
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
               <!--popup code start here-->
                              <div id="test-popup9<?=$p_info['convention_post_id']?>" class="white-popup mfp-with-anim mfp-hide">
            <div class="col-md-12 left-part-12">
                            <div class="col-md-6">  
                                <div class="agent-name">
                                    <p><?=$p_info['contact_person_name']?></p>
                                     <p><? //=$p_info['listed_by']?></p>
                                     <h2><?=$p_info['contact_person_mobile']?></h2>
                                </div>
                             </div>
                             <div class="col-md-6"> 
                                <div class="flat-603">
                                    <h6> Flat id: 602404</h6>
                                    <div class="address-flat">
                                        <h4> 2 BHK , Unfurnished </h4>
                                        <p>Banjara Hills</p>
                                        <span><i class="fa fa-inr"></i>16,000</span>
                                    </div>
                                    <!--div class="report-ready">
                                      <p>Flat already taken</p>
                                       <span>Report</span>
                                        <div class="clearfix"></div>
                                    </div-->
                                </div>
                             </div>
                        </div>
            <div class="col-md-12">
                            <div class="col-md-6">  
                                <div class="agent-form">
                                   <form class="agent-fr">
                                       <label>
                                          <input type="text" placeholder="Name" />
                                       </label>
                                       <label>
                                          <input type="text" placeholder="Mobile" />
                                       </label>
                                       <label>
                                          <input type="text" placeholder="Email" />
                                       </label>
                                       <label>
                                          <input type="submit" placeholder="Email" />
                                       </label>
                                   </form>
                                 </div>
                             </div>
                            <div class="col-md-6">
                               <div class="popup-ban">
                                 <img src="images/pop-banner.png"/>
                               
                               </div>
                            </div>  
                        </div>
                        <div class="clearfix"></div>
              </div><!--popup code end here-->

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
</body>
</html>
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>

