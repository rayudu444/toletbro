<?php
	include_once "includes/dbutil.php";
	session_start();
	
	if(isset($_POST['code']) && $_POST['code'] != "" )
	{
		$pass = trim((string)$_SESSION['ontime_password']);
		$onepass = trim((string)$_POST['code']);
		
	
		if(!strcasecmp($pass, $onepass)  )
		{
			echo 1;
			
		}else{
			echo 2;
		}
	}
	
	