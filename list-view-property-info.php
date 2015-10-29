<?php 
  session_start(); 
  include_once('includes/dbutil.php');

include_once('includes/inner-header.php');
?>
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
<!--thumbnile-slider-->
<link href="css1/demo.css" rel="stylesheet" type="text/css" />
 <link href="css1/flexslider.css" rel="stylesheet" type="text/css" />
<script src="js1/modernizr.js" type="text/javascript"></script>
<!--thumbnile-slider-->
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>

        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div">
                	<div>
                    	
                        <div class="flats-home">
                           
                           <?php $query= mysql_query("select * from post_add INNER JOIN post_add_amenties pa on pa.post_id=post_add.post_id where post_add.post_id=".$_REQUEST['property']); 
                            $count = mysql_num_rows($query);
                            //if($count>0){
                              $p_info = mysql_fetch_array($query);
                            //}
                           ?>
                          <h2>Flats for Rent in Jubilee Hills </h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          <!-- <h6>6 flats found. <span style="color:#f2635d;">Include nearby flats</span></h6> -->
                          <ul class="date-add">
                            <!-- <li>Sort by: <span style="color:#f2635d;">Relevance</span> </li>    
                            <li>Date Added (Recent First)</li>  
                            <li>Price: Low High</li> -->
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
                                              <p><?=@$p_info['bedrooms']?>BHK, <?=$p_info['property_furnished_status']."".$p_info['property_type']?></p>
                                              <img src="images/a1.png"/>
                                              <div class="clear"></div>
                                          </div>
                                          <div class="unfurnish-list">
                                              <ul>
                                                 <li>
                                                   <span>Price</span>
                                                   <p><?=@$p_info['price_monthly']."/".$p_info['price_type']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Negotiable</span>
                                                   <p><?=@$p_info['negotiable']?></p>
                                                 </li> -->
                                                 <li>
                                                   <span>Deposite</span>
                                                   <p><?=@$p_info['price_deposite']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Area</span>
                                                   <p><?=@$p_info['area']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Maintenance Charges</span>
                                                   <p><?=@$p_info['maintenance_monthly']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Location</span>
                                                    <p><?=@$p_info['addres_city']?></p>
                                                 </li> -->
                                                 <li>
                                                   <span>Address </span>
                                                    <p><?php echo @$p_info['address_state'].", ".$p_info['addres_locality'].", ".$p_info['addres_city'];?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Agency</span>
                                                    <p></p>
                                                 </li> -->
                                                 
                                                 <!-- <li>
                                                   <span>Garages  </span>
                                                    <p></p>
                                                 </li> -->
                                                 <li>
                                                   <span>Facing</span>
                                                    <p><?=@$p_info['door_facing']?></p>
                                                 </li>
                                                
                                                 <li>
                                                   <span>Balconies</span>
                                                    <p><?=$p_info['balconies']?></p>
                                                 </li>
                                                 <!-- <li>
                                                   <span>Price</span>
                                                   <p><?=@$p_info['price_monthly']?></p>
                                                 </li> -->
                                                 <li>
                                                   <span>parking Availability</span>
                                                   <p><?=@$p_info['parking_2wheeler']."Bikes , ".$p_info['parking_4wheeler']."Cars"?></p>
                                                 </li>
                                                
                                                 <li>
                                                   <span>Pets Allowed</span>
                                                   <p><?=@$p_info['pets_allowed']?></p>
                                                 </li>
                                                 <li>
                                                   <span>Restrictions</span>
                                                   <p><?=@$p_info['rent_for']?></p>
                                                 </li>
                                              </ul>
                                          
                                          </div>
                                      </div>
                                     <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Flat Amenities</h5>
                                        <ul class="list-flatani">
                                        <?php 

                                        echo (!empty($p_info['ac']))?$p_info['ac'].", ":"";
                                          echo (!empty($p_info['bed']))?$p_info['bed'].", ":"" ;
                                          echo (!empty($p_info['cupboard']))?$p_info['cupboard'].", ":"" ;
                                          echo (!empty($p_info['sofa']))?$p_info['sofa'].", ":"" ;
   
                                           echo (!empty($p_info['tv']))?$p_info['tv'].", ":"" ;
                                           
                                           echo (!empty($p_info['microwave']))?$p_info['microwave'].", ":"" ;
                                           
                                           echo (!empty($p_info['waching_machine']))?$p_info['waching_machine'].", ":"" ;
                                           
                                           echo (!empty($p_info['dining_table']))?$p_info['dining_table'].", ":"" ;
                                           
                                           echo (!empty($p_info['fridge']))?$p_info['fridge'].", ":"" ;
                                           
                                           echo (!empty($p_info['servent_room']))?$p_info['servent_room'].", ":"" ;
                                           
                                           echo (!empty($p_info['security']))?$p_info['security'].", ":"" ;

                                           echo (!empty($p_info['electricity_backup']))?$p_info['electricity_backup'].", ":"" ;
                                           
                                           echo (!empty($p_info['pooja_room']))? $p_info['pooja_room'].", ":"" ;
                                           
                                           echo (!empty($p_info['store_room']))? $p_info['store_room'].", ":"" ;

                                          ?>
                                          
                                        
                                          <div class="clearfix"></div>
                                        </ul>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="flat-div">
                                        <h5>Society Amenities</h5>
                                       
                                        <ul class="list-flatani">
                                          <?php                                            
                                           echo (!empty($p_info['gym'])) ? $p_info['gym'].", ":"" ;
                                           
                                           echo (!empty($p_info['swimming_pool']))?$p_info['swimming_pool'].", ":"" ;
                                           
                                           echo (!empty($p_info['lift']))?$p_info['lift'].", ":"" ;
                                           
                                           echo (!empty($p_info['gas_pipeline']))?$p_info['gas_pipeline'].", ":"" ;
                                           

                                        ?>
                                          <div class="clearfix"></div>
                                        </ul>
                                         <div class="clearfix"></div>
                                        <a href="#test-popup9<?=$p_info['post_id']?>" class="inline-popups-a"  style="color:#fff; outline:none;"data-effect="mfp-zoom-in"><div class="cont-but cont-but12">
                                              
                                                 <i class="fa fa-phone"></i>
                                  <h6> Contact</h6>

                                                  <div class="clearfix"></div>
                                                  </div></a>
                                                  <!--popup code start here-->
                              <div id="test-popup9<?=$p_info['post_id']?>" class="white-popup mfp-with-anim mfp-hide">
                                
            <div class="col-md-12 left-part-12">
                            <div class="col-md-6">  
                                <div class="agent-name">
                                    <p><?=$p_info['contact_name']?></p>
                                     <p><?=$p_info['listed_by']?></p>
                                     <h2><?=$p_info['contact_mobile']?></h2>
                                </div>
                             </div>
                             <div class="col-md-6"> 
                                <div class="flat-603">
                                    <h6> Flat id: <?=$p_info['post_id']?></h6>
                                    <div class="address-flat">
                                        <h4> <?=$p_info['bedrooms']?> BHK , <?=$p_info['property_furnished_status']?> </h4>
                                        <p><?=$p_info['addres_locality']?></p>
                                        <span><i class="fa fa-inr"></i><?=$p_info['price_monthly']?></span>
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
<div id="gmap"></div>
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

<?php include("includes/footer.php"); ?>
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
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>