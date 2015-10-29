<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 include_once('includes/inner-header.php');?>
        
        <div class="container-fluid white-bg1" style="padding:0px"> 
            <div class="banner-app">
                 <div class="container">
                    <div class="col-md-12">
                        <div class="col-md-7">
                           <div class="downloadapp-left">
                              <h6>Download our top-rated app, made just for you!<br />
                                   It’s free, easy and smart.</h6>
                               <div class="div-apps">
                               <a href="#test-popandord" class="click2 inline-popups-a"><img src="images/android.png" class="div-app-im1"/></a>
                                  
                                  <a href="#test-popandord1" class="click2 inline-popups-a"><img src="images/apple.png" class="div-app-im2"/></a>
                                  <div class="clearfix"></div>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="hand-app"><img src="images/hand.png"/></div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        
        <?php include("includes/footer.php");?> 
       
	

 <!-- custom scrollbar plugin -->
 
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>

<div id="test-popandord" class="white-popup mfp-with-anim mfp-hide" style="width:400px;">
            
            <div class="col-md-12">
                          <div class="login-div">
                                <div class="clearfix"></div>
                                <div class="login-form">
                                  <form method="post" action="sendlink-mobile.php">
                                  <input type="number" placeholder="please enter mobile" name="mobile"/>
                                    <button type="submit" name="android_submit">send</button>
                                </form>
                                </div>
                                <span></span> </div>
                                
                                 </div>                
                               
                               <div class="clearfix"></div>
                            
                       </div>
                       
                       
                       <div id="test-popandord1" class="white-popup mfp-with-anim mfp-hide" style="width:400px;">            
                        <div class="col-md-12">
                          <div class="login-div">
                                <div class="clearfix"></div>
                                <div class="login-form">
                                  <form method="post" action="sendlink-mobile.php">
                                  <input type="number" placeholder="please enter mobile" name="mobile"/>
                                    <button type="submit" name="ios_submit">send</button>
                                </form>
                                </div><div class="clearfix"></div>
                                 </div>                
                               
                               
                            
                       </div><div class="clearfix"></div></div>
                        
     
    
    
   
<script src="js/jquery.validate.min.js"></script> 

<script type="text/javascript">

        $(document).ready(function(){

           /*$.validator.addMethod("userRegex", function(value, element) {

              return this.optional(element) || /^[A-Za-z][A-Za-z0-9.@-]*$/i.test(value);

          }, "Username does not contains any spaces or special characters.");
*/


         $("#page2").validate({

             rules : {

              mobile : {
        
                required: true,
				number:true,
				 minlength:10,
				 maxlength:10,
              },           
             },

             messages :{

              
              mobile:{

                required : "min  is mandatory",

              },



            }

          });

        });

      </script>    
