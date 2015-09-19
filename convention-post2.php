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
                                <input type="checkbox" name="space_available_for[]" value="Kitchen" id="test1" />
                                <label for="test1">Kitchen</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Dance Floor" id="test2" />
                                <label for="test2">Dance Floor</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Rest Rooms" id="test3" />
                                <label for="test3">Rest Rooms</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Bar" id="test4" />
                                <label for="test4">Bar</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Gym" id="test5" />
                                <label for="test5">Gym</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Wash Area" id="test6" />
                                <label for="test6">Wash Area</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Dining Hall"  id="test7" />
                                <label for="test7">Dining Hall</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Rooms" id="test8" />
                                <label for="test8">Rooms</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Swimming Pool" id="test9" />
                                <label for="test9">Swimming Pool</label>
                              </p>
                              <p>
                                <input type="checkbox" name="space_available_for[]" value="Meeting Rooms" id="test10" />
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
                                <input type="checkbox" id="test11" name="other_services[]" value="Wheel Chair" />
                                <label for="test11">Wheel Chair</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test12"  name="other_services[]" value="Escalator" />
                                <label for="test12">Escalator</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test13"  name="other_services[]" value="Lift" />
                                <label for="test13">Lift</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test14"  name="other_services[]" value="Ramp" />
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
                                <input type="checkbox" id="test15" name="additional_services[]" value="Catering" />
                                <label for="test15">Catering</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test16" name="additional_services[]" value="Flowerist" />
                                <label for="test16">Flowerist</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test17" name="additional_services[]" value="Cab / Taxi" />
                                <label for="test17">Cab / Taxi</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test18" name="additional_services[]" value="Pandit" />
                                <label for="test18">Pandit</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test19" name="additional_services[]" value="DJ" />
                                <label for="test19">DJ</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test20" name="additional_services[]" value="Band" />
                                <label for="test20">Band</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test21" name="additional_services[]" value="Astrologer" />
                                <label for="test21">Astrologer</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test22" name="additional_services[]" value="Decorators" />
                                <label for="test22">Decorators</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test23" name="additional_services[]" value="Gifts" />
                                <label for="test23">Gifts</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test24" name="additional_services[]" value="Photographers" />
                                <label for="test24">Photographers</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test25" name="additional_services[]" value="Beauty & Grooming" />
                                <label for="test25">Beauty & Grooming</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test26" name="additional_services[]" value="Securities" />
                                <label for="test26">Securities</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test27" name="additional_services[]" value="Videographers" />
                                <label for="test27">Videographers</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test28" name="additional_services[]" value="Lighting" />
                                <label for="test28">Lighting</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test29"name="additional_services[]" value="Cleaning" />
                                <label for="test29">Cleaning</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test30" name="additional_services[]" value="Choreographers" />
                                <label for="test30">Choreographers</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="class="nex-but"">
                 <input type="hidden" name="convention_post_id" value="<?=$_REQUEST['last_id']?>">
                    <!--  <a href="post-ad3.html" class="ne-but">Next</a> -->
                     <input type="submit" name="submit" class="ne-but" value="NEXT">
                     <a href="postad1.html" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
            </div>
            </form>
        </div>
        
   <?php include_once('includes/footer.php');?>     