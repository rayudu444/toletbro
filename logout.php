<?php
	session_start();
	session_unset();
	header('location: index.php');
	if(isset($_SESSION['token'])){ 
		unset($_SESSION['token']);
	}
	
	
?>