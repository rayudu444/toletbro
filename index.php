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
				
    				window.location = 'index.php';
					
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
<script>
	$(document).ready(function(){
		$("#sign-up").validate({
		   rules: {
			emailid: {
			    required: true,
			    email: true,
			    remote:{
					url: "check-email.php",
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
				 
		   	 }
			    
		  
		
		});
	});
</script>
<style>
	.error{
		color: red;
	}
</style>
<?php 
   $is_user_login = 0;
########## Google Settings.. Client ID, Client Secret from https://cloud.google.com/console #############
$google_client_id       = '394341835770-td97u9sunc8rgijgll23pa4brhhs9mk1.apps.googleusercontent.com';
$google_client_secret   = 'ROGTcqICqifViYLujjZJFGi_';
$google_redirect_url    = 'http://localhost/toletbro/index.php'; //path to your script
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
  $user_count=get_row_count_by_condition("users","where user_email='".$email."'");
 
  if($user_count>0)
  {
    $user_info=get_row_by_condition("users","where user_email='".$email."'");
    $_SESSION['user_mobile'] = $user_info['user_mobile'];
    $_SESSION['upid'] = $user_info['upid'];
    $_SESSION['user_name'] = $user_info['user_name'];
    $_SESSION['user_email']  = $user_info['user_email'];
    
    //header("location:http://localhost/safe-wash/index.php");
  }else{ 
    //user is new
    //echo 'Hi '.$user_name.', Thanks for Registering!';
    $user_info1=array('google_id'=>$user_id,'user_name'=>$user_name,'user_email'=>$email);
    $inserted=insertdata($user_info1,"users");
    /*$mysqli->query("INSERT INTO user_profile (google_id, name, email) 
    VALUES ($user_id, '$user_name','$email')");*/
    if($inserted>0){
      if(!isset($_SESSION['user_email']))
      {
        $user_info=get_row_by_condition("users","where user_email='".$email."'");
        $_SESSION['user_mobile'] = $user_info['user_mobile'];
        $_SESSION['upid'] = $user_info['upid'];
        $_SESSION['user_name'] = $user_info['user_name'];
        $_SESSION['user_email']  = $user_info['user_email'];
      }
        
    }

    
    
  }
 
} 
  ?>
   
</head>
<body>
	<section>
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
		        </div>
	        </div>
        </div>
        <div class="container">
        	<div class="row">
            	<div class="col-md-12">
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
	                                <form method="post" id="sign-up" action="userregister.php">
                                        <input type="text" class="required" placeholder="Name" name="username" id="username"/>
                                        <input type="email" class="email" placeholder="Email Id" name="emailid" id="emailid"/>
                                        <input type="text" class="required" placeholder="Mobile Number" name="mobileno" id="mobileno"/>
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
    	<div class="header-banner">
	        <div class="container-fluid">
        	<div class="row">
            	<div class="col-md-8 col-sm-6">
                	<a href="index.php"><img src="images/logo.png" class="logo"/></a>
                </div>
                <div class="col-md-4 col-sm-10 links">
                	
	                   <!--  <li><a href="#test-popup2">Sign Up</a></li>
                        <li><a href="#test-popup" data-effect="mfp-zoom-in">Login</a></li> -->


                        <?php if(isset($_SESSION['upid'])){?>
                     <ul class="list1">
                      <li><a href="my-account.php"><?php echo $_SESSION['user_name']; ?></a></li>
                       <li> <a href="logout.php" >Log out</a></li>
                     <div class="clear"></div>
                    </ul>
                    <?php } else {?>
                    <ul class="list1" id="inline-popups">
                      <li><a href="#test-popup2" class="sing-buts click">Sign Up</a></li>
                        <li><a href="#test-popup" class="click2">Login</a></li>
                    <div class="clear"></div>
                    </ul>
                    <?php }?>

                        
					<div class="clear"></div>
					<div>
		 <?php
			  if(isset($_SESSION['msg'])){
				  echo $_SESSION['msg'];
				  unset($_SESSION['msg']);
			  }
			  ?>
		</div>
                </div>
            </div>
	        </div>
        </div>
		 <div class="clear"></div>
		
		 <div class="clear"></div>
        <div class="container-fluid margin-0">
        	<div class="row margin-0">
                <div>
                    <div class="col-md-6 col-sm-12 margin-0">
                        <ul class="list2">
                            <li class="current"><a href="post-add.php">Post An Ad</a></li>
                            <li><a href="property-listview.php">Rent</a></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 margin-0">
                        <ul class="list2">
                            <li><a href="#">Sale</a></li>
                            <li><a href="convention-centre.php">Convention Centers</a></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pink-div">
	         <div class="row">
            	<div>
                	<h1 class="head1">WELCOME TO TOLET BRO</h1>
                    <p class="para1">
                    To ensure you have a great search experience on Tolet, our Data Scientists are constantly churning numbers and algorithms to bring out new features and tools.
                    </p>
                </div>
                <div class="container margin-top-12">
                	<div class="col-md-6">
                        <h2 class="head2">Lorem Ipsum</h2>
                        <p class="para2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <a href="#" class="button1">Find Your Stay</a>
	                </div>
                </div>
            </div>
        </div>
        <div class="container-fluid grey-div">
        	<div class="container">
	            <div class="row">
	                <div class="inner-div">
    	            	<img src="images/cell.png" class="animateblock right cell"/>
                        <div class="margin-top-40 animateblock left">
	                        <div class="col-md-5 cell-book">
    	                    	<img src="images/icon1.png"/>
	                        </div>
                            <div class="col-md-7">
                        <h2 class="head2">Lorem Ipsum</h2>
                        <p class="para2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <a href="#" class="button1">Find Your Stay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pink-bg-div1 margin-0">
            <div class="pink-bg-div2">
	            <div class="container">
                <div class="row">
                	<div class="inner-div2">
	                    <div class="col-md-6">
                        <div class="animateblock left">
                        <h2 class="head2">Lorem Ipsum</h2>
                        <p class="para2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <a href="#" class="button1">Find Your Stay</a>
                        </div>
	                </div>
	                    <div class="col-md-4 col-xs-offset-2">
                        	<img src="images/hand.png" class="hand animateblock"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container-fluid grey-bg-div1 margin-0">
            <div class="grey-bg-div2">
	            <div class="container">
                <div class="row">
                	<div class="inner-div2">
	                    <div class="col-md-4">
    	                    <h2 class="head3 animateblock top">Total Verified Listings</h2>
                            <span class="span1 animateblock btm">6,98,394</span>
		                </div>
                        <div class="col-md-4">
    	                    <h2 class="head3 animateblock top">New Listings Added</h2>
                            <span class="span1 animateblock btm">6,98,394</span>
		                </div>
                        <div class="col-md-4">
    	                    <h2 class="head3 animateblock top">Happy Home Seekers</h2>
                            <span class="span1 animateblock btm">6,98,394</span>
		                </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container-fluid better-bg-div1 margin-0">
            <div class="better-bg-div2">
	            <div class="container">
                <div class="row">
                	<div class="inner-div2">
                    	<h1 class="head4">A Better Future With Data</h1>
	                    <div class="col-md-3 better-icons-div">
                        	<span class="animateblock left">
                                <h2>Lifestyle Rating</h2>
                                <img src="images/glass.png"/>
                                <div style="clear:both;"></div>
                            </span>
		                </div>
                        <div class="col-md-3 better-icons-div">
                        	<span class="animateblock left">
                                <h2>Price Heat Maps</h2>
                                <img src="images/map.png"/>
                            </span>
		                </div>
                        <div class="col-md-3 better-icons-div">
                        	<span class="animateblock right">
                                <h2>Visibility Index</h2>
                                <img src="images/visible.png"/>
                            </span>
		                </div>
                        <div class="col-md-3 better-icons-div">
                        	<span class="animateblock right">
                                <h2>Demand Supply Map</h2>
                                <img src="images/demand.png"/>
                            </span>
		                </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row margin-top-5">
                	<div class="inner-div2">
                    	<h1 class="head4">OUR Projects</h1>
	                    <div class="col-md-6">
                        	<div class="pink-block-div animateblock left">
                            	<div class="pink-block-inner-div">
                                    <h2>LAND</h2>
                                    <a href="#">Invest in land</a>
                                </div>
                            </div>
		                </div>
                        <div class="col-md-6">
                        	<div class="pink-block-div animateblock right">
                            	<div class="pink-block-inner-div">
                                    <h2>PLOT</h2>
                                    <a href="#">Invest in land</a>
                                </div>
                            </div>
		                </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
	            </div>
            </div>
        </div>
        <div class="container-fluid grey-div">
        	<div class="container">
	            <div class="row">
	                <div class="inner-div margin-top-15">
						<h1 class="head5">Testimonial</h1>
                        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 test-im"><img src="images/test.png" class="img-responsive"></div>
                        <div class="col-md-10 test-para">
                            <h3>Victor Tihai</h3>
                            <h6>January 12, 2014</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                            
                        </div>
                    </div>
                </div>            
            </div> 
            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    
                        <div class="col-md-2 test-im"><img src="images/test.png" class="img-responsive"></div>
                        <div class="col-md-10 test-para">
                            <h3>Victor Tihai</h3>
                            <h6>January 12, 2014</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                            
                        </div>
                    </div>
                </div>            
            </div> 
            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    
                        <div class="col-md-2 test-im"><img src="images/test.png" class="img-responsive"></div>
                        <div class="col-md-10 test-para">
                            <h3>Victor Tihai</h3>
                            <h6>January 12, 2014</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                            
                        </div>
                    </div>
                </div>           
            </div> 
            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    
                        <div class="col-md-2 test-im"><img src="images/test.png" class="img-responsive"></div>
                        <div class="col-md-10 test-para">
                            <h3>Victor Tihai</h3>
                            <h6>January 12, 2014</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                            
                        </div>
                    </div>
                </div>           
            </div> 
        <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <div class="controls">
            <ul class="nav nav1">
                <li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"></a></li>
                <li data-target="#custom_carousel" data-slide-to="1"><a href="#"></a></li>
                <li data-target="#custom_carousel" data-slide-to="2"><a href="#"></a></li>
                <li data-target="#custom_carousel" data-slide-to="3"><a href="#"></a></li>
            </ul>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid brand-bg-div1 margin-0">
            <div class="brand-bg-div2">
	            <div class="container">
                <div class="row">
                	<div class="inner-div2">
                    	<div>
                        	<h1 class="head5">Our Brand Story</h1>
                            <div class="video-div animateblock top">
	                            <iframe width="300" height="200" src="https://www.youtube.com/embed/mXzuCpl2Sfc" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <p class="para3">
                                Download our top-rated app, made just for you!<br/>
                                It’s free, easy and smart.
                            </p>
                        <div class="clearfix margin-top-5"></div>    
                            <div class="col-md-6 app-div1 animateblock left">
                            	<a href="#"><img src="images/apple.png"/></a>
                            </div>
                            <div class="col-md-6 app-div2 animateblock right">
                            	<a href="#"><img src="images/android.png"/></a>
                            </div>
                            <form class="app-form">
                            	<label>
                                	<input type="text" placeholder="Enter Your Mobile Number" class="input1"/>
                                    <button type="submit">Send App Link</button>
                                </label>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container-fluid map-div1 margin-0">
            <div>
	            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15227.585517648882!2d78.45742179999999!3d17.41675975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1438755598982" width="100%" height="1500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
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
