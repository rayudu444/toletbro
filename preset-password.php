<?php 
include_once('includes/dbutil.php');  
include_once('includes/inner-header.php');
?>  
<div class="container-fluid white-bg1" style="padding:0px">
    <!-- <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">Reset Password</p>
    </div> -->
        	<div class="container">
        	
  <body>         
              <div class="container-sub3">
            	
                
                
                <form method="post" action="pupdate-pwd.php">
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Reset Password</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                            
                                <div class="input-title"><input type="password"    placeholder="Password" name="password" /></div>
                               <div class="input-title"><input type="password"    placeholder="Confirm Password" name="cpassword" /></div>
                               <div class="input-title"><input type="hidden"   name="upid" value="<?=base64_decode($_REQUEST['userinfo'])?>" /></div>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                 <div class="nex-but">
                     <input type="submit" name="submit" value="Submit" id="upload" class="ne-but" />
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
