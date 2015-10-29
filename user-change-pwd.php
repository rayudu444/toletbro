<?php 
  session_start(); 
  include_once('includes/dbutil.php');  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{

  echo "<script>window.alert('Please Login....')</script>";
  echo "<script>window.location.href='index.php'</script>";exit;
}
include_once('includes/property_header.php');


 if(isset($_GET['message']))

      {      ?>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
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
<?php if($_GET['message']==1){?>Password Updated Successfully...<?php }?>
<?php if($_GET['message']==2){?>Please provide valid current password ...<?php }?>
<?php if($_GET['message']==3){?>Please try again ...<?php }?>

<br/>
<a  class='close'>Ok</a>
<div class="clearfix"></div> 
</p>
</div>
</div>
<?php } ?>



<div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">Change Password</p>
    </div>
        	<div class="container">
        	
  <body>         
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                    
                <form  method="post" id="page9" action="update_user_pwd.php"   class="cont2-form" >
                              
                    
                </div>
                
                <div class="row">
                             
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">

                                <div class="input-title"><input type="password"   placeholder="Current password" id="current_pwd" name="current_pwd" /></div>
                               <div class="input-title"><input type="password"  placeholder="New Password" name="pwd" /></div>
                               <div class="input-title"><input type="password"   placeholder="Confirm Password" name="confirm_pwd"/></div>
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

<script type="text/javascript">

        $(document).ready(function(){

          

         $("#page9").validate({

             rules : {

              current_pwd : {
        
                required: true,
                remote:
                {
                url: "user-check-pwd.php",
                type:'POST',
                data: {
                  current_pwd : function() 
                        {
                          alert($( "#current_pwd" ).val());
                          return $( "#current_pwd" ).val();
                        }
                      }
                }

              },           
             },

             messages :{
 
              current_pwd : {
                message : "Please provide Current password",
                remote : "please provide correct password"
           
          },

            }

          });

        });

      </script>
