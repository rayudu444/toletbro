<?php
session_start();
ob_start();
include("includes/dbutil.php");
?>
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
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<style>
.login-div1{
	
	width:380px;
	padding:20px 15px; 
	margin:auto;
	display:block;
	border-radius:5px;
}
	
</style>
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

function fillInAddress(){
	
}

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


	  google.maps.event.addDomListener(auto, 'keydown', function(e) { 
		    if (e.keyCode == 13) { 
		        e.preventDefault(); 
		       
		    }
		   
		}); 

}

  </script>
  <script>
	$(document).ready(function(){
		$("#sign-up").submit(function(e) {
		    e.preventDefault();
		}).validate({
		   rules: {
			emailid: {
			    required: true,
			    email: true,
			    remote:{
					url: "check-convention-email.php",
					type:'POST',
					data: {
						email: function() {
			            	return $( "#emailid" ).val();
			            }
			 		}
		   		}},
          mobileno: {
          required: true,
          
          remote:{
          url: "check-convention-email.php",
          type:'POST',
          data: {
            mobile: function() {
                    return $( "#mobileno" ).val();
                  }
          }
          }
      }
			
		},
		   	 messages :{
				 emailid : {
		   		 	remote : "User already registered with this Email ID"
					 
					 },
           mobileno: {
          remote : "User already registered with this Mobile"
        }
				 
		   	 },
		   	 //perform an AJAX post to ajax.php
             submitHandler: function() {
                 
                $("#form-content").hide();
             
                $.ajax({
                    url : "mobile-verification.php",
                    type : "POST",
                    data : {mobile : $("#mobileno").val()},
                    success: function(data){
                     	if(data == 1)
                     	{
                     		  var one_password = 	'<div class="col-md-5 left-part">'+
					                        	'<a href="#">'+
					                            	'<img src="images/logo-w.png"/>'+
					                            '</a>'+
					                            '<div class="signup-div">'+
					                            	'<h1>Why sign up?</h1>'+
					                                '<ul>'+
					                                	'<li>Save time filling forms</li>'+
					                                    '<li>Access your recent searches</li>'+
					                                    '<li>Track shortlisted, messaged properties</li>'+
					                                '</ul>'+
					                            '</div>'+
					                        '</div>'+
											'<div class="col-md-7">'+
					                        	'<div class="login-div">'+
					                                '<div class="clearfix"></div>'+
					                                '<div class="login-form">'+
						                                	'<span>Please Verify One time password sent to your mobile</span>'+
					                                        '<input type="text" class="required" placeholder="One Time Password" name="password" id="one-time-password"/>'+
					                                        '<span style="color:red" id="one-required"></span>'+
					                                        '<button type="button" id="verify">Verify</button>'+
						                                
					                                '</div>'+
					                                '<div class="clearfix"></div>'+
					                            '</div>'+
					                        '</div>'+
					                        '<div class="clearfix"></div>';
					          $("#test-popup2").append(one_password);
                     	}else{
                     		alert("Error While sign up please try again");
                     	}
                     	
                    }
                });
                
             }
			    
		  
		
		});
		
		$(document).on("click","#verify",function(){
			var password = $("#one-time-password").val();
			if(password != '')
			{
				$.ajax({
					url : "verify-code.php",
					type : "POST",
					data : {code:password},
					success : function(data){
						
						if(parseInt(data) == 1)
						{
							
							var form = $("#sign-up").serialize();
							$.ajax({
								url : "convention-userregister.php",
								type : "POST",
								data: form,
								success:function(data)
								{
									window.location = 'convention-centre.php';
								}
								
							});
						}else{
							$("#one-required").text("");
							$("#one-required").text("Pasword not matched");
						}
						
					}
				});
				
				
			}else{
				$("#one-required").text("");
				$("#one-required").text("This field is required");
			}
			
		});
	});
</script>
<style>
	.error{
		color: red;
	}
</style>


</head>
<body onLoad="initialize()">
	<section class="white-div-wrapper">
	    <div class="container">
        	<div class="row">
            	<div class="col-md-12">
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
	                                <form method="post" action="convention-checkuser.php">
                                	<input type="text" required placeholder="Email/Mobile" name="user_email"/>
                                    <input type="password" placeholder="Password" name="password"/>
                                    <button type="submit">Login</button>
                                </form>
                                <span><a href="#test-forgot" class="sing-buts clickforgot inline-popups-a">Forgot Password</a>
                                </span>

                                <div id="test-forgot" class="white-popup mfp-with-anim mfp-hide" style="width:400px;">            
            <div class="col-md-12">
                          <div class="login-div">
                                <div class="clearfix"></div>
                                <div class="login-form">
                                  <form method="post" action="convention-forgotpwd.php">
                                  <input type="text" required placeholder="Email" name="user_email"/>
                                    
                                    <button type="submit" name="submit">Submit</button>
                                   

                                </form>
                                
                                </div>
                                  
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
              </div>
                                </div>
                                <!-- <span><img src="images/or.png" class="or-img"/></span>
                                <div class="clearfix"></div>
                            	<a href="#"><img id="fb-login" src="images/fb-login.png"/></a>
                                <div class="clearfix"></div> -->
                              
                               <?php 
            if($is_user_login){ ?>
              <!-- <a class="login" href="<?= $authUrl; ?>"><img src="images/gplus-login.png"/></a> -->
          <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
			        
			      </div>

			      <div id="test-popup2" class="white-popup mfp-with-anim mfp-hide">
			      		<div id="form-content">
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
	                                <form method="post" id="sign-up" action="">
                                        <input type="text" placeholder="Name" class="required" name="username" id="username"/>
                                        <input type="email" placeholder="Email Id" class="required email" name="emailid" id="emailid"/>
                                        <input type="number" placeholder="Mobile Number" class="mobile required"  name="mobileno" id="mobileno"/>
                                        <input type="password" placeholder="Password" name="password" id="password"/>
                                        <input type="password" placeholder="Confirm Password" name="conformpassword" id="conformpassword"/>
                                        <button type="submit">Sign Up</button>
	                                </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
			        </div>
			      </div>
			      
			       
		        </div>
	        </div>
        </div>
		<div class="container-fluid top-header">
        	<div class="container">
                <div class="row">
	                <div class="links">
                    	
                        
                       
                         
                     <ul class="list-log-di">
                              <li><a href="index.php">Home</a></li>
                              <li><a href="download-app.html">Download App</a></li>
                              <?php if(isset($_SESSION['cnv_upid'])){?>
                      <li><a href="convention-profile-list.php"><?php echo $_SESSION['user_name']; ?></a></li>
                       <li> <a href="logout.php" >Log out</a></li>
                     <div class="clear"></div>
                    
                    <?php } else {?>
                     <li><a href="#test-popup2" class="sing-buts click inline-popups-a" data-effect="mfp-zoom-in" style="margin-right:0px">Convention Center Signup</a></li>                 	
                      <li><a href="#test-popup" class="click2 inline-popups-a" data-effect="mfp-zoom-in">/Login</a></li>
                        
                    <div class="clear"></div>
                    
                    <?php }?></ul>
					 <?php
						  if(isset($_SESSION['msg'])){
							  echo $_SESSION['msg'];
							  unset($_SESSION['msg']);
						  }
						  ?>

                  
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        	<div class="clearfix"></div>
        </div>
        <div class="container-fluid banner1">        
        	<div>
            	<a href="index.php">
                	<img src="images/logo.png" class="logo1"/>
                </a>
            </div>
	        <div class="container">
	            <div class="row">
                	<div>
                    	<h1 class="head6">LOREM LPSUM DUMMY TEXT</h1>
                        <form class="form1" action="convention-listview.php" method="get">
                        	<label>
                            	<img src="images/map-icon.png" class="map-icon"/>
								<input type="text" id="autocomplete" name="search_input" required  placeholder="Search by locality or landmark "  style="width:60% !important;"/>
								<input type="hidden" name="lat" value=""  id="lat"/>
								<input type="hidden" name="lng" value=""  id="lng"/>
								<!-- <input type="hidden"  name="view" value="convention"  /> -->

								<select class="rent-select" name="ctype" required>
                                	<option value="" hidden>Select Convention</option>

                                <option value="Convention centre">Convention centre</option>
                                <option value="Function hall">Function hall</option>
                                <option value="Banquet hall">Banquet hall</option>
                                </select>
                                <button type="submit"><img src="images/search-icon.png"/>Search</button>
                                <div class="clearfix"></div>
                            </label>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                	<div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid white-bg1">
        	<div class="container">
            	<div class="row">
                	<h2 class="head7">Find suitable city for your events</h2>
                	<div class="col-md-3 city-div">
                    	<img src="images/chennai.png"/>
                        <span>Chennai</span>
                    </div>
                    <div class="col-md-3 city-div">
                    	<img src="images/hyderabad.png"/>
                        <span>Hyderabad</span>
                    </div>
                    <div class="col-md-3 city-div">
                    	<img src="images/bangalore.png"/>
                        <span>Bangalore</span>
                    </div>
                    <div class="col-md-3 city-div">
                    	<img src="images/pune.png"/>
                        <span>Pune</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid white-bg2">
        	<div class="container">
            	<div class="row">
	                <h2 class="head8">Popular Venues</h2>
                	<div class="col-md-4 venue-div">
	                    <a href="#" class="book-a">
                            <img src="images/venue.png"/>
                            <ul>
                                <li>
                                    <p>Venue: </p>
                                    <span>Lorem ipsum dolor sit amet</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Seating Capacity: </p>
                                    <span>100 People</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Price: </p>
                                    <span>Rs 650/-</span>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        	<span class="book-span">Book Now</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="col-md-4 venue-div">
	                    <a href="#" class="book-a">
                            <img src="images/venue.png"/>
                            <ul>
                                <li>
                                    <p>Venue: </p>
                                    <span>Lorem ipsum dolor sit amet</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Seating Capacity: </p>
                                    <span>100 People</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Price: </p>
                                    <span>Rs 650/-</span>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        	<span class="book-span">Book Now</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="col-md-4 venue-div venue-div1">
	                    <a href="#" class="book-a">
                            <img src="images/venue.png"/>
                            <ul>
                                <li>
                                    <p>Venue: </p>
                                    <span>Lorem ipsum dolor sit amet</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Seating Capacity: </p>
                                    <span>100 People</span>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <p>Price: </p>
                                    <span>Rs 650/-</span>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        	<span class="book-span">Book Now</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div>
        
<?php include("includes/footer.php"); ?>
        <script type="text/javascript">
$(function(){
  var $elems = $('.animateblock');
  var winheight = $(window).height();
  var fullheight = $(document).height();
  
  $(window).scroll(function(){
    animate_elems();
  });
  
  function animate_elems() {
    wintop = $(window).scrollTop(); // calculate distance from top of window
 
    // loop through each item to check when it animates
    $elems.each(function(){
      $elm = $(this);
      
      if($elm.hasClass('animated')) { return true; } // if already animated skip to the next item
      
      topcoords = $elm.offset().top; // element's distance from top of page in pixels
      
      if(wintop > (topcoords - (winheight*.75))) {
        // animate when top of the window is 3/4 above the element
        $elm.addClass('animated');
      }
    });
  } // end animate_elems()
});
</script>    
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>
</body>
</html>
