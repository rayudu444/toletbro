<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  include_once('includes/convention_header.php');
  ?>
<script type="text/javascript" src="js/fileupload.js"></script>
 <script>
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
     
    });
   
});
</script>    
<style type="text/css">
#gmap {
    height: 250px;
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
</head>
<body>
 <?php
	if(isset($_REQUEST['post'])){ 
	$query= mysql_query("select * from convention_post_add where convention_post_id='".$_REQUEST['post']."'");
	$get_info =mysql_fetch_array($query);
	}
	?>
<?php $query1= mysql_query("select * from convention_users where cnv_upid='".$_SESSION['cnv_upid']."'");
                                $user_info=mysql_fetch_array($query1);
                            ?>
        <form method="post" name="myForm2" id="image-upload" enctype="multipart/form-data" action="dbadd-convention.php" >
        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>POST FOR CONVENTIONS</p>
                               </div>              
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Title</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              
                                <div class="input-title"><input type="text" name="title" id="test1" placeholder="Title" value="<?php echo @$get_info['title']?>" /></div>
                            
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
                             
                   <div class="container-post">
                          
                         
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" id="test81"  name="convention_type" <?php echo @($get_info['convention_type']=="AC")? "checked" :""?>  value="AC"/>
                                <label for="test81">AC</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test82" <?php echo @($get_info['convention_type']=="NON AC")? "checked" :""?> name="convention_type" value="NON AC"/>
                                <label style="float:right;" for="test82">NON AC</label>
                                  <div class="clearfix"></div> 
                              </p>
                            <div class="clearfix"></div>   
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
                                <div class="input-title"><input value="<?=$user_info['user_name']?>" type="text" name="contact_person_name" id="test1" placeholder="Full Name" /></div>
                               <?php $mobile=null;
                               if($user_info['user_mobile']==0){
                               	$mobile= "";
                               	}else{
                               		$mobile= $user_info['user_mobile'];
                               	}
                               	?>
                               <div class="input-title"><input value="<?=$mobile?>" type="text" name="contact_person_mobile" id="test1" placeholder="Mobile" /></div>
                               <div class="input-title"><input value="<?=$user_info['user_email']?>" type="text" name="contact_person_email" id="test1" placeholder="Email" /></div>
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
                                <option value="<?= $resu['state_name']?>" <?php echo @($add_info['addres_state']==$resu['state_name'])? "selected" :""?> ><?= $resu['state_name'] ?></option>
                <?php } ?>
                                
                              </select>
                              
                              </div>
                              
                              <div class="form-1" id="cat_data" >
                             
                               <select name="city" id="city">
                                <option value="">select City</option>
                                
                              </select>
                              
                              </div>
                              
                              
                              
                              <div class="form-1">
                             
                               <div class="input-title"><input type="text" id="test1" placeholder="Locality" name="locality" value="<?php echo @$get_info['locality']?>" /></div>
                              </div>
                             <div class="list-check">
                              
                                <div class="input-title"><input type="textarea" name="address" row="5" col="5" placeholder="Addres" /><?php echo @$get_info['address']?></div>
                            
                            <div class="clearfix"></div>   
                           </div>
                              
                            

                         <!-- </form> -->
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Tag Location</p>
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
                
                 <div class="class="nex-but"">
                     <!-- <a href="postad2.html" >Next</a> -->
                     <input type="button" name="submit" class="ne-but" id="upload" value="Next">
                    <div class="clear"></div>
                 </div>
                </div>
            </div>
        </div>
        </form>
        <script type="text/javascript">
    	//images uploading functionailty

	    $('#upload').click(function(e) {
	    	
	    	var other_data = $('form#image-upload').serializeArray();
	    	console.log(other_data);
	        if (document.myForm2.title.value != "")

	        {

	          if (posting_images.length == 0)

	          {

	              alert("Please upload property image.");

	              e.preventDefault();

	          }else{

	             var data = new FormData();



	             for(var j=0, len=posting_images.length; j<len; j++) {

	                  

	                 data.append("images["+j+"]", posting_images[j]); 

	             }

	           

	            



	                  $.each(other_data,function(key,input){

	                      data.append(input.name,input.value);

	                  });

	                $("#dialog-background").show();

	                $(".dialog").show();

	               $.ajax({

	                   type: 'POST',

	                   url : 'dbadd-convention.php',

	                   data : data,

	                   processData: false,

	                   contentType: false,

	                   statusCode: {

	                      200: function(data) {
	            	   		var response = JSON.parse(data);
	                        if(response.status == 1)

	                        {
	                        	
	                         window.location = "convention-post1.php?post="+response.post_id;
	                         

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
    
        </script>
        
        <?php  include_once('includes/footer.php');?>