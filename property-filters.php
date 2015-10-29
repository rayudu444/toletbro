<script>
$(function() {
$('.box-filters input').click(function () {
    $(this).siblings().attr('class', 'inactive').end().toggleClass('inactive active1');
 $('.box-filters div').addClass('clearfix');
});
});

</script>

 <!----------------price bar-------------->
 <!-- bin/jquery.slider.min.js -->
 <link rel="stylesheet" href="css1/jslider.css" type="text/css">
<link rel="stylesheet" href="css1/jslider.blue.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>

<script type="text/javascript" src="js1/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="js1/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="js1/tmpl.js"></script>
<script type="text/javascript" src="js1/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="js1/draggable-0.1.js"></script>
<script type="text/javascript" src="js1/jquery.slider.js"></script>
<style type="text/css" media="screen">

 .layout { padding: 50px; font-family: Georgia, serif; }
 .layout-slider { margin-bottom:0px; width:100% !important; }
 .layout-slider-settings { font-size: 12px; padding-bottom: 10px; }
 .layout-slider-settings pre { font-family: Courier; }
</style>
<script>
$(function() {
$('.box-filters input').click(function () {
    $(this).siblings().attr('class', 'inactive').end().toggleClass('inactive active1');
 $('.box-filters div').addClass('clearfix');
});
});

</script>

<script>
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
     
    });

  $( ".Bedrooms" ).click(function() {
    
  
  var i = $(this).val();
  
  $('#no_bedroos').val(i);
  
});  
$( ".Bathrooms" ).click(function() {
  
  var j = $(this).val();
  
  $('#no_bathrooms').val(j);
  
});
$( ".balconies" ).click(function() {
  
  var k = $(this).val();
  
  $('#no_balconies').val(k);
  
});  
$( ".parking_2" ).click(function() {
  
  var l = $(this).val();
  
  $('#no_parking2').val(l);
  
});  
$( ".parking_4" ).click(function() {
  
  var m = $(this).val();
  
  $('#no_parking4').val(m);
  
});    



   
});
</script>
<script>
function myFunction() {
  alert("hiiii");
  window.location('property-listview.php');

    //document.getElementById("myForm").empty();
}
</script>
<!-- end -->
 <!----------------price bar-------------->  
<div id="test-popup5" class="white-fileter mfp-with-anim mfp-hide">
					     <div class="container-fluid">
                             <div class="row">
                                    <h3 class="popfilter-h">Fillters</h3>
                                <div class="col-md-12">

                                    <div class="col-md-4 bor-right">
                                    <form method="get" id="pro-filter" action="#">
                                       <div class="fillter-cn-pop">    
                                          <div class="price-rag-pop">
                                               
                                               <div class="container12-post">
                                               <p class="price-heads">Price Range</p>
                                               <div class="clear-90"></div>
                        <div class="layout-slider" style="width:90% !important; margin:auto;">
      <span style="display: inline-block; width:100%; padding: 0 5px;">
      <input id="Slider2" type="slider" name="price" value="<?php echo @($_REQUEST['price'])? $_REQUEST['price'] :'30000.5;60000'?>" /></span>  
    </div>
    <script type="text/javascript" charset="utf-8">
      jQuery("#Slider2").slider({ from: 1000, to: 100000, step: 500, smooth: true, round: 0, dimension: "", skin: "plastic" });
    </script>
                            
                   </div>
                                          
                                          </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">For</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                              <p class="popup-div4">
                                <input type="checkbox"<?php echo @($_REQUEST['property_for']=="Family Only")?"checked":"";?> id="test201" value="Family Only" name="property_for" >
                                <label for="test201">Family</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox"<?php echo @($_REQUEST['property_for']=="Bachelors")?"checked":"";?> id="test202" value="Bachelors" name="property_for">
                                <label for="test202">Bachelor</label>
                                  </p>
                              <p class="popup-div4">
                                <input type="checkbox" <?php echo @($_REQUEST['property_for']=="Any")?"checked":"";?> id="test203" value="Any" name="property_for">
                                <label for="test203">Any</label>
                                  </p>    
                                  <div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Listed By</p>
                                                 
                                               <div class="list-check cont5-form singlecheck">
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" <?php echo @($_REQUEST['listed_by']=="Landlord")?"checked":"";?>  id="test204" value="Landlord" name="listed_by">
                                <label for="test204">Landlord</label>
                              </p>
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" <?php echo @($_REQUEST['listed_by']=="Agent")?"checked":"";?> id="test205" value="Agent" name="listed_by">
                                <label for="test205">Agent</label>
                                  </p>
                                 
                                  <div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Bedrooms</p>
                                                <div class="box-filters box-filters-pop">
                                  <!-- <input class="Bedrooms <?php echo @ ($_REQUEST['bedrooms']==0)?"active1":""?>" type="button" value="0" > -->
                                    <input class="Bedrooms <?php echo @($_REQUEST['bedrooms']==1)?"active1":""?>" type="button" value="1">
                                     <input class="Bedrooms <?php echo @ ($_REQUEST['bedrooms']==2)?"active1":""?>" type="button" value="2">
                                     <input class="Bedrooms <?php echo @ ($_REQUEST['bedrooms']==3)?"active1":""?>" type="button" value="3">
                                       <input class="Bedrooms <?php echo @ ($_REQUEST['bedrooms']==4)?"active1":""?>" type="button" value="4">
                                        <input class="Bedrooms <?php echo @ ($_REQUEST['bedrooms']=="5+")?"active1":""?>" type="button" value="5+">
                                  <div class="inactive clearfix"></div>
								  <input type="hidden" name="bedrooms" id="no_bedroos" value="<?php echo @ $_REQUEST['bedrooms']?>" class="inactive">
                               </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">bathrooms</p>
                                                <div class="box-filters box-filters-pop">
<!--                                    <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==0)?"active1":""?>" type="button" value="0">
 -->                                    <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==1)?"active1":""?>" type="button" value="1">
                                     <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==2)?"active1":""?>" type="button" value="2">
                                     <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==3)?"active1":""?>" type="button" value="3">
                                       <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==4)?"active1":""?>" type="button" value="4">
                                        <input class="Bathrooms <?php echo @ ($_REQUEST['bathrooms']==5)?"active1":""?>" type="button" value="5+">
                                  <div class="clearfix"></div>
								  <input type="hidden" name="bathrooms" id="no_bathrooms" value="<?php echo @ $_REQUEST['bathrooms']?>">
                               </div>
                                            </div>
                                       </div>
                                   </div>
                                    <div class="col-md-4 bor-right">
                                       <p class="price-heads">Parking</p>
                                      <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">2 Wheeler</p>
                                                <div class="box-filters box-filters-pop">
<!--                                    <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']==0)?"active1":""?>" type="button" value="0">
 -->                                    <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']==1)?"active1":""?>" type="button" value="1">
                                     <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']==2)?"active1":""?>" type="button" value="2">
                                     <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']==3)?"active1":""?>" type="button" value="3">
                                       <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']==4)?"active1":""?>" type="button" value="4">
                                        <input class="parking_2 <?php echo @ ($_REQUEST['no_parking2']=="5+")?"active1":""?>" type="button" value="5+">
								  <input type="hidden" name="no_parking2" id="no_parking2" value="<?php echo @ $_REQUEST['no_parking2']?>">
                  <div class="clearfix"></div>
                               </div>
                                            </div>
                                         <div class="container12-post">
                                               <p class="price-heads">4 Wheeler</p>
                                                <div class="box-filters box-filters-pop">
<!--                                    <input class="parking_4<?php echo @ ($_REQUEST['no_parking4']==0)?"active1":""?>" type="button" value="0">
 -->                                    <input class="parking_4<?php echo @ ($_REQUEST['no_parking4']==1)?"active1":""?>" type="button" value="1">
                                     <input class="parking_4<?php echo @ ($_REQUEST['no_parking4']==2)?"active1":""?>" type="button" value="2">
                                     <input class="parking_4<?php echo @ ($_REQUEST['no_parking4']==3)?"active1":""?>" type="button" value="3">
                                       <input class="parking_4 <?php echo @ ($_REQUEST['no_parking4']==4)?"active1":""?>" type="button" value="4">
                                        <input class="parking_4 <?php echo @ ($_REQUEST['no_parking4']=="5+")?"active1":""?>" type="button" value="5+">
								  <input type="hidden" name="no_parking4" id="no_parking4" value="<?php echo @ $_REQUEST['no_parking4']?>">
                  <div class="clearfix"></div>
                               </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop3">    
                                         <div class="container17-post">
                                              <div class="floor-div">
                                                 <p>Furnished status</p>
                                                  <select name="funished_status">
                                <option value="" hidden>Select</option>
                                <option value="Semi Furnished" <?php echo @ ($_REQUEST['funished_status']=="Semi Furnished")?"selected":""?>>Semi Furnished</option>
                                <option value="Fully Funished" <?php echo @ ($_REQUEST['funished_status']=="Fully Furnished")?"selected":""?>>Fully Furnished </option>
                                <option value="Not Furnished" <?php echo @ ($_REQUEST['funished_status']=="Not Furnished")?"selected":""?>>Not Furnished </option>
                              </select>
                                                  <div class="clear"></div>
                                              </div>  
                                            </div>
                                       </div>
                                       
                                       
                                       
                                       <!-- <div class="fillter-cn-pop3">    
                                         <div class="container17-post">
                                              <div class="floor-div">
                                                 <p>Floor No:</p>
                                                  <select>
                                                    <option>select Options</option>
                                                  </select>
                                                  <div class="clear"></div>
                                              </div>  
                                            </div>
                                       </div> -->
                                       
                                       <div class="fillter-cn-pop3">    
                                         <div class="container17-post">
                                              <div class="floor-div">
                                                 <p>Door Facing</p>
                                                 <select name="facing">
                           <option value="" hidden>--select--</option>
                                
                                <option value="North" <?php echo @($_REQUEST['facing']=="North")?"selected":""?>>North</option>
                                <option value="East"<?php echo @($_REQUEST['facing']=="East")?"selected":""?>>East</option>
                                <option value="West" <?php echo @($_REQUEST['facing']=="West")?"selected":""?>>West</option>
                                <option value="South"<?php echo @($_REQUEST['facing']=="South")?"selected":""?>>South</option>

                                <option value="North East"<?php echo @($_REQUEST['facing']=="North East")?"selected":""?>>North East</option>
                                <option value="North West"<?php echo @($_REQUEST['facing']=="North West")?"selected":""?>>North West</option>
                                <option value="South East"<?php echo @($_REQUEST['facing']=="South East")?"selected":""?>>South East</option>
                                <option value="South West"<?php echo @($_REQUEST['facing']=="South West")?"selected":""?>>South West</option>
                              </select>
                                                  <div class="clear"></div>
                                              </div>  
                                            </div>
                                       </div>


                                    
                                   </div>
                                    <div class="col-md-4">
                                        <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Pets Allowed</p>
                                                 
                                               <div class="list-check cont5-form singlecheck">
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" id="test208" <?php echo @($_REQUEST['pets_allowed']=="Yes")?"checked":"";?> value="Yes" name="pets_allowed">
                                <label for="test208">Yes</label>
                              </p>
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" id="test209" <?php echo @($_REQUEST['pets_allowed']=="No")?"checked":"";?> value="No" name="pets_allowed">
                                <label for="test209">No</label>
                                  </p>
                                  
                                  <div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Amenities</p>
                                                 
                                               <div class="list-check cont4-form">
                              <!-- <p class="popup-div4">
                                <input type="checkbox" id="test250" name="Amenities[]" value="AC">
                                <label for="test250">AC</label>
                              </p> -->
                              <p class="popup-div4">
                                <input type="checkbox" id="test50" name="ac" class="amen" value="AC" <?php echo @($_REQUEST['ac']=="AC")?"checked":"";?>/>
                                <label for="test50">AC</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test51" name="tv" class="amen" value="TV"<?php echo @($_REQUEST['tv']=="TV")?"checked":"";?> />
                                <label for="test51">TV</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test52" name="cupboard" class="amen" value="Cupboard"<?php echo @($_REQUEST['cupboard']=="Cupboard")?"checked":"";?> />
                                <label for="test52">Cupboard</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test53" name="bed" class="amen" value="Bed" <?php echo @($_REQUEST['bed']=="Bed")?"checked":"";?>/>
                                <label for="test53">Bed</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test661" name="sofa" class="amen" value="Sofa"<?php echo @($_REQUEST['sofa']=="Sofa")?"checked":"";?> />
                                <label for="test661">Sofa</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test55" name="dining_table" class="amen" value="Dining table"<?php echo @($_REQUEST['dining_table']=="Dining table")?"checked":"";?> />
                                <label for="test55">Dining table</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test56" name="microwave" class="amen" value="Micro wave"<?php echo @($_REQUEST['microwave']=="Micro wave")?"checked":"";?> />
                                <label for="test56">Micro wave</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test57" name="fridge" class="amen" value="Fridge"<?php echo @($_REQUEST['fridge']=="Fridge")?"checked":"";?> />
                                <label for="test57">Fridge</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test58" name="stove" class="amen" value="Stove" <?php echo @($_REQUEST['stove']=="Stove")?"checked":"";?>/>
                                <label for="test58">Stove</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test59" name="waching_machine" class="amen" value="Washing machine"<?php echo @($_REQUEST['waching_machine']=="Washing machine")?"checked":"";?> />
                                <label for="test59">Washing machine</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test60" name="servant_room" class="amen" value="Servent room"<?php echo @($_REQUEST['servant_room']=="Servent room")?"checked":"";?> />
                                <label for="test60">Servent room</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test61" name="security" class="amen" value="Securities"<?php echo @($_REQUEST['security']=="Securities")?"checked":"";?> />
                                <label for="test61">Securities</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test62" name="electricity_backup" class="amen" value="Electricity backup" <?php echo @($_REQUEST['electricity_backup']=="Electricity backup")?"checked":"";?>/>
                                <label for="test62">Electricity backup</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test70" name="pooja_room" class="amen" value="Prayer room/Pooja room" <?php echo @($_REQUEST['pooja_room']=="Prayer room/Pooja room")?"checked":"";?>/>
                                <label for="test70">Prayer room/Pooja room</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test71" name="store_room" class="amen" value="Store room" <?php echo @($_REQUEST['store_room']=="Store room")?"checked":"";?>/>
                                <label for="test71">Store room</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                          
                                  
                                  
                                              <div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Society amenities</p>
                                                 
                                               <div class="list-check cont4-form">
                         
                              
                                 <p class="popup-div4">
                                <input type="checkbox" id="test63" name="gym" value="Gym"<?php echo @($_REQUEST['gym']=="Gym")?"checked":"";?> />
                                <label for="test63">Gym</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test64" name="swimming_pool" value="Swimming pool"<?php echo @($_REQUEST['swimming_pool']=="Swimming pool")?"checked":"";?> />
                                <label for="test64">Swimming pool</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test65" name="lift" value="Lift"<?php echo @($_REQUEST['lift']=="Lift")?"checked":"";?> />
                                <label for="test65">Lift</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test66" name="gas_pipeline" value="Gas pipeline"<?php echo @($_REQUEST['gas_pipeline']=="Gas pipeline")?"checked":"";?> />
                                <label for="test66">Gas pipeline </label>
                              </p>
    
                           
                       
                                  
                                  <div class="clearfix"></div> 
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                   </div>
                                    <div class="clearfix"></div>
                                    <div class="submit-pop">
                                        <label class="go-submit">
                                        <input type="hidden" name="type" value="<?=$_REQUEST['type']?>">
                                           <input type="submit" name="filter_search" value="Go"/>
                                           <!-- <input type="submit" onclick="myFunction()"  value="Reset"/> -->
                                        </label>
                                    </div>
                                </form>
                                </div>
                             </div>
                         </div>
                        <div class="clearfix"></div>
			        </div>
		        </div>