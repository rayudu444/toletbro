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
  if(isset($_REQUEST['last_id'])){ 
  $query= mysql_query("select * from post_add where post_id='".$_REQUEST['last_id']."'");
  $get_info =mysql_fetch_array($query);
  }
  ?>    
     <?php if(isset($get_info['amenities'])){$amen = explode(",",$get_info['amenities']);}?>
     <?php if(isset($get_info['society_amenities'])){$amenty = explode(",",$get_info['society_amenities']);}?>                 

        
    <div class="container-fluid white-bg1" style="padding:0px">
    <div class="col-md-12 div-pad1">
      <p style="color:#f2635d;">POST AN AD</p>
    </div>                  
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Pets Allowed</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                             <form action="addpostanadd3.php" method="post" class="cont2-form">     
                         <div class="cont2-form">
                            <div class="list-check singlecheck">
                              <p style="width:50%;">
                                <input type="checkbox" <?php echo @($get_info['pets_allowed']=="Yes")?"checked":"";?> id="test45" name="pets" value="Yes"/>
                                <label for="test45">Yes</label>
                              </p>
                              <p style="width:50%; float:right;">
                                <input type="checkbox" id="test46" name="pets" <?php echo @($get_info['pets_allowed']=="No")?"checked":"";?> value="No" />
                                <label style="float:right;" for="test46">No</label>
                                  <div class="clearfix"></div> 
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         </div>
                 
                               
                               </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>For</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check singlecheck" >
                              <p>
                                <input type="checkbox" id="test47" name="rent_for" value="Family Only" <?php echo @($get_info['property_for']=="Family")?"checked":"";?>/>
                                <label for="test47" >Family Only</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test48" name="rent_for" value="Bachelors"<?php echo @($get_info['property_for']=="Bachelor")?"checked":"";?> />
                                <label for="test48" >Bachelors</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test49" name="rent_for" value="Any"<?php echo @($get_info['property_for']=="Any")?"checked":"";?> />
                                <label for="test49" >Any</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Amenities</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test50" name="Amenities[]" value="AC" <?php echo @in_array("AC", $amen)?"checked":""?>/>
                                <label for="test50">AC</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test51" name="Amenities[]" value="TV"<?php echo @in_array("TV", $amen)?"checked":""?> />
                                <label for="test51">TV</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test52" name="Amenities[]" value="Cupboard"<?php echo @in_array("Cupboard", $amen)?"checked":""?> />
                                <label for="test52">Cupboard</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test53" name="Amenities[]" value="Bed" <?php echo @in_array("Bed", $amen)?"checked":""?>/>
                                <label for="test53">Bed</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test661" name="Amenities[]" value="Sofa"<?php echo @in_array("Sofa", $amen)?"checked":""?> />
                                <label for="test661">Sofa</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test55" name="Amenities[]" value="Dining table"<?php echo @in_array("Dining table", $amen)?"checked":""?> />
                                <label for="test55">Dining table</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test56" name="Amenities[]" value="Micro wave"<?php echo @in_array("Micro wave", $amen)?"checked":""?> />
                                <label for="test56">Micro wave</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test57" name="Amenities[]" value="Fridge"<?php echo @in_array("Fridge", $amen)?"checked":""?> />
                                <label for="test57">Fridge</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test58" name="Amenities[]" value="Stove" <?php echo @in_array("Stove", $amen)?"checked":""?>/>
                                <label for="test58">Stove</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test59" name="Amenities[]" value="Washing machine"<?php echo @in_array("Washing machine", $amen)?"checked":""?> />
                                <label for="test59">Washing machine</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test60" name="Amenities[]" value="Servent room"<?php echo @in_array("Servent room", $amen)?"checked":""?> />
                                <label for="test60">Servent room</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test61" name="Amenities[]" value="Securities"<?php echo @in_array("Securities", $amen)?"checked":""?> />
                                <label for="test61">Securities</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test62" name="Amenities[]" value="Electricity backup" <?php echo @in_array("Electricity backup", $amen)?"checked":""?>/>
                                <label for="test62">Electricity backup</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                  <div class="clearfix"></div>
                  
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Society amenities</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test63" name="SocietyAmenities[]" value="Gym"<?php echo @in_array("Gym", $amenty)?"checked":""?> />
                                <label for="test63">Gym</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test64" name="SocietyAmenities[]" value="Swimming pool"<?php echo @in_array("Swimming pool", $amenty)?"checked":""?> />
                                <label for="test64">Swimming pool</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test65" name="SocietyAmenities[]" value="Lift"<?php echo @in_array("Lift", $amenty)?"checked":""?> />
                                <label for="test65">Lift</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test66" name="SocietyAmenities[]" value="Gas pipeline"<?php echo @in_array("Gas pipeline", $amenty)?"checked":""?> />
                                <label for="test66">Gas pipeline </label>
                              </p>
    
                           
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                  
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Description</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post1">
                        
                           <textarea rows="10" cols="10" class="post-textearea" name="pro_description"><?php echo @$get_info['description']?></textarea>
                        
                   </div>
                    <div class="clearfix"></div>
                    
                   
                </div>
                
                  <div class="nex-but">
                  <input type="hidden" name="post_id"  value="<?=$_REQUEST['post']?>" />
                    <input type="submit" name="Next" value="Submit" class="ne-but" />
                    
                 
				  </form>
                     <a  href="post-add2.php?post=<?=$_REQUEST['post']?>" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
            </div>
        </div>
        
  <?php include("includes/footer.php");?>