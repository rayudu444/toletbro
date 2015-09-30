<?php
	include_once "includes/dbutil.php";
	
	session_start();
	
	if(isset($_POST['mobile']) && $_POST['mobile'] != '')
	{
		$code = generateRandomString(5);
		$mobile = $_POST['mobile'];
		$msg = "Hi, One time password for tolet bro login is $code";
		$url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=ToletBro&to=".$mobile."&msg=".urlencode($msg)."&type=1&dnd_check=0";
		
		if(file($url))
		{
			$_SESSION['ontime_password'] = $code;
			echo 1;
		}else{
			echo 2;
		}
		
		
	}else{
		echo 3;
	}
	
	
	