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
<?php
  if(isset($_REQUEST['post'])){ 
  $query= mysql_query("select * from convention_post_add where convention_post_id='".$_REQUEST['post']."'");
  $get_info =mysql_fetch_array($query);
  }
  ?> <?php if(isset($get_info['space_available_for'])){$space = explode(",",$get_info['space_available_for']);}?>
     <?php if(isset($get_info['other_services'])){$other = explode(",",$get_info['other_services']);}?>
     <?php if(isset($get_info['additional_services'])){$additional = explode(",",$get_info['additional_services']);}?>          
       
        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>POST FOR CONVENTIONS</p>
                               </div>  
            <form method="post" action="dbadd-convention2.php">                               
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                  <p>Spaces Available</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                        
                            <div class="list-check">
                              <p>
                                <input type="checkbox"  name="space_available_for[]" value="Kitchen" <?php echo @in_array("Kitchen", $space)?"checked":"" ;?>  id="test1" />
                                <label for="test1">Kitchen</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Dance Floor"<?php echo @in_array("Dance Floor", $space)?"checked":"" ;?> id="test2" />
                                <label for="test2">Dance Floor</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Rest Rooms"<?php echo @in_array("Rest Rooms", $space)?"checked":"" ;?> id="test3" />
                                <label for="test3">Rest Rooms</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Bar" id="test4"<?php echo @in_array("Bar", $space)?"checked":"" ;?> />
                                <label for="test4">Bar</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Gym" id="test5"<?php echo @in_array("Gym", $space)?"checked":"" ;?> />
                                <label for="test5">Gym</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Wash Area" id="test6"<?php echo @in_array("Wash Area", $space)?"checked":"" ;?> />
                                <label for="test6">Wash Area</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Dining Hall" <?php echo @in_array("Dining Hall", $space)?"checked":"" ;?> id="test7" />
                                <label for="test7">Dining Hall</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Rooms" id="test8"<?php echo @in_array("Rooms", $space)?"checked":"" ;?> />
                                <label for="test8">Rooms</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Swimming Pool"<?php echo @in_array("Swimming Pool", $space)?"checked":"" ;?> id="test9" />
                                <label for="test9">Swimming Pool</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Meeting Rooms"<?php echo @in_array("Meeting Rooms", $space)?"checked":"" ;?> id="test10" />
                                <label for="test10">Meeting Rooms</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>other Services</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test11" name="other_services[]" value="Wheel Chair"<?php echo @in_array("Wheel Chair", $other)?"checked":"" ;?> />
                                <label for="test11">Wheel Chair</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test12"  name="other_services[]" value="Escalator" <?php echo @in_array("Escalator", $other)?"checked":"" ;?> />
                                <label for="test12">Escalator</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test13"  name="other_services[]" value="Lift" <?php echo @in_array("Lift", $other)?"checked":"" ;?> />
                                <label for="test13">Lift</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test14"  name="other_services[]" value="Ramp"<?php echo @in_array("Ramp", $other)?"checked":"" ;?> />
                                <label for="test14">Ramp</label>
                              </p>

                            <div class="clearfix"></div>   
                           </div>
                       
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Additional Services</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                       
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test15" name="additional_services[]" value="Catering" <?php echo @in_array("Catering", $additional)?"checked":"" ;?>/>
                                <label for="test15">Catering</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test16" name="additional_services[]" value="Flowerist"<?php echo @in_array("Flowerist", $additional)?"checked":"" ;?> />
                                <label for="test16">Flowerist</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test17" name="additional_services[]" value="Cab / Taxi" <?php echo @in_array("Cab / Taxi", $additional)?"checked":"" ;?>/>
                                <label for="test17">Cab / Taxi</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test18" name="additional_services[]" value="Pandit"<?php echo @in_array("Pandit", $additional)?"checked":"" ;?> />
                                <label for="test18">Pandit</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test19" name="additional_services[]" value="DJ"<?php echo @in_array("DJ", $additional)?"checked":"" ;?> />
                                <label for="test19">DJ</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test20" name="additional_services[]" value="Band"<?php echo @in_array("Band", $additional)?"checked":"" ;?> />
                                <label for="test20">Band</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test21" name="additional_services[]" value="Astrologer"<?php echo @in_array("Astrologer", $additional)?"checked":"" ;?> />
                                <label for="test21">Astrologer</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test22" name="additional_services[]" value="Decorators"<?php echo @in_array("Decorators", $additional)?"checked":"" ;?> />
                                <label for="test22">Decorators</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test23" name="additional_services[]" value="Gifts"<?php echo @in_array("Gifts", $additional)?"checked":"" ;?> />
                                <label for="test23">Gifts</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test24" name="additional_services[]" value="Photographers"<?php echo @in_array("Photographers", $additional)?"checked":"" ;?> />
                                <label for="test24">Photographers</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test25" name="additional_services[]" value="Beauty & Grooming" <?php echo @in_array("Beauty & Grooming", $additional)?"checked":"" ;?>/>
                                <label for="test25">Beauty & Grooming</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test26" name="additional_services[]" value="Securities"<?php echo @in_array("Securities", $additional)?"checked":"" ;?> />
                                <label for="test26">Securities</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test27" name="additional_services[]" value="Videographers"<?php echo @in_array("Videographers", $additional)?"checked":"" ;?> />
                                <label for="test27">Videographers</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test28" name="additional_services[]" value="Lighting"<?php echo @in_array("Lighting", $additional)?"checked":"" ;?> />
                                <label for="test28">Lighting</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test29"name="additional_services[]" value="Cleaning"<?php echo @in_array("Cleaning", $additional)?"checked":"" ;?> />
                                <label for="test29">Cleaning</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test30" name="additional_services[]" value="Choreographers"<?php echo @in_array("Choreographers", $additional)?"checked":"" ;?> />
                                <label for="test30">Choreographers</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="class="nex-but"">
                 <input type="hidden" name="convention_post_id" value="<?=$_REQUEST['post']?>">
                    <!--  <a href="post-ad3.html" class="ne-but">Next</a> -->
                     <input type="submit" name="submit" class="ne-but" value="NEXT">
                     <a href="convention-post1.php?post=<?= @$_GET['post']; ?>" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
            </div>
            </form>
        </div>
        
   <?php include_once('includes/footer.php');?>     