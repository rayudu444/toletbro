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
<script type="text/javascript" src="js/bootstrap.js"></script>

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
<body>
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
	                                <form method="post" action="userregister-convention.php">
                                        <input type="text" placeholder="Name" name="username" id="username"/>
                                        <input type="email" placeholder="Email Id" name="emailid" id="emailid"/>
                                        <input type="text" placeholder="Mobile Number" name="mobileno" id="mobileno"/>
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
		<div class="container-fluid top-header">
        	<div class="container">
                <div class="row">
	                <div class="links">
                    	<ul id="inline-popups">
                    		<!-- <li><a href="#test-popup2" class="sing-buts click">Sign Up</a></li>
                        	<li><a href="#test-popup" class="click2">Login</a></li> -->
	                   		<li><a href="#test-popup" class="click2" data-effect="mfp-zoom-in">Convention Center Login</a></li>
                     		<li><a href="#test-popup2" class="sing-buts click" data-effect="mfp-zoom-in">Convention Center Signup</a></li>

                              <div class="clearfix"></div>
                        </ul>
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
                        <form class="form1">
                        	<label>
                            	<img src="images/map-icon.png" class="map-icon"/>
                            	<input type="text" placeholder="Search by locality or landmark or building"/>
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
