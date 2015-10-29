<?php
session_start();
ob_start();
include("includes/dbutil.php");
include("includes/rent-sale-header.php");
?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
        <div class="container-fluid sell-banner">        
          <div>
              <a href="index.php">
                  <img src="images/logo.png" class="logo1"/>
                </a>
            </div>
          <div class="container"> 
              <div class="row">
                  <div>
                      <h1 class="head6" style="color:#f2635d;">LOREM LPSUM DUMMY TEXT</h1>
                        <form class="form1" action="property-listview.php" method="get">
                          <label>
                              <img src="images/map-icon.png" class="map-icon"/>
                <input type="text" id="autocomplete" required name="search_input" placeholder="Search by locality or landmark or building"  style="width:60% !important;"/>
                <input type="hidden" name="lat" value=""  id="lat"/>
                <input type="hidden" name="lng" value=""  id="lng"/>
                 <select name="property_type" required  class="rent-select">
                 <option value="" hidden>Property Type</option>

                                <option value="Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Apartments"))? "selected" : ''; ?>>Apartments</option>

                                <option value="Individual houses" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Individual houses"))? "selected" : ''; ?>>Individual houses</option>

                                <!-- <option value="PG/Hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "PG/Hostels"))? "selected" : ''; ?>>PG/Hostels</option> -->
                                <optgroup label="PG/Hostels">
                                <option value="Boys hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Boys hostels"))? "selected" : ''; ?>>Boys hostels</option>

                                <option value="Girls hostels" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Girls hostels"))? "selected" : ''; ?>>Girls hostels</option>
                                </optgroup>
                                <optgroup label="Commercial space">
                                <option value="Shops/shutters" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Shops/shutters"))? "selected" : ''; ?>>Shops/shutters</option>

                                <option value="Offices" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Offices"))? "selected" : ''; ?>>Offices</option>
                                </optgroup>
                                <!-- <option value="Commercial space" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Commercial space"))? "selected" : ''; ?>>Commercial space</option> -->
                                <option value="Land & Plot" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Land & Plot"))? "selected" : ''; ?>>Land & Plot</option>
                                <option value="Farm house" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Farm house"))? "selected" : ''; ?>>Farm house</option>
                                <option value="Service Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Service Apartments"))? "selected" : ''; ?>>Service Apartments</option>
                                <option value="Pent house" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Pent house"))? "selected" : ''; ?>>Pent house</option>
                                <optgroup label="Gated community">
                                <option value="Apartments" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Apartments"))? "selected" : ''; ?>>Apartments</option>
                                <option value="Individual" <?php echo (isset($post_details['property_type'])&&($post_details['property_type'] == "Individual"))? "selected" : ''; ?>>Individual</option>

                                </optgroup>service apartments

                                                                
                              </select>
                                <input type="hidden" name="type" value="Rent">
                                <button type="submit"><img src="images/search-icon.png"/>Search</button>
                                <div class="clearfix"></div>
                            </label>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                  <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid white-bg1">
          <div class="container">
              <div class="row">
                  <h2 class="head7">Find suitable house in your city</h2>
                  <div class="col-md-3 city-div">
                      <img src="images/chennai.png"/>
                        <span>Chennai</span>
                    </div>
                    <div class="col-md-3 city-div">
                      <img src="images/hyderabad.png"/>
                        <span>Hyderabad</span>
                    </div>
                    <div class="col-md-3 city-div">
                      <img src="images/bangalore.png"/>
                        <span>Bangalore</span>
                    </div>
                    <div class="col-md-3 city-div">
                      <img src="images/pune.png"/>
                        <span>Pune</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix clear-60"></div>
        <div>
       
       <?php include("includes/footer.php") ?>

<script type="text/javascript">
$(function(){
  var $elems = $('.animateblock');
  var winheight = $(window).height();
  var fullheight = $(document).height();
  
  $(window).scroll(function(){
    animate_elems();
  });
  
  function animate_elems() {
    wintop = $(window).scrollTop(); // calculate distance from top of window
 
    // loop through each item to check when it animates
    $elems.each(function(){
      $elm = $(this);
      
      if($elm.hasClass('animated')) { return true; } // if already animated skip to the next item
      
      topcoords = $elm.offset().top; // element's distance from top of page in pixels
      
      if(wintop > (topcoords - (winheight*.75))) {
        // animate when top of the window is 3/4 above the element
        $elm.addClass('animated');
      }
    });
  } // end animate_elems()
});
</script>    
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>
</body>
</html>
