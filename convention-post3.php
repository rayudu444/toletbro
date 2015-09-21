<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['cnv_upid']) || $_SESSION['cnv_upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
include_once('includes/convention_header.php');
?>
<script>
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
     
    });
   
});
</script>
        
        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>POST FOR CONVENTIONS</p>
                               </div>              
        	<div class="container">
          <form method="post" action="dbadd-convention3.php">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                
                               </div>
                                <div class="clearfix"></div>
                   
                    <div class="clearfix"></div>
                </div>

                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Amount</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                        
                            <div class="list-input">
                                 <p class="price-p">Price</p>
                              <div class="input-title" style="margin-top:10px;"><input type="text" id="test1" name="price_per_plate" placeholder="Per plate"></div>
                               <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input" name="deposite"   placeholder="Deposite"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                        
                 
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   
                     <div class="div-subject">
                         <div class="list-check">
                              <div class="sub-change">
                                <input type="checkbox" id="test120" />
                                <label style="" for="test120">Subject to change, contact managerdding</label>
                             </div>
                         </div>
                     </div>
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Negotiable</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" name="negotiable" value="Yes" id="test116">
                                <label for="test116">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" name="negotiable" value="No" id="test117">
                                <label style="float:right;" for="test117">No</label>
                                  </p><div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Price & Other Charges</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                                  
                                  <div class="input-title"><input type="text" name="other_charges" id="test1" placeholder="Other Charges"></div>
                                 <div class="clearfix"></div>  
                                 
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Description</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post1">
                         
                           <textarea rows="10" name="description" cols="10" class="post-textearea"></textarea>
                         
                   </div>
                    <div class="clearfix"></div>
                     <div class="but-submits">
                     <input type="hidden" name="convention_post_id" value="<?=$_REQUEST['last_id']?>">
                    <!--  <a href="post-ad3.html" class="ne-but">Next</a> -->
                     <input type="submit" name="submit" style="float:right;" value="Save">
                       <!-- <input type="button" value="save" style="float:right;">  -->
                       <div class="clearfix"></div>                   
                     </div>
                   
                </div>
                 
                </div>
            </div>
            </form>
        </div>

<?php include_once('includes/footer.php');?>