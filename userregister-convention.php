<?php
session_start();
include_once('includes/dbutil.php');
extract($_POST);
$count = get_row_count_by_condition('convention_users','where user_email="'.$emailid.'"');
if($count == 0)
{
if($password != $conformpassword){
$_SESSION['msg']='<div style="color:green">password and conform password not match....</div>';
	header('location:index.php');
	exit;
}
$password1 = md5($password);
$usrData = array('user_name'=>$username,
                  'user_email'=>$emailid,
				  'user_mobile'=>$mobileno,
				  'password'=>$password1);
$user = insertdata($usrData,'convention_users');
if($user){
$_SESSION['msg']='<div style="color:green">User successfully registered....</div>';
	header('location:index.php');
	
	/*echo ("<SCRIPT LANGUAGE='JavaScript'> 
	window.alert('vendor created  successfully...');
	window.location.href='index.php';</SCRIPT>");*/
}
else{
	$_SESSION['msg']='<div style="color:red">User not registered....</div>';
	header('location:index.php');
	
	/*echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.alert('You entered incorrect Username or Password ')

    window.location.href='index.php';

    </SCRIPT>");*/
}	
}
else{
	$_SESSION['msg']='<div style="color:red">User all ready registered....</div>';
	header('location:index.php');
	
	/*echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.alert('You entered incorrect Username or Password ')

    window.location.href='index.php';

    </SCRIPT>");*/
}		  
?>