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
		   		}
			}
		},
		   	 messages :{
				 emailid : {
		   		 	remote : "User already registered with this Email ID"
					 
					 }
				 
		   	 },
		   	 //perform an AJAX post to ajax.php
             submitHandler: function() {
                 
                $("#test-popup2").addClass('mfp-hide');
             
                $.ajax({
                    url : "mobile-verification.php",
                    type : "POST",
                    data : {mobile : $("#mobileno").val()},
                    success: function(data){
                     	if(data == 1)
                     	{
                     		   $("#test-popup7").removeClass('mfp-hide');
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

<script>
         //Load the Facebook JS SDK
        (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));

        // Init the SDK upon load
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '505593126281403', // App ID
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
          });

         // Specify the extended permissions needed to view user data
// The user will be asked to grant these permissions to the app (so only pick those that are needed)
        var permissions = [
          'email',
          ].join(',');

// Specify the user fields to query the OpenGraph for.
// Some values are dependent on the user granting certain permissions
        var fields = [
          'id',
          'first_name',
          'middle_name',
          'last_name',
          'gender',
          'email',
          'picture'
          ].join(',');

  function showDetails() {
    FB.api('/me', {fields: fields}, function(details) {
        var user_details = JSON.stringify(details, null, '\t');
        //alert(user_details);
        user_details = JSON.parse(user_details);

		$.ajax({
            url: 'fb-authentication.php',
            type: 'POST',
            data: { 
                    id: user_details.id, 
                    first_name : user_details.first_name,
                    last_name : user_details.last_name,
                    email : user_details.email,
                    gender : user_details.gender,
                    mobile:user_details.mobile,
                    picture :  user_details.picture.data.url

                } ,
            
            success: function (response) {
                //your success code
				//alert(response);
                var data = JSON.parse(response);
                if(data.status == "true" )
                {
				
    				window.location = 'convention-centre.php';
					
                }else{
					
                    alert("Failed to login");
                }
            },
            error: function () {
                //your error code
            }
        }); 
    
    
    });
  }


  $('#fb-login').click(function(){
    //initiate OAuth Login
    FB.login(function(response) { 
      // if login was successful, execute the following code
      if(response.authResponse) {
          showDetails();
      }
    }, {scope: permissions});
  });

  };
</script>

<?php 
   $is_user_login = 0;
########## Google Settings.. Client ID, Client Secret from https://cloud.google.com/console #############
$google_client_id       = '394341835770-td97u9sunc8rgijgll23pa4brhhs9mk1.apps.googleusercontent.com';
$google_client_secret   = 'ROGTcqICqifViYLujjZJFGi_';
$google_redirect_url    =   URI."/convention-centre.php"; //path to your script
$google_developer_key   = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

//include google api files
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';


$gClient = new Google_Client();
$gClient->setApplicationName('Login to toletbro.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
    
  $gClient->authenticate($_GET['code']);
  $_SESSION['token'] = $gClient->getAccessToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
  return;
}


if (isset($_SESSION['token'])) 
{ 
  $gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
    //For logged in user, get details from google using access token
    $user         = $google_oauthV2->userinfo->get();
    
    $user_id        = $user['id'];
    $user_name      = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email        = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
    $profile_url      = filter_var($user['link'], FILTER_VALIDATE_URL);
    $profile_image_url  = filter_var($user['picture'], FILTER_VALIDATE_URL);
    $personMarkup     = "$email<div><img src='$profile_image_url?sz=50'></div>";
    $_SESSION['token']  = $gClient->getAccessToken();
}
else 
{
  //For Guest user, get google login url
  $authUrl = $gClient->createAuthUrl();
}
if(isset($authUrl)) //user is not logged in, show login button
{
  ++$is_user_login;
 
} 
else // user logged in 
{
   /* connect to database using mysqli */
  //unset($_SESSION['token']);
  //$user_exist = $mysqli->query("SELECT COUNT(google_id) as usercount FROM user_profile WHERE google_id=$user_id ")->fetch_object()->usercount; 
  $user_count=get_row_count_by_condition("convention_users","where user_email='".$email."'");
 
  if($user_count>0)
  {
    $user_info=get_row_by_condition("convention_users","where user_email='".$email."'");
    $_SESSION['user_mobile'] = $user_info['user_mobile'];
    $_SESSION['cnv_upid'] = $user_info['cnv_upid'];
    $_SESSION['user_name'] = $user_info['user_name'];
    $_SESSION['user_email']  = $user_info['user_email'];
    
    //header("location:http://localhost/safe-wash/index.php");
  }else{ 
    //user is new
    //echo 'Hi '.$user_name.', Thanks for Registering!';
    $user_info1=array('google_id'=>$user_id,'user_name'=>$user_name,'user_email'=>$email);
    $inserted=insertdata($user_info1,"convention_users");
    /*$mysqli->query("INSERT INTO user_profile (google_id, name, email) 
    VALUES ($user_id, '$user_name','$email')");*/
    if($inserted>0){
      if(!isset($_SESSION['user_email']))
      {
        $user_info=get_row_by_condition("convention_users","where user_email='".$email."'");
        $_SESSION['user_mobile'] = $user_info['user_mobile'];
        $_SESSION['cnv_upid'] = $user_info['cnv_upid'];
        $_SESSION['user_name'] = $user_info['user_name'];
        $_SESSION['user_email']  = $user_info['user_email'];
      }
        
    }

    
    
  }
 
} 
  ?>

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
                                	<input type="email" placeholder="Email Id" name="user_email"/>
                                    <input type="password" placeholder="Password" name="password"/>
                                    <button type="submit">Login</button>
                                </form>
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
			      
			       <div id="test-popup7" class="white-popup mfp-with-anim mfp-hide" style="position: absolute; z-index: 999999; left:35%; top:150px;">
						
						<div class="col-md-12" style="margin: auto !important;">
                        	<div class="login-div1">
                        		
                                <div class="clearfix"></div>
                                <div class="login-form">
	                                	<span>Please Verify One time password sent to your mobile</span>
	                                	<input type="text"/>
                                        <!--<input type="text" class="required" placeholder="One Time Password" name="password" id="one-time-password"/>-->
                                        <span style="color:red" id="one-required"></span>
                                        <button type="button" id="verify">Verify</button>
	                                
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
			        </div>

		        </div>
	        </div>
        </div>
		<div class="container-fluid top-header">
        	<div class="container">
                <div class="row">
	                <div class="links">
                    	<!--ul id="inline-popups">
              
	                   		<li><a href="#test-popup" class="click2" data-effect="mfp-zoom-in">Convention Center Login</a></li>
                     		<li><a href="#test-popup2" class="sing-buts click" data-effect="mfp-zoom-in">Convention Center Signup</a></li>

                              <div class="clearfix"></div>
                        </ul-->

                         <?php if(isset($_SESSION['cnv_upid']) || isset($_SESSION['upid'])){?>
                     <ul class="list-log-di">
                      <li><a href="convention-profile-list.php"><?php echo $_SESSION['user_name']; ?></a></li>
                       <li> <a href="logout.php" >Log out</a></li>
                     <div class="clear"></div>
                    </ul>
                    <?php } else {?>
                    <ul  id="inline-popups">
                      <li><a href="#test-popup" class="click2" data-effect="mfp-zoom-in">Convention Center Login</a></li>
                        <li><a href="#test-popup2" class="sing-buts click" data-effect="mfp-zoom-in">| Signup</a></li>
                    <div class="clear"></div>
                    </ul>
                    <?php }?>
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
            	<a href="#">
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
								<input type="text" id="autocomplete"  placeholder="Search by locality or landmark or building"  style="width:60% !important;"/>
								<input type="hidden" name="lat" value=""  id="lat"/>
								<input type="hidden" name="lng" value=""  id="lng"/>
								<input type="hidden" name="view" value="convention"  />
								<!--<select class="rent-select" name="type">
                                	<option>Rent</option>
                                    <option>Sale</option>
                                </select>
                                --><button type="submit"><img src="images/search-icon.png"/>Search</button>
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
<script src="js/index.js"></script>
</body>
</html>
