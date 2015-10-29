<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}include_once('includes/property_header.php');
?>
   <script type="text/javascript" src="js/jquery.validate.js"></script>
    <?php
  if(isset($_REQUEST['post'])){ 
  $query= mysql_query("select p.pets_allowed, p.property_for,paa.* from post_add p INNER JOIN post_add_amenties paa on paa.post_id=p.post_id where p.post_id='".$_REQUEST['post']."'");
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
                             <form action="addpostanadd3.php" id="postadd3" method="post" class="cont2-form">     
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
                                <input type="checkbox" id="test48" name="rent_for" value="Bachelors" <?php echo @($get_info['property_for']=="Bachelor")?"checked":"";?> />
                                <label for="test48" >Bachelors</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test49" name="rent_for" value="Any" <?php echo @($get_info['property_for']=="Any")?"checked":"";?> />
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
                                <input type="checkbox" id="test50" name="ac" class="amen" value="AC" <?php echo @($get_info['ac']=="AC")?"checked":"";?>/>
                                <label for="test50">AC</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test51" name="tv" class="amen" value="TV"<?php echo @($get_info['tv']=="TV")?"checked":"";?> />
                                <label for="test51">TV</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test52" name="cupboard" class="amen" value="Cupboard"<?php echo @($get_info['cupboard']=="Cupboard")?"checked":"";?> />
                                <label for="test52">Cupboard</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test53" name="bed" class="amen" value="Bed" <?php echo @($get_info['bed']=="Bed")?"checked":"";?>/>
                                <label for="test53">Bed</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test661" name="sofa" class="amen" value="Sofa"<?php echo @($get_info['sofa']=="Sofa")?"checked":"";?> />
                                <label for="test661">Sofa</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test55" name="dining_table" class="amen" value="Dining table"<?php echo @($get_info['dining_table']=="Dining table")?"checked":"";?> />
                                <label for="test55">Dining table</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test56" name="microwave" class="amen" value="Micro wave"<?php echo @($get_info['microwave']=="Micro wave")?"checked":"";?> />
                                <label for="test56">Micro wave</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test57" name="fridge" class="amen" value="Fridge"<?php echo @($get_info['fridge']=="Fridge")?"checked":"";?> />
                                <label for="test57">Fridge</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test58" name="stove" class="amen" value="Stove" <?php echo @($get_info['stove']=="Stove")?"checked":"";?>/>
                                <label for="test58">Stove</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test59" name="waching_machine" class="amen" value="Washing machine"<?php echo @($get_info['waching_machine']=="Washing machine")?"checked":"";?> />
                                <label for="test59">Washing machine</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test60" name="servent_room" class="amen" value="Servent room"<?php echo @($get_info['servent_room']=="Servent room")?"checked":"";?> />
                                <label for="test60">Servent room</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test61" name="security" class="amen" value="Securities"<?php echo @($get_info['security']=="Securities")?"checked":"";?> />
                                <label for="test61">Securities</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test62" name="electricity_backup" class="amen" value="Electricity backup" <?php echo @($get_info['electricity_backup']=="Electricity backup")?"checked":"";?>/>
                                <label for="test62">Electricity backup</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test70" name="pooja_room" class="amen" value="Prayer room/Pooja room" <?php echo @($get_info['pooja_room']=="Prayer room/Pooja room")?"checked":"";?>/>
                                <label for="test70">Prayer room/Pooja room</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test71" name="store_room" class="amen" value="Store room" <?php echo @($get_info['store_room']=="Store room")?"checked":"";?>/>
                                <label for="test71">Store room</label>
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
                                <input type="checkbox" id="test63" name="gym" value="Gym"<?php echo @($get_info['gym']=="Gym")?"checked":"";?> />
                                <label for="test63">Gym</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test64" name="swimming_pool" value="Swimming pool"<?php echo @($get_info['swimming_pool']=="Swimming pool")?"checked":"";?> />
                                <label for="test64">Swimming pool</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test65" name="lift" value="Lift"<?php echo @($get_info['lift']=="Lift")?"checked":"";?> />
                                <label for="test65">Lift</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test66" name="gas_pipeline" value="Gas pipeline"<?php echo @($get_info['gas_pipeline']=="Gas pipeline")?"checked":"";?> />
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


  <script type="text/javascript">
        $.validator.addMethod('onecheck', function(value, ele) {


            return $("input:checked").length >= 1;
        }, 'Please Select Atleast One CheckBox')

        $(document).ready(function() {
            $("#postadd3").validate({
                rules: {

              pets : "required", 
              rent_for :"required", 
              'Amenities[]':{
                required: true,
                onecheck: true,
              }, 
              'SocietyAmenities[]':{
               required: true,
                onecheck: true,
              },        
               
          },


             messages: {

           
            pets : "Please select pets allowed",


            rent_for : "Please select facing",
            'Amenities[]' : "Please select one amenity",
            'SocietyAmenities[]':"Please select one amenity",

 
                },

                /*errorPlacement: function(error, element) {
                    error.appendTo('#err');
                }*/
            });
        });
    </script>