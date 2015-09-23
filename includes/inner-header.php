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

  console.log(autocomplete);
  // When the user selects an address from the dropdown,

  // populate the address fields in the form.

  google.maps.event.addListener(autocomplete, 'place_changed', function() {

    fillInAddress();

  });

  // populate the address fields in the form.
  
  auto= document.getElementById('autocomplete');


	  google.maps.event.addDomListener(auto, 'keydown', function(e) { 
		    if (e.keyCode == 13) { 
		        e.preventDefault(); 
		       
		    }
		   
		}); 

}

  </script>
</head>
<body onLoad="initialize()">
	<section>
		<div class="container-fluid"> 
        	<div>
            	<div class="row">
                	<div class="col-md-5 paddingTop-3">
                    	<form class="form2" action="property-listview.php" method="post">
                        	<label>
                            	<select>
                                	<option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </label>
                            
                            <label class="label1">
                            	<i class="fa fa-map-marker map-icon2"></i>
                            	<input type="text" name="address" id="autocomplete" placeholder="Search by locality or landmark or building"/>
                                <button type="submit"><i class="fa fa-search search-icon"></i></button>
                                <div class="clearfix"></div>
                            </label>
                        </form>
                    </div>
                    <div class="col-md-7">
                    	<a href="index.php"><img src="images/logo-w.png" class="logo-w"/></a>
                        <nav class="nav-list1 paddingTop-5">
                        	<ul>
                            	<li><a href="#">Download App</a></li>
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