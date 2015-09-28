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
</head>
<body>
	<section>
		<div class="container-fluid"> 
        	<div class="container">
            	<div class="row">
                	<div class="col-md-5">
                    	 <nav class="nav-list3 paddingTop-6">
                        	<ul>
                               	<li><a href="download-app.html">Download App</a></li>
                                <li><a href="#">Sell/Rent Property</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </nav>
                    </div>
                    <a href="index.php"><div class="col-md-2"><img src="images/logo-w.png" class="logo-w" style="margin-left:0px; width:100%;"/></div></a>
                    <div class="col-md-5">
                    	
                        <nav class="nav-list3 paddingTop-6 con-row">
                        	<ul class="singul">
                            <?php if(isset($_SESSION['cnv_upid']) && $_SESSION['cnv_upid'] != ''){?>
                                <li><a href="convention-profile-list.php"><?php echo ucfirst($_SESSION['user_name']); ?></a></li>
                            <li><a href="logout.php">Log out</a></li><?php } ?>
                                <div class="clearfix"></div>
                            </ul>
                            
                        </nav>
                    </div>
                    <div class="clearfix"></div>
                    
                </div>
            </div>
        </div>