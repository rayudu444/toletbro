<?php
session_start();

include_once('includes/dbutil.php');
$url = $_SERVER['HTTP_REFERRER'];
extract($_POST);
$count = get_row_count_by_condition('users','where user_email="'.$user_email.'"');
if($count >0)
{
$user_info = get_row_count_by_condition('users','where user_email="'.$user_email.'"');
//define the subject of the email
$subject = 'Forgot password Reset Link'; 
//define the message to be sent. Each line should be separated with \n
$link =URI."/preset-password.php?userinfo=".base64_encode($user_info['upid']);
$message = "Please click this link and reset your password"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: info@toletbro.com\r\nReply-To: info@toletbro.com";
//send the email
$mail_sent = @mail( $user_email, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed";
if($mail_sent){
echo ("<SCRIPT>
	  
      window.location.href='index.php?message=4';

      </SCRIPT>");
}else{

	echo ("<SCRIPT>
	  window.alert('Please provide Registered Email id')	
      window.location.href='$url?set=3';

      </SCRIPT>");
}
}else{

	echo ("<SCRIPT>
	  window.alert('Please provide Registered Email id')	
      window.location.href='$url?set=3';

      </SCRIPT>");
}





		  
?>