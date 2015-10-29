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
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
     
    });

   
});
</script>

<!-- end -->
 <!----------------price bar-------------->  
<div id="test-popup5" class="white-fileter mfp-with-anim mfp-hide">
					     <div class="container-fluid">
                             <div class="row">
                                    <h3 class="popfilter-h">Fillters Convention</h3>
                                <div class="col-md-12">
                                    <div class="col-md-4 bor-right">
                                      
                                      <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Date</p>
            <div class="book-appointment-div book-appointment-div-pop">
          <form>
              <label>
                    <input type="text" name="date" placeholder="Select Date" id="datepicker" readonly>
                    <img src="images/calendar-icon.png" class="cal-box"/>
                    <div class="clear"></div>        
               </label>
              <div class="clear"></div>
                  
            </form>
            
          <div class="clear"></div>
        </div>
         
        
                                            </div>
                                       </div>
                                       <div class="fillter-cn-pop">    
                                          <div class="price-rag-pop">
                                               
                                               <div class="container12-post">
                                               <p class="price-heads">Price List</p>
                                               <div class="clear-90"></div>
                        <div class="layout-slider" style="width:90% !important; margin:auto;">
      <span style="display: inline-block; width:100%; padding: 0 5px;"><input id="Slider1" type="slider" name="price" value="30000.5;60000" /></span>  
    </div>
    <script type="text/javascript" charset="utf-8">
      jQuery("#Slider1").slider({ from: 1000, to: 100000, step: 500, smooth: true, round: 0, dimension: "", skin: "plastic" });
    </script>
                            
                   </div>
                                          
                                          </div>
                                       </div>
                                       
                                       
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads"></p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                              <p class="popup-div4" style="width:50%; text-align:center;">
                                <input type="checkbox" id="test204" value="Landlord" name="listed">
                                <label for="test204">Ac</label>
                              </p>
                              <p class="popup-div4" style="width:50%; text-align:center;">
                                <input type="checkbox" id="test205" value="Agent" name="listed">
                                <label for="test205">Non-Ac</label>
                                  </p>
                                 
                                  <div class="clearfix"></div> 
                             
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Seating Capacity</p>
                                                <div class="box-filters-pop">
                                                      <div class="max-inpu">
                                                          <span>Minimum</span>
                                                          <input type="text" placeholder="90" />
                                                          <div class="clearfix"></div>
                                                      </div>
                                                       <div class="max-inpu">
                                                          <span>Miximum</span>
                                                          <input type="text" placeholder="300" />
                                                          <div class="clearfix"></div>
                                                      </div>
                                                      <div class="max-inpu">
                                                          <span>Floating</span>
                                                          <input type="text" placeholder="90" />
                                                          <div class="clearfix"></div>
                                                      </div>
                                                      <div class="max-inpu">
                                                          <span>Dining Capacity</span>
                                                          <input type="text" placeholder="390" />
                                                          <div class="clearfix"></div>
                                                      </div>
                                                      <div class="clearfix"></div>
                                                </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Food & Drink</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                              <p class="popup-div4">
                                <input type="checkbox" id="test264" value="Landlord" name="listed">
                                <label for="test264">Veg</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test265" value="Agent" name="listed">
                                <label for="test265">Non-Veg</label>
                                  </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test266" value="Agent" name="listed">
                                <label for="test266">Alcohol</label>
                                  </p>    
                                  <div class="clearfix"></div> 
                              
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Parking</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                              <p class="popup-div4" style="text-align:center; float:none !important; margin:5px auto;">
                                <input type="checkbox" id="test268" value="Landlord" name="listed">
                                <label for="test268">Valet Parking</label>
                              </p>
                             
                                  
                                  <div class="clearfix"></div> 
                             
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                   </div>
                                    
                                    <div class="col-md-4 bor-right">
                                        
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Hall IdeallY Suited For</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                                                   
                              <p class="popup-div4">
                                <input type="checkbox" id="test270" name="Amenities[]" value="AC">
                                <label for="test270">Wedding</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test271" name="Amenities[]" value="TV">
                                <label for="test271">Receptions</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test272" name="Amenities[]" value="Cupboard">
                                <label for="test272">Engagement</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test273" name="Amenities[]" value="Bed">
                                <label for="test273">Birthday</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test274" name="Amenities[]" value="Sofa">
                                <label for="test274">Anniversary</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test275" name="Amenities[]" value="Dining table">
                                <label for="test275">Baptism</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test276" name="Amenities[]" value="Micro wave">
                                <label for="test276">Corporate events</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test277" name="Amenities[]" value="Fridge">
                                <label for="test277">Get together</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test278" name="Amenities[]" value="Stove">
                                <label for="test278">Bachelor party</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test279" name="Amenities[]" value="Washing machine">
                                <label for="test279">Washing machine</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test280" name="Amenities[]" value="Servent room">
                                <label for="test280">Business purpose</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test281" name="Amenities[]" value="Securities">
                                <label for="test281">Conference</label>
                              </p>
                              <p class="popup-div4" style="width:40%;">
                                <input type="checkbox" id="test282" name="Amenities[]" value="Electricity backup">
                                <label for="test282">Naming ceremonies</label>
                              </p>
                               <p class="popup-div4">
                                <input type="checkbox" id="test283" name="Amenities[]" value="Electricity backup">
                                <label for="test283">Others</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                          
                                  
                                  
                                              <div class="clearfix"></div> 
                            
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Technology & Equipment</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                         
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" id="test288" name="SocietyAmenities[]" value="Gym">
                                <label for="test288">Power Backup/Generator</label>
                              </p>
                              <p class="popup-div4" style="width:50%;">
                                <input type="checkbox" id="test284" name="SocietyAmenities[]" value="Swimming pool">
                                <label for="test284">Projector</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test285" name="SocietyAmenities[]" value="Lift">
                                <label for="test285">Internet & Wi-Fi </label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test286" name="SocietyAmenities[]" value="Gas pipeline">
                                <label for="test286">Gas pipeline </label>
                              </p>
                               
                               <p class="popup-div4">
                                <input type="checkbox" id="test287" name="SocietyAmenities[]" value="Gas pipeline">
                                <label for="test287">Mike </label>
                              </p>
    
                           
                       
                                  
                                  <div class="clearfix"></div> 
                             <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Other Facilities </p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                         
                              <p class="popup-div4">
                                <input type="checkbox" id="test388" name="SocietyAmenities[]" value="Gym">
                                <label for="test388">Wheel Chair</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test384" name="SocietyAmenities[]" value="Swimming pool">
                                <label for="test384">Escalator</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test385" name="SocietyAmenities[]" value="Lift">
                                <label for="test385">Lift</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test386" name="SocietyAmenities[]" value="Gas pipeline">
                                <label for="test386">Ramp</label>
                              </p>
                               
                               <p class="popup-div4">
                                <input type="checkbox" id="test387" name="SocietyAmenities[]" value="Gas pipeline">
                                <label for="test387">Mike </label>
                              </p>
    
                           
                       
                                  
                                  <div class="clearfix"></div> 
                             <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                   </div>
                                   
                                    <div class="col-md-4">
                                        <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Spaces Available</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                                                  <p class="popup-div4">
                                <input type="checkbox" id="test290" name="Amenities[]" value="AC">
                                <label for="test290">Kitchen</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test291" name="Amenities[]" value="TV">
                                <label for="test291">Dance Floor</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test292" name="Amenities[]" value="Cupboard">
                                <label for="test292">Rest Rooms</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test293" name="Amenities[]" value="Bed">
                                <label for="test293">Bar</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test294" name="Amenities[]" value="Sofa">
                                <label for="test294">Gym</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test295" name="Amenities[]" value="Dining table">
                                <label for="test295">Wash Area</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test296" name="Amenities[]" value="Micro wave">
                                <label for="test296">Dining Hall</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test297" name="Amenities[]" value="Fridge">
                                <label for="test297">Rooms</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test298" name="Amenities[]" value="Stove">
                                <label for="test298">Swimming Pool</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test299" name="Amenities[]" value="Washing machine">
                                <label for="test299">Meeting Rooms</label>
                              </p>
                            
                                  
                                  <div class="clearfix"></div> 
                              <p></p>
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       <div class="fillter-cn-pop2">    
                                         <div class="container12-post">
                                               <p class="price-heads">Pets Allowed</p>
                                                 
                                               <div class="list-check cont4-form singlecheck">
                                                   
                              <p class="popup-div4">
                                <input type="checkbox" id="test350" name="Amenities[]" value="AC">
                                <label for="test350">Catering</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test351" name="Amenities[]" value="TV">
                                <label for="test351">Flowerist</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test352" name="Amenities[]" value="Cupboard">
                                <label for="test352">Cab / Taxi</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test353" name="Amenities[]" value="Bed">
                                <label for="test353">Pandit</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test354" name="Amenities[]" value="Sofa">
                                <label for="test354">DJ</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test355" name="Amenities[]" value="Dining table">
                                <label for="test355">Band</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test356" name="Amenities[]" value="Micro wave">
                                <label for="test356">Astrologer</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test357" name="Amenities[]" value="Fridge">
                                <label for="test357">Decorators</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test358" name="Amenities[]" value="Stove">
                                <label for="test358">Gifts</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test359" name="Amenities[]" value="Washing machine">
                                <label for="test359">Photographers</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test360" name="Amenities[]" value="Servent room">
                                <label for="test360">Beauty & Grooming</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test361" name="Amenities[]" value="Securities">
                                <label for="test361">Videographers</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test362" name="Amenities[]" value="Electricity backup">
                                <label for="test362">Lighting</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test363" name="Amenities[]" value="Electricity backup">
                                <label for="test363">Choreographers</label>
                              </p>
                              <p class="popup-div4">
                                <input type="checkbox" id="test364" name="Amenities[]" value="Electricity backup">
                                <label for="test364">Cleaning</label>
                              </p>
                             
                            <div class="clearfix"></div>   
                          
                                  
                                  
                                              <div class="clearfix"></div> 
                              <p></p>
                              <p></p>
                            <div class="clearfix"></div>   
                           </div>
                                            </div>
                                       </div>
                                       
                                       
                                   </div>
                                    <div class="clearfix"></div>
                                     
                                    </div>
                                    
                                    <div class="submit-pop">
                                        <label class="go-submit">
                                           <input type="submit" value="Submit"/ style="width:80px;">
                                        </label>
                                    </div>
                                </div>
                             </div>
                        <div class="clearfix"></div>
			        </div>
		        </div>