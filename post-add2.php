<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}include_once('includes/property_header.php');
?>
        
      
   <?php
  if(isset($_REQUEST['post'])){ 
  $query= mysql_query("select * from post_add where post_id='".$_REQUEST['post']."'");
  $get_info =mysql_fetch_array($query);
  }
  ?> 
<?php if(isset($get_info['water_supply'])){$water = explode(",",$get_info['water_supply']);}?>

<div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">POST AN ADD</p>
    </div>            
                                          
        	<div class="container">
              <div class="container-sub3">
            	
<form method="post" action="addpostanadd2.php">
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Amount</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                        
                            <div class="list-input">
                                 <p class="price-p">Price</p>
                                   <div class="input-seats" style="margin-top:10px;">
                              <?php $price_monthly = ($get_info['price_monthly']==0)?"":$get_info['price_monthly'];?>
                                <input type="input" value="<?php echo @$price_monthly?>"   name="monthly" placeholder="Monthly"/>
                             </div>
                               <div class="input-seats" style="margin-top:10px;">
                              <?php $price_deposite = ($get_info['price_deposite']==0)?"":$get_info['price_deposite'];?>
                                <input type="input" value="<?php echo @$price_deposite?>"  name="deposite" placeholder="Deposite"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                                         
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   
                     
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Negotiable</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         <div class="cont2-form">
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" <?php echo @($get_info['negotiable']=="Yes")?"checked":"";?> id="test116"  name="Negotiable" value="Yes">
                                <label for="test116">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" <?php echo @($get_info['negotiable']=="No")?"checked":"";?> id="test117" name="Negotiable" value="No">
                                <label style="float:right;" for="test117">No</label>
                                  </p><div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                         </div>
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Maintenance Charges</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                         
                            <div class="list-input">
                                
                              <!--<div class="input-title" style="margin-top:10px;"><input type="text" id="test1" placeholder="Maintenance Charges"></div>-->
                                <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input" value="<?php echo @$get_info['maintenance_monthly']?>"  name="maintance_month" placeholder="Monthly"/>
                             </div>
                               <div class="input-seats" style="margin-top:10px;">
                              
                                <input type="input" value="<?php echo @$get_info['additional_charges']?>"  name="maintance_additional_charge" placeholder="Price & Other additional Charges" class="cont-inp23"/>
                                
                                <input type="input" value="<?php echo @$get_info['additional_charges1']?>"  name="maintance_additional_charge1" placeholder="" class="cont-inp23"/>
                             </div>

                            <div class="clearfix"></div>   
                           </div>
                         
                 
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Area</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                                  <?php  $plot_area = ($get_info['plot_area']==0)? "": $get_info['plot_area'];?>
                                  <div class="input-title"><input type="text" id="test1"value="<?php echo @$plot_area?>"  placeholder="Plot Area" name="plot_area" class="cont-inp23"></div>
                               <div class="form-1 form-34">
                             
                               <select name="plot_state" >
                                <option value="">--select--</option>
                                <option value="square Feet"<?php echo @($get_info['plot_state']=="square Feet")?"selected":""?>>square Feet</option>
                                <option value="Square Yards" <?php echo @($get_info['plot_state']=="Square Yards")?"selected":""?>>Square Yards</option>
                                <option value="Acres" <?php echo @($get_info['plot_state']=="Acres")?"selected":""?>>Acres</option>
                                <option value="Guntas" <?php echo @($get_info['plot_state']=="Guntas")?"selected":""?>>Guntas</option>
                               </select>
                              
                              </div>
                                 <div class="clearfix"></div>  
                                 
                            <div class="clearfix"></div>   
                           </div>
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Door Facing</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">

                               <div class="form-1 form-34">
                             
                               <select name="facing">
							             <option value="">--select--</option>
                                
                                <option value="North" <?php echo @($get_info['door_facing']=="North")?"selected":""?>>North</option>
                                <option value="East"<?php echo @($get_info['door_facing']=="East")?"selected":""?>>East</option>
                                <option value="West" <?php echo @($get_info['door_facing']=="West")?"selected":""?>>West</option>
                                <option value="South"<?php echo @($get_info['door_facing']=="South")?"selected":""?>>South</option>

                                <option value="North East"<?php echo @($get_info['door_facing']=="North East")?"selected":""?>>North East</option>
                                <option value="North West"<?php echo @($get_info['door_facing']=="North West")?"selected":""?>>North West</option>
                                <option value="South East"<?php echo @($get_info['door_facing']=="South East")?"selected":""?>>South East</option>
                                <option value="South West"<?php echo @($get_info['door_facing']=="South West")?"selected":""?>>South West</option>
                              </select>
                              
                              </div>
                                 <div class="clearfix"></div>  
                                 
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Water Supply</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check ">
                              <p>
                                <input type="checkbox" <?php echo @in_array("Govt", $water)?"checked":""?> id="test131" name="water[]" value="Govt">
                                <label for="test131" >Govt</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test132" name="water[]" value="Bore" <?php echo @in_array("Bore", $water)?"checked":""?>>
                                <label for="test132">Bore</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test133" name="water[]" value="Water tanker" <?php echo @in_array("Water tanker", $water)?"checked":""?>>
                                <label for="test133">Water tanker</label>
                              </p>
                           

                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                 <div class="nex-but">
                    <input type="hidden" name="post_id"  value="<?=$_REQUEST['post']?>" />

                      <input type="submit" name="Next" value="Next" class="ne-but" />
                    
                 
				  </form>
                     <a href="post-add1.php?post=<?=$_REQUEST['post']?>" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
            </div>
        </div>
        
         <?php include("includes/footer.php");?>