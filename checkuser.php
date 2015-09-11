<?php

    session_start();

	include("includes/dbutil.php"); 

	$uname = $_POST['user_email'];

	$pwd = md5($_POST['password']);

	

$cond="where user_email='$uname' and password='$pwd'";

 $count1=get_row_count_by_condition('users',$cond);



if($count1>0){

	

$row1=get_row_by_condition('users',$cond);

$_SESSION['upid']=$row1['upid'];

$_SESSION['user_name']=$row1['user_name'];

echo ("<SCRIPT LANGUAGE='JavaScript'>
		  window.location.href='index.php';</SCRIPT>");
	

}

else

{

echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.alert('You entered incorrect Username or Password ')

    window.location.href='index.php';

    </SCRIPT>");

}

?>