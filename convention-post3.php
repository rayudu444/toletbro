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
 <?php
  if(isset($_REQUEST['post'])){ 
  $query= mysql_query("select * from convention_post_add where convention_post_id='".$_REQUEST['post']."'");
  $get_info =mysql_fetch_array($query);
  }
  ?> <?php $price_per_plate = ($get_info['price_per_plate']==0)?"":$get_info['price_per_plate'];
           $deposite = ($get_info['deposite']==0)?"":$get_info['deposite'];
           $other_charges = ($get_info['other_charges']==0)?"":$get_info['other_charges'];
       ?>      
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
                              <div class="input-seats"  style="margin-top:10px;">
                              <i class="fa fa-inr fa-rup"></i>
                              <input type="number"  value="<?php echo @$price_per_plate?>" name="price_per_plate" placeholder="Per plate"></div>
                               <div class="input-seats" style="margin-top:10px;">
                              <i class="fa fa-inr fa-rup"></i>
                                <input type="number" value="<?php echo @$deposite?>" name="deposite"   placeholder="Deposit"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                        
                 
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   
                     <div class="div-subject">
                         <div class="list-check">
                              <div class="sub-change">
                                <input type="checkbox" name="contact_manager" value="Yes" id="test120" />
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
                                <input type="checkbox" <?php echo @($get_info['negotiable']=="Yes")?"checked":"";?> name="negotiable" value="Yes" id="test116">
                                <label for="test116">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" <?php echo @($get_info['negotiable']=="No")?"checked":"";?> name="negotiable" value="No" id="test117">
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
                                  
                                  <div class="input-seats">
                                  <i class="fa fa-inr fa-rup"></i><input type="number" name="other_charges" value="<?php echo @$other_charges?>" id="test1" placeholder="Other Charges"></div>
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
                         
                           <textarea rows="10" name="description" cols="10" class="post-textearea"><?php echo @$get_info['description']?></textarea>
                         
                   </div>
                    <div class="clearfix"></div>
                     <div class="but-submits">
                     <input type="hidden" name="convention_post_id" value="<?=$_REQUEST['post']?>">
                     <input type="submit" name="submit" style="float:right;" value="Save">
                       <a href="convention-post2.php?post=<?= @$_GET['post']; ?>" class="bc-but">Back</a>
                       <div class="clearfix"></div>                   
                     </div>
                   
                </div>
                 
                </div>
            </div>
            </form>
        </div>

<?php include_once('includes/footer.php');?>