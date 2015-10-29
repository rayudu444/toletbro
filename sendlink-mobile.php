<?php
	include_once "includes/dbutil.php";
	
	session_start();
	
	if(isset($_POST['android_submit']))
	{
		$code = "https://www.google.co.in/?gfe_rd=cr&ei=tNIgVuOSLdCCvATwsrHQDg";
		$mobile = $_POST['mobile'];
		$msg = "Hi, click link to goto google website  $code";
		$url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=ToletBro&to=".$mobile."&msg=".urlencode($msg)."&type=1&dnd_check=0";
		
		if(file($url))
		{
			header("location:download-app.php?mes=link send successfully");
	    }
	}
	
	if(isset($_POST['ios_submit']))
	{
		$code = "http://www.apple.com/in/";
		$mobile = $_POST['mobile'];
		$msg = "Hi, click link to goto apple webiste  $code";
		$url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=ToletBro&to=".$mobile."&msg=".urlencode($msg)."&type=1&dnd_check=0";
		
		if(file($url))
		{
			header("location:download-app.php?mes=link send successfully");
	    }
	}
	