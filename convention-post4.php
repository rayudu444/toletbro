<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  include_once('includes/convention_header.php');

  ?>
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/smoothness/jquery-ui.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>



        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p style="color:#f2635d;">POST AN CONVENTION ADD</p>
                               </div>   
                               <div class="clearfix"></div>           
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">

                   <div class="container-post">
                                       <div class="visiable-cal">
                                          
                                          <div class="date-pick3">
                                           <div id="calendar"></div>
<script>
$(document).ready(function(){
   
   $(".singlecheck :checkbox").on('change', function () {
        $('[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
     
    });
   
});
</script>

                                           <script type="text/javascript">


    jQuery(document).ready(function() {
        
        // An array of dates
        var eventDates = {};
        eventDates[ new Date( '12/04/2015' )] = new Date( '12/04/2015' );
        eventDates[ new Date( '12/06/2014' )] = new Date( '12/06/2014' );
        eventDates[ new Date( '12/20/2014' )] = new Date( '12/20/2014' );
        eventDates[ new Date( '12/25/2014' )] = new Date( '12/25/2014' );
        
        // datepicker
        jQuery('#calendar').datepicker({
            beforeShowDay: function( date ) {
                var highlight = eventDates[date];
                if( highlight ) {
                     return [true, "event", highlight];
                } else {
                     return [true, '', ''];
                }
             }
        });
    });
</script>
<style type="text/css">
  #calendar {
    margin-top: 40px;
}
    
.event a {
    background-color: #42B373 !important;
    background-image :none !important;
    color: #ffffff !important;
}
</style>
                                        </div>
                                          <div class="mrng-but">
                                             <a href="">Morning</a>
                                             <a href="">Evening</a>
                                             <div class="clearfix"></div>
                                          </div>
                                            
                                           <div class="clearfix"></div> 
                                          </div>
                                          <form method="post" action="add_convention_date.php">
                                       <div class="list-check">
                                        <div class="input-title"><input type="text" name="name" id="test1" placeholder="Name"></div>
                                       <div class="input-title"><input type="text" id="test1" name="mobile" placeholder="Mobile No"></div>
                                       <div class="input-title"><input type="text" id="test1" name="email" placeholder="Email"></div>
                                       <div class="input-title"><input type="text" id="test1" name="event" placeholder="Event"></div>
                                       <div class="list-check singlecheck">
                                 <h6>Advance paid</h6>
                              <p style="width:100px;">
                                <input type="checkbox" id="test115" name="advance_paid" value="Yes" />
                                <label for="test115" style="padding-left:40%;">Yes</label>
                              </p>
                               <p style="width:100px;">
                                <input type="checkbox" id="test116"  name="advance_paid" value="No" />
                                <label for="test116" style="padding-left:40%;">No</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                           
                                      <div class="input-title"><input type="text" name="amount" id="test1" placeholder="Rs"></div>
                                      
                                      <div class="input-title"><input type="submit" name="submit" value="Book"></div>
                                    <div class="clearfix"></div>   
                               </div>
                               </form>
                                
                               </div>
                    <div class="clearfix"></div>
                </div>
                  <!-- <div class="class="nex-but"">
                     <a href="postad-last.html" class="ne-but">Next</a>
                     <a href="post-ad3.html" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div> -->
                </div>
            </div>
        </div>
        
<?php include("includes/footer.php"); ?>
 <!------login-popup--------->
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index.js"></script>
<!------login-popup--------->
</body>
</html>
