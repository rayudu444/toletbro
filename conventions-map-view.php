<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
 include_once('includes/inner-header.php');
 
 $sql = "select * from convention_post_add ";
 
 if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')  )
 {
 	 //$Address = urlencode($_POST['address']);
  	 //$request_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$Address."&sensor=true";
  	 // Make the HTTP request
     //$data = @file_get_contents($request_url);
     // Parse the json response
     //$jsondata = json_decode($data,true);
     //$lat_lng = $jsondata['results'][0]['geometry']['location'];
     $lat = $_GET['lat'];
     $lng = $_GET['lng'];
     $sql =  "select *, ( 3959 * acos( cos( radians($lat) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians( $lng ) ) + sin( radians( $lat) ) * sin( radians( location_lat ) ) ) ) as distance from convention_post_add  ";
  }
  
  if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')) 
  {
  		$sql .= " HAVING distance <= 5";
  }
  
  $sql .= " order by convention_post_id desc";
 //echo $sql;exit;
 //echo $sql;exit;
  $statement = $dbh->prepare($sql);
  $statement->execute();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>

<style type="text/css">
   html, body, #googleMap {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
   .labels {
     color: white;
     background-color: red;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 10px;
     text-align: center;
     white-space: nowrap;
     width:50px;
     height:50px;
     border-radius: 50%;
    behavior: url(PIE.htc);
   }

 </style>

<script src="js/markerwithlabel.js"></script>
 <script>
	$(function(){
		$(document).on("click","#popup-close",function(){
				$(".dialog").empty();
				$(".dialog").hide();
		});		
	});
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
	    		if(!empty($post['images']))
                {
                   $images = explode(',',$post['images']); 
                   $image = $images[0];	
                }else{
                	
                }
	    	?>
	      var latlnt<?= $count;?> = new google.maps.LatLng(<?= $post['location_lat']?>,<?= $post['location_long']?>);
	      
		 var pictureLabel<?= $count;?> = document.createElement("img");
    	 pictureLabel<?= $count;?>.src = '<?php echo  "uploads/convention_images/".$image; ?>';
    	 pictureLabel<?= $count;?>.style.height = '50px';
    	 pictureLabel<?= $count;?>.style.width = '50px';
    	 
	     var marker<?= $count;?> =  new MarkerWithLabel({
	    	 position: latlnt<?= $count;?>,
	    	   
	    	   map: map,
	    	   labelContent: pictureLabel<?= $count;?>,
	           labelAnchor: new google.maps.Point( 24, 37),
	           labelClass: "labels", // the CSS class for the label
	           labelInBackground: false,
	           icon: " "
	          
	      });
	     
	      marker<?= $count;?>.image = '<?= $image;?>';
	      marker<?= $count;?>.title = "<?= $post["title"];?>";
	      marker<?= $count;?>.description = '<?= substr($post["description"],0,100);?>';
	      marker<?= $count;?>.price_per_plate = '<?= $post["price_per_plate"];?>';
	     
	     
	      google.maps.event.addListener(marker<?= $count;?>, 'click', markerClicked<?= $count;?>);
	
	       function markerClicked<?= $count;?>(e) {
		       
	    	   var popup_content = '<div class="pop-ums"><a href="javascript:void(0);" id="popup-close" style="float:right;">X</a><div class="col-im-87"><img src="uploads/convention_images/'+ marker<?= $count;?>.image+'"/></div><div class="col-im-88">';
	    	   popup_content += "<h3>"+marker<?= $count;?>.title+"</h3><h6>Price:"+marker<?= $count;?>.price_per_plate+"(Per Plate)</h6>"; 
	    	   popup_content += '<ul style="list-style-type: none;"><li>Description :'+ marker<?= $count;?>.description+' </li></ul></div> <div class="clearfix"></div></div>';
               
               $(".dialog").empty();
               $(".dialog").append(popup_content);
               $(".dialog").show();
	          return false;
	       }
	       
	  <?php ++$count; } ?>
	  map.setZoom(12)
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

			<div class="dialog" style="display:none;" >
				
              </div>
        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-6 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	<h1>Filter Properties</h1>
                            <ul  class="filter-ul">
                            	<li><a href="conventions-map-view.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">Map</a></li>
                                <li><a href="convention-listview.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">List</a></li>
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
                            	if(!empty($post['images']))
                            	{
                            		$images = explode(',',$post['images']); 
                            		$image = $images[0];	
                            	}
                            	
                            ?>
                            	<div class="results-list-div">
	                            	<div class="col-md-4 cont-im">
	                                    <img src="<?php echo  "uploads/convention_images/".@$image; ?>"/>
                                    </div>
                                    <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?= $post['title']; ?> </h1>
                                        <i class="fa fa-heart-o"></i>
                                        <div class="clear"></div>
                                     </div>
                                      <p class="para-1"><?php echo substr($post['description'],0,200).'..';?></p>
                                     <div class="cont-sit-but">
                                      <span class="rs-sp"><i class="fa fa-inr"></i><?php echo $post['price_per_plate'];?></span>
                                       
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
