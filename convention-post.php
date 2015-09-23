<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  include_once('includes/convention_header.php');
  
  	if(isset($_GET['post']))
  	{
  		try{
		$post_id = $_GET['post'];
		$sql = "SELECT `title`,`images`,`convention_type`,`contact_person_name`,`contact_person_mobile`,`contact_person_email`,`state`,`city`,`locality`,`address`,`location_lat`,`location_long` FROM `convention_post_add` WHERE `convention_post_id` = ? ";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_id));
		$post_details = $statement->fetch(PDO::FETCH_ASSOC);
		
		$sql  = "SELECT `city_name` FROM `tbl_city` INNER JOIN `tbl_state` ON `tbl_city`.`state_id` = `tbl_state`.`id` WHERE `tbl_state`.`state_name` = ?";
	 
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post_details['state']));
		$cities = $statement->fetchAll(PDO::FETCH_ASSOC);	
		
		}catch(PDOException $e)
		{
			echo $e->getmessage();exit;
		}	
  	}
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
<style type="text/css">
.bg-pop{
   width:360px;
   background:rgba(0,0,0,0.1);
   margin:auto;
}
.login-pox{
  font-size:20px;
  font-family: Lato;
  padding:40px 20px;
  display:block;
  text-align: center;
}
</style>
<body>

        <form method="post" name="myForm2" id="image-upload" enctype="multipart/form-data" action="dbadd-convention.php" >
        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>POST FOR CONVENTIONS</p>
                               </div>              
        	<div class="container">
          <?php if(isset($_GET['message']))

      {      ?>
            <div class="col-md-12">
           <div id="test-popup5" class="bg-pop white-popup mfp-with-anim mfp-hide">
      
                        <a href="#" class="login-pox" >Convention Post added successfully...</a>
            <div class="clearfix"></div>
            <script type="text/javascript">
                setTimeout(function(){ window.location = 'convention-centre.php'; }, 3000);
                </script>
                </div>
          </div>
          </div>
            <?php } ?>
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Title</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                            
                            	
                              
                                <div class="input-title"><input type="text" name="title" id="test1" placeholder="Title" value='<?= @$post_details['title'];?>' /></div>
                            
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
                            	<?php if(isset($post_details['images']))
                            	  {
                            	  	if($post_details['images'] != '')
                            	  	{
                            	  	$images = explode(',',trim($post_details['images'],','));
                            	  	$inc = 0;
                            	  	
                            	  	foreach ($images as $image)
                            	  	{
                             ?>
                             	<div id='abcd<?= $inc; ?>' class='abcd'>
                            			<img id='previewimg<?= $inc; ?>' src='<?php echo "uploads/convention_images/$image"; ?>'/>
                            			<img id='img' data = '<?= $image; ?>' class='delete-exiting-images' src='images/x.png'/>
                            	</div>
                            <?php }} } ?>
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
                                <input type="checkbox" id="test81"  name="convention_type"  value="AC" <?php echo (isset($post_details['convention_type']) && $post_details['convention_type']=="AC")? "checked" :""?> />
                                <label for="test81">AC</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test82"  name="convention_type" value="NON AC" <?php echo (isset($post_details['convention_type']) && $post_details['convention_type']=="NON AC")? "checked" :""?>/>
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
                                <div class="input-title"><input type="text" name="contact_person_name" id="test1" placeholder="Full Name" value='<?php echo @$post_details["contact_person_name"];?>' /></div>
                               <div class="input-title"><input type="text" name="contact_person_mobile" id="test1" placeholder="Mobile" value='<?php echo @$post_details["contact_person_mobile"];?>' /></div>
                               <div class="input-title"><input type="text" name="contact_person_email" id="test1" placeholder="Email" value='<?php echo @$post_details["contact_person_email"];?>' /></div>
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
					                  <option value="<?= $resu['state_name']?>" <?php echo ( isset($post_details['state']) && $post_details['state']==$resu['state_name'])? "selected" :""?> ><?= $resu['state_name'] ?></option>
					                <?php } ?>
                                
                              </select>
                              
                              </div>
                              
                              <div class="form-1" id="cat_data" >
                             
                               <select name="city" id="city">
                                <option value="">select City</option>
                                <?php if(isset($cities)){
                                	
                                		foreach ($cities as $city)
                                		{ 
                                ?>
                                	 <option value="<?= $city['city_name']?>" <?php echo ( $city['city_name'] == $post_details['city'])? "selected" : ''; ?>><?= $city['city_name'] ?></option>
                                <?php } }?>
                                
                              </select>
                              
                              </div>
                              
                              
                              
                              <div class="form-1">
                             
                               <div class="input-title"><input type="text" id="test1" placeholder="Locality" name="locality" value="<?php echo @$post_details['locality']?>" /></div>
                              </div>
                             <div class="list-check">
                              
                                <div class="input-title"><input type="textarea" name="address" row="5" col="5" placeholder="Addres" value="<?php echo @$post_details['address']?>" /></div>
                            
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
	                  <input type="hidden" name="latitude" id='lat1' value="<?php echo @$post_details['location_lat']?>" />   
	                  <input type="hidden" name="longitude" id="lon1" value="<?php echo @$post_details['location_long']?>" />
      
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
var map;
var marker=false;
var lat = <?php echo (isset($post_details['location_lat']) && $post_details['location_lat'] != '' )? $post_details['location_lat'] : 17.385044; ?>;
var lng = <?php echo (isset($post_details['location_long']) && $post_details['location_long'] != '' )? $post_details['location_long'] : 78.486671; ?>;

function initialize() {
  var myLatlng = new google.maps.LatLng(lat,lng);
  var markers = [];
  var map = new google.maps.Map(document.getElementById('gmap'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(lat, lng),
      new google.maps.LatLng(lat, lng));
 
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
        <script type="text/javascript">
        var post_id = '<?php echo (isset($_GET['post']))? $_GET['post'] : ''; ?>';
      //delete existing images
        $(document).on("click",".delete-exiting-images",function(){

                    var delete_button = $(this);
        			var image = $(this).attr('data');
                   if(confirm("Do you want delete this image"))

                   {

                      var file = $(this).attr("data");

                      $.ajax({

                      url : "delete-conv-images.php",

                      type : "POST",

                      data : {'post_id' : post_id,"image" : image },

                      statusCode : {

                        200: function(data){

                          delete_button.parent().remove();

                        }

                      }
                      });

                   }
        		});
    	//images uploading functionailty
		
		
	    $('#upload').click(function(e) {
	    	
	    	var other_data = $('form#image-upload').serializeArray();
	    	console.log(other_data);
	        if (document.myForm2.title.value != "")

	        {

	          if (posting_images.length == 0 && post_id == '' && post_id != null )

	          {

	              alert("Please upload property image.");

	              e.preventDefault();

	          }else{

	             var data = new FormData();



	             for(var j=0, len=posting_images.length; j<len; j++) {

	                  

	                 data.append("images["+j+"]", posting_images[j]); 

	             }

	           
	             if((post_id != '') && post_id != null)
				 {
					 data.append('post_id',post_id);
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