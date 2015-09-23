<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
include_once('includes/property_header.php');
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
<?php $lat="17.385044"; $lon="78.486671"; ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
var map;
var marker=false;
function initialize() {
  var myLatlng = new google.maps.LatLng(17.385044,78.486671);
  var markers = [];
  var map = new google.maps.Map(document.getElementById('gmap'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(17.385044, 78.486671),
      new google.maps.LatLng(17.385044, 78.486671));
 
  var myOptions = {
    zoom: 14,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  map = new google.maps.Map(document.getElementById("gmap"), myOptions);
  
  marker = new google.maps.Marker({
      	position: myLatlng, 
      	map: map
  	});
	
  google.maps.event.addListener(map, 'center_changed', function() {
  	var location = map.getCenter();
	var address=getaddress(location.lat(),location.lng());
	document.getElementById("lat1").value = location.lat();
	document.getElementById("lon1").value = location.lng();
    placeMarker(location);
  });
  
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
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

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
<script>
$(document).ready(function(){
	$( ".Bedrooms" ).click(function() {
	
  var i = $(this).val();
  
  $('#no_bedroos').val(i);
  
});	 
$( ".Bathrooms" ).click(function() {
	
  var j = $(this).val();
  
  $('#no_bathrooms').val(j);
  
});
$( ".balconies" ).click(function() {
	
  var k = $(this).val();
  
  $('#no_balconies').val(k);
  
});	 
$( ".parking_2" ).click(function() {
	
  var l = $(this).val();
  
  $('#no_parking2').val(l);
  
});	 
$( ".parking_4" ).click(function() {
	
  var m = $(this).val();
  
  $('#no_parking4').val(m);
  
});	 	 

});
</script>

  <?php
  if(isset($_REQUEST['post'])){ 
  $query= mysql_query("select * from post_add where post_id='".$_REQUEST['post']."'");
  $get_info =mysql_fetch_array($query);
  }
  ?>
  <div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">POST AN ADD</p>
    </div>  
     <div class="container">
    <div class="container-sub3">
    <form method="post" action="addpostanadd1.php">
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Tag Property Location</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post1">
				    
                        <div id="bd">
	                             <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                 <div id="gmap"></div>
		                         <div class="clear" style="margin-bottom:10px;"></div>
                                 <!--lat:<span id="lat"></span> lon:<span id="lon"></span><br/>
                                    zoom level: <span id="zoom_level"></span>-->
                                  </div>
								  <input type="hidden" name="latitude" id='lat1' value="<?php echo $lat; ?>" />		
                               <input type="hidden" name="longitude" id="lon1" value="<?php echo $lon; ?>" />
		  
                   </div>
                    <div class="clearfix"></div>
                </div>
                
            	
                
                
                 
                 
                <div class="row mob-row">
                              
                                <div class="clearfix"></div>
                   <div class="container-post1">
                             <div class="div-pad3">
                                  <p>Bedrooms</p>
                               </div>
                               <div class="box-filters">
                                  <input class="Bedrooms " type="button" value="0"/>
                                    <input class="Bedrooms <?php echo @ ($get_info['bedrooms']==1)?"active1":""?>" type="button" value="1"/>
                                     <input class="Bedrooms <?php echo @ ($get_info['bedrooms']==2)?"active1":""?>" type="button" value="2"/>
                                     <input class="Bedrooms <?php echo @ ($get_info['bedrooms']==3)?"active1":""?>" type="button" value="3"/>
                                       <input class="Bedrooms <?php echo @ ($get_info['bedrooms']==4)?"active1":""?>" type="button" value="4"/>
                                        <input class="Bedrooms <?php echo @ ($get_info['bedrooms']=="5+")?"active1":""?>" type="button" value="5+"/>
                                  <div class="clearfix"></div>
								  <input type="hidden" name="no_bedroos" id="no_bedroos" value="" />
                               </div>
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                  <div class="clearfix"></div>

                  <div class="row mob-row">
                              
                                <div class="clearfix"></div>
                   <div class="container-post1">
                             <div class="div-pad3">
                                  <p>Bathrooms</p>
                               </div>
                               <div class="box-filters ">
                                   <input class="Bathrooms " type="button" value="0"/>
                                    <input class="Bathrooms <?php echo @ ($get_info['bathrooms']==1)?"active1":""?>" type="button" value="1"/>
                                     <input class="Bathrooms <?php echo @ ($get_info['bathrooms']==2)?"active1":""?>" type="button" value="2"/>
                                     <input class="Bathrooms <?php echo @ ($get_info['bathrooms']==3)?"active1":""?>" type="button" value="3"/>
                                       <input class="Bathrooms <?php echo @ ($get_info['bathrooms']==4)?"active1":""?>" type="button" value="4"/>
                                        <input class="Bathrooms <?php echo @ ($get_info['bathrooms']=="5+")?"active1":""?>" type="button" value="5+"/>
                                  <div class="clearfix"></div>
								  <input type="hidden" name="no_bathrooms" id="no_bathrooms" value="" />
                               </div>
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                 <div class="clearfix"></div>
                  <div class="row mob-row">
                              
                                <div class="clearfix"></div>
                   <div class="container-post1">
                             <div class="div-pad3">
                                  <p>Balconies</p>
                               </div>
                               <div class="box-filters ">
                                   <input class="balconies " type="button" value="0"/>
                                    <input class="balconies" <?php echo @ ($get_info['balconies']==1)?"active1":""?> type="button" value="1"/>
                                     <input class="balconies <?php echo @ ($get_info['balconies']==2)?"active1":""?>" type="button" value="2"/>
                                     <input class="balconies <?php echo @ ($get_info['balconies']==3)?"active1":""?>" type="button" value="3"/>
                                       <input class="balconies <?php echo @ ($get_info['balconies']==4)?"active1":""?>" type="button" value="4"/>
                                        <input class="balconies <?php echo @ ($get_info['balconies']=="5+")?"active1":""?>"  type="button" value="5+"/>
								  <input type="hidden" name="no_balconies"  id="no_balconies" value="" />
                               </div>
                   </div>
                    <div class="clear-60"></div>
                </div>
                
                
                <div class="row mob-row">
                              <div class="col-md-12 div-pad2">
                                  <p>Parking avalibilty</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post1">
                             <div class="div-pad3">
                                  <p>2 Wheeler</p>
                               </div>
                               <div class="box-filters ">
                                   <input class="parking_2 " type="button" value="0"/>
                                    <input class="parking_2 <?php echo @ ($get_info['parking_2wheeler']==1)?"active1":""?>" type="button" value="1"/>
                                     <input class="parking_2 <?php echo @ ($get_info['parking_2wheeler']==2)?"active1":""?>" type="button" value="2"/>
                                     <input class="parking_2 <?php echo @ ($get_info['parking_2wheeler']==3)?"active1":""?>" type="button" value="3"/>
                                       <input class="parking_2 <?php echo @ ($get_info['parking_2wheeler']==4)?"active1":""?>" type="button" value="4"/>
                                        <input class="parking_2 <?php echo @ ($get_info['parking_2wheeler']=="5+")?"active1":""?>" type="button" value="5+"/>
                                  <div class="clearfix"></div>
								  <input type="hidden" name="no_parking2" id="no_parking2" value="" />
                               </div>
                   </div>
                   
                   <div class="container-post1">
                             <div class="div-pad3">
                                  <p>4 Wheeler</p>
                               </div>
                               <div class="box-filters ">
                                   <input class="parking_4 " type="button" value="0"/>
                                    <input class="parking_4 <?php echo @ ($get_info['parking_4wheeler']==1)?"active1":""?>" type="button" value="1"/>
                                     <input class="parking_4 <?php echo @ ($get_info['parking_4wheeler']==2)?"active1":""?>" type="button" value="2"/>
                                     <input class="parking_4 <?php echo @ ($get_info['parking_4wheeler']==3)?"active1":""?>" type="button" value="3"/>
                                       <input class="parking_4 <?php echo @ ($get_info['parking_4wheeler']==4)?"active1":""?>" type="button" value="4"/>
                                        <input class="parking_4 <?php echo @ ($get_info['parking_4wheeler']=="5+")?"active1":""?>" type="button" value="5+"/>
                                  <div class="clearfix"></div>
								  <input type="hidden" name="no_parking4" id="no_parking4" value="" />
                               </div>
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                  <div class="col-md-12 div-pad2">
                                  <p>Furnished Status</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                         
                            <div class="form-1">
                             
                               <select name="funished_status">
                                <option value="">Furnished Status</option>
                                <option value="Semi Furnished" <?php echo @ ($get_info['property_furnished_status']=="Semi Furnished")?"selected":""?>>semifunished</option>
                                <option value="Fully Funished" <?php echo @ ($get_info['property_furnished_status']=="Fully Furnished")?"selected":""?>>fullyfunished </option>
                                <option value="Not Furnished" <?php echo @ ($get_info['property_furnished_status']=="Not Furnished")?"selected":""?>>Not Furnished </option>
                              </select>
                              
                              </div>
                           
                               
                              <div class="input-seats" style="margin-top:10px;">
                              <?php $bathrooms = ($get_info['bathrooms']==0)?"":$get_info['bathrooms'];?>
                             <input type="text" name="floore" placeholder="Floor No" value="<?php echo @$bathrooms?>">
                             </div>
                              

                               
                            

                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="nex-but">
				              <input type="hidden" name="post_id"  value="<?=$_REQUEST['post']?>" />
                     <input type="submit" name="Next" value="Next" class="ne-but" />
                    
                 
				  </form>
                     
                     <a href="post-add.php?post=<?=$_REQUEST['post']?>" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
    </div>
    </div>
    
  <?php include("includes/footer.php");?>