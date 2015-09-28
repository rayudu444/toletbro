<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width intial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
<title>Tolet Bro</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>

<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script>

// This example displays an address form, using the autocomplete feature

// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;

var componentForm = {

  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'

};

function initialize() {

  // Create the autocomplete object, restricting the search

  // to geographical location types.

  autocomplete = new google.maps.places.Autocomplete(

      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),

      { types: ['geocode'] });


  // When the user selects an address from the dropdown,

  // populate the address fields in the form.

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
	  var address = 	$('#autocomplete').val();
		var geocoder = new google.maps.Geocoder();
		

		geocoder.geocode( { 'address': address}, function(results, status) {

			if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
			   	$("#lat").val(latitude);
			   	$("#lng").val(longitude);
			    } 
			}); 
    

  });

  // populate the address fields in the form.
  
  auto= document.getElementById('autocomplete');


	

}

  </script>
<?php 
 if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')  )
 {
	$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_GET['lat']).','.trim($_GET['lng']).'&sensor=false';
	$json = @file_get_contents($url);
	$data=json_decode($json);
	$status = $data->status;
	if($status=="OK")
	$addr = $data->results[0]->formatted_address;
 }
?>
</head>
<body onLoad="initialize()">
 
	<section>
		<div class="container-fluid"> 
          <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
            <div class="col-md-5 left-part">
                          <a href="#">
                              <img src="images/logo-w.png"/>
                            </a>
                            <div class="signup-div">
                              <h1>Why sign up?</h1>
                                <ul>
                                  <li>Save time filling forms</li>
                                    <li>Access your recent searches</li>
                                    <li>Track shortlisted, messaged properties</li>
                                </ul>
                            </div>
                        </div>
            <div class="col-md-7">
                          <div class="login-div">
                                <div class="clearfix"></div>
                                <div class="login-form">
                                  <form method="post" action="checkuser.php">
                                  <input type="email" placeholder="Email Id" name="user_email"/>
                                    <input type="password" placeholder="Password" name="password"/>
                                    <button type="submit">Login</button>
                                </form>
                                </div>
                                <span><img src="images/or.png" class="or-img"/></span>
                                <div class="clearfix"></div>
                              <a href="#"><img id="fb-login" src="images/fb-login.png"/></a>
                                <div class="clearfix"></div>
                              <!--  <a href="#"><img src="images/gplus-login.png"/></a> -->
                               <?php 
            if($is_user_login){ ?>
              <a class="login" href="<?= $authUrl; ?>"><img src="images/gplus-login.png"/></a>
          <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
              </div>
        	<div>
            	<div class="row">
                	<div class="col-md-5 paddingTop-3">
                    	<form class="form2" action=""  method="get">    
                        	<label>
                            	<select name="type" id="type">
                                	<option  value="Rent" <?php echo @($_GET['type'] == "Rent")? "selected" : "";?>>Rent</option>
                                    <option  value="Sale" <?php echo @($_GET['type'] == "Sale")? "selected" : "";?>>Sale</option>
                                </select>
                            </label>
                            
                            <label class="label1"> 
                            	<i class="fa fa-map-marker map-icon2"></i>
                            	<input type="text"  id="autocomplete" value="<?php echo  @$addr;?>" placeholder="Search by locality or landmark or building"/>
                            	<input type="hidden" name="lat" value="<?php echo  @$_GET['lat'];?>" class="post-filters"  id="lat"/>
								<input type="hidden" name="lng" value="<?php echo  @$_GET['lng'];?>" class="post-filters"  id="lng"/>
                                <button type="submit"><i class="fa fa-search search-icon"></i></button>
                                <div class="clearfix"></div>
                            </label>
                        </form>
                    </div>
                    <div class="col-md-7">
                    	<a href="index.php"><img src="images/logo-w.png" class="logo-w"/></a>
                        <nav class="nav-list1 paddingTop-5">
                        	<ul>
                            	<li><a href="download-app.html">Download App</a></li>
                                <li><a href="#">Sell/Rent Property</a></li>
                            	<?php if(isset($_SESSION['upid']) && $_SESSION['upid'] != ''){?>
              <li><a href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a></li>
                            <li><a href="logout.php">Log out</a></li><?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix height10"></div>
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index.js"></script>
