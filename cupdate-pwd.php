<?php 
include_once('includes/dbutil.php');
$url =$_SERVER['HTTP_REFERER'];  
if (isset($_POST['submit'],$_POST['cnv_upid'])) {
	extract($_POST);
$count = get_row_count_by_condition('convention_users','where cnv_upid="'.$cnv_upid.'"');
if($count>0){
	$pwd=md5($password);
	$usrdata =array('password'=>$pwd);
	$isupdated=update($usrdata,"convention_users","where cnv_upid=$cnv_upid");
	if($isupdated){
	echo ("<SCRIPT>
		window.alert('Please try again');
      window.location.href='index.php?message=3';

      </SCRIPT>");
	}else{
		echo ("<SCRIPT>
		window.alert('Please try again');
      window.location.href='$url?set=3';

      </SCRIPT>");
	}

}else{
echo ("<SCRIPT>
		window.alert('Please try again');
      window.location.href='$url?set=3';

      </SCRIPT>");
}	
}else{
echo ("<SCRIPT>
		window.alert('Please try again');
      window.location.href='$url?set=3';

      </SCRIPT>");
}
?>