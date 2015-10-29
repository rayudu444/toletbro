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
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!----------------price bar-------------->
 <!-- bin/jquery.slider.min.js -->
 <link rel="stylesheet" href="css1/jslider.css" type="text/css">
<link rel="stylesheet" href="css1/jslider.blue.css" type="text/css">
<!-- <script type="text/javascript" src="js/jquery-1.7.1.js"></script> -->

<script type="text/javascript" src="js1/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="js1/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="js1/tmpl.js"></script>
<script type="text/javascript" src="js1/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="js1/draggable-0.1.js"></script>
<script type="text/javascript" src="js1/jquery.slider.js"></script>
<script>
$(function() {
$('.box-filters input').click(function () {
    $(this).siblings().attr('class', 'inactive').end().toggleClass('inactive active1');
 $('.box-filters div').addClass('clearfix');
});
});

</script>
<script>
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
		 
    });
	 
});
</script>


<!-- end -->
 <!----------------price bar-------------->
</head>
<body>
<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <nav class="nav-list3 paddingTop-6">
            <ul>
            <li><a href="index.php">Home</a></li>
              <li><a href="download-app.php">Download App</a></li>
              
              <div class="clearfix"></div>
            </ul>
          </nav>
        </div>
        <div class="col-md-2"><a href="index.php"><img src="images/logo-w.png" class="logo-w logo-width"/></a></div>
        <div class="col-md-5">
          <nav class="nav-list3 paddingTop-6 con-row">
                        	<ul class="singul">
                          <?php if(isset($_SESSION['upid']) && $_SESSION['upid'] != ''){?>
                          <!-- <li><a href="post-add.php">Sell/Rent Property</a></li> -->
							
                               	 <li class="main-menu"><a href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a>
                                    <ul class="sub-menu">
                                      <li><a href="user-profile.php">My Profile</a></li>
                                      <li><a href="property-profile-list.php">Listing</a></li>
                                      <li><a href="#">Shortlisted</a></li>
                                      <li><a href="user-change-pwd.php">Change Password</a></li>
                                   </ul>
                            </li>
							<li><a href="logout.php">Log out</a></li><?php } ?>
                                <div class="clearfix"></div>
                            </ul>
                           
          </nav>
          
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  