<?php 
  session_start(); 
  include_once('includes/dbutil.php');  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{

  echo "<script>window.alert('Please Login....')</script>";
  echo "<script>window.location.href='index.php'</script>";exit;
}
include_once('includes/property_header.php');


 if(isset($_GET['message1']))

      {      ?>
    <script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');

$('.close').click(function(){
  $('.popup').hide();
$('.popup').removeClass('width');
overlay.appendTo(document.body).remove();
return false;
});

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
          <div class='popup popup-anim1' id="overlay" style="">
<div class='cnt223'>
<img src='images/close.png' alt='quit' class='x' id='x' style="position:absolute; right:-13px; top:-14px;" />
<p>
<?php if($_GET['message']==1){?>Updated Successfully...<?php }?>

<br/>
<a  class='close'>Ok</a>
<div class="clearfix"></div> 
</p>
</div>
</div>
<?php } ?>



 


<div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">My Account</p>
    </div>
        	<div class="container">
        	
  <body>         
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                    
                <form name="myForm2" method="post" action="update-user-profile.php"   class="cont2-form" >
                              
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                             
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                            <?php $query1= mysql_query("select * from users where upid='".$_SESSION['upid']."'");
                                $user_info=mysql_fetch_array($query1);
                            ?>
                                <div class="input-title"><input type="text" required value="<?=$user_info['user_name']?>" id="test1"  placeholder="Full Name" name="user_name" /></div>
                               <div class="input-title"><input type="text" required value="<?=$user_info['user_mobile']?>" id="test1"  placeholder="Mobile" name="user_mobile" /></div>
                               <div class="input-title"><input type="text" readonly value="<?=$user_info['user_email']?>" id="test1"  placeholder="Email" name="email"/></div>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                 <div class="nex-but">
                     <input type="submit" name="Submit" value="Save" class="ne-but" />
                    <div class="clear"></div>
                 </div>
				  </form>
                </div>
            </div>
        </div>
        
        <?php include("includes/footer.php");?>
    <!-- custom scrollbar plugin -->

	
</body>
</html>
