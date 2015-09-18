<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
 include_once('includes/inner-header.php');
 
 $sql = "select post_id,description,contact_name,contact_mobile,location_lat,location_long,price_monthly,property_image from post_add where property='Rent' order by post_id desc";
 $statement = $dbh->prepare($sql);
 $statement->execute();
 $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>

	function initialize() {
	 
	 
	  var mapProp = {
	    center:new google.maps.LatLng(17.410097,78.4607968),
	    zoom:18,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	
	  <?php 
	  	$count = 1;
	  	//print_r($posts);exit;
	    foreach ($posts as $post) {
	    		if(!empty($post['property_image']))
                {
                   $images = explode(',',$post['property_image']); 
                   $image = $images[0];	
                }else{
                	
                }
	    	?>
	      var latlnt<?= $count;?> = new google.maps.LatLng(<?= $post['location_lat']?>,<?= $post['location_long']?>);

	      var icon<?= $count;?> = {
	    		    url: '<?= "uploads/property_images/".$image; ?>', // url
	    		  
	    		    scaledSize: new google.maps.Size(50, 50), // scaled size
	    		    origin: new google.maps.Point(0,0), // origin
	    		    anchor: new google.maps.Point(0, 0), // anchor
	    		    borderRadius: '50px'
	    		};
	      
//	      var icon<?= $count;?> = new google.maps.MarkerImage(
//	    		  '<?= "uploads/property_images/".$image; ?>', //url
//	              new google.maps.Size(50, 50), //size
//	              new google.maps.Point(0,0), //origin
//	              new google.maps.Point(0,0) //anchor 
//	      );
	     var marker<?= $count;?> = new google.maps.Marker({
	        position: latlnt<?= $count;?>,
	        map: map,
	        icon: icon<?= $count;?>
	      });
	      
	      marker<?= $count;?>.image = '<?= $image;?>';
	      marker<?= $count;?>.address = "<?= $post["description"];?>";
	      marker<?= $count;?>.price = '<?= $post["price_monthly"];?>';
	      
	     google.maps.event.addListener(marker<?= $count;?>, 'click', markerClicked<?= $count;?>);
	
	       function markerClicked<?= $count;?>(e) {
	          $("#place-location").text(marker<?= $count;?>.place);
	          $("#place-img").attr("src","images/"+marker<?= $count;?>.image);
	          $("#place-address").text(marker<?= $count;?>.address);
	
	          $('.address-icon1-popup1').addClass("address-popup-anim1");
	          overlay.show();
	          overlay.appendTo(document.body);
	          return false;
	       }
	       
	  <?php ++$count; } ?>
	  map.setZoom(12)
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-6 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	<h1>Filter Properties</h1>
                            <ul  class="filter-ul">
                            	<li><a href="filter-conventions-sub.php">Map</a></li>
                                <li><a href="property-listview.php">List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div>
                        	<form>
                        	<ul class="list3">
                            	<li>Refine Results</li>
                                <li>
                                	<select class="refine1">
                                    	<option>1 BHK</option>
                                        <option>2 BHK</option>
                                        <option>3 BHK</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine1">
                                    	<option>1 BHK</option>
                                        <option>2 BHK</option>
                                        <option>3 BHK</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>BUDGET</option>
                                        <option>1,00,000</option>
                                        <option>2,00,000</option>
                                        <option>3,00,000</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>Lease Type</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2">
                                    	<option>Listed By</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine1">
                                    	<option>More</option>
                                        <option>Generator</option>
                                        <option>Generator</option>
                                        <option>Generator</option>
                                    </select>
                                </li>
                                <li>
                                	Reset
                                    <i class="fa fa-undo" style="color:#444; font-size:10px;"></i>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                            <div class="sort-price">
                            	<select>
                                	<option>Sort By</option>
                                    <option>Price</option>
                                    <option>Category</option>
                                </select>
                                <div class="result-bt">
                                    <ul>
                                       <li><i class="fa fa-list-ul"></i>Result</li>
                                       <li><i class="fa fa-heart-o"></i>shortlist</li>
                                       <div class="clear"></div>
                                    </ul>
                                </div>
                            	<div class="clearfix"></div>
                            </div>    
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" id="demo">
	                        <div class="results-list id="examples"">
                            <div id="content-1" class="content">
                            <?php foreach($posts as $post) {
                            	if(!empty($post['property_image']))
                            	{
                            		$images = explode(',',$post['property_image']); 
                            		$image = $images[0];	
                            	}
                            	
                            ?>
                            	<div class="results-list-div">
	                            	<div class="col-md-4 cont-im">
	                                    <img src="<?php echo  "uploads/property_images/".@$image; ?>"/>
                                    </div>
                                    <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1>3 BHK Unfurnished</h1>
                                        <i class="fa fa-heart-o"></i>
                                        <div class="clear"></div>
                                     </div>
                                      <p class="para-1"><?php echo substr($post['description'],0,200).'..';?></p>
                                     <div class="cont-sit-but">
                                      <span class="rs-sp"><i class="fa fa-inr"></i><?php echo $post['price_monthly'];?></span>
                                       
                                       <div class="clearfix"></div>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            	<div class="clearfix"></div>
                            <?php } ?>
                            </div>
                            
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="near-localities-div">
                    	<h1>Nearby Localities</h1>
                        <ul>
                        	<li><a href="#">1 BHK In Madhapur</a></li>
                            <li><a href="#">1 BHK In Madhapur</a></li>
                        	<li><a href="#">1 BHK In Madhapur</a></li>
                            <li><a href="#">1 BHK In Madhapur</a></li>
                        	<li><a href="#">1 BHK In Madhapur</a></li>
                            <li><a href="#">1 BHK In Madhapur</a></li>
                        	<li><a href="#">1 BHK In Madhapur</a></li>
                            <li><a href="#">1 BHK In Madhapur</a></li>
                        </ul>
                    	<div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 map-right-div" id="googleMap" style="height:700px;">
                	
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>        
        <div class="clearfix"></div>
    </section>
    <!-- custom scrollbar plugin -->
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"rounded"
				});
				
			});
		})(jQuery);
	</script>
</body>
</html>
