<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
 /* if (!isset($_SESSION['cnv_upid']) || $_SESSION['cnv_upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";exit;
}*/
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
<script>
	$(document).ready(function(){
//		$(".post-filters").change(function(){
//			var formData = new FormData();
//			formData.append("location_lat",$("#lat").val());
//			formData.append("location_long",$("#lng").val());
//			formData.append("bedrooms",$("#bhk").val());
//			
//			 $.ajax({
//			        url: 'filter-convention.php',
//			        data: formData,
//			        contentType: false,
//			        processData: false,
//			        type: 'POST',
//			        success: function(data){
//			           $(".listing-div").empty();
//			           $(".listing-div").html(data);
//			           var length = $(".listing-div").find(".latlng-length").length;
//				}
//			  });
//			
//		});
	});
</script>
        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	 <div class="list-uls">
                        	<form>
                        	<ul class="list3">
                            	<li>Refine Results</li>
                                <li>
                                	<select class="refine1 post-filters" id="bhk">
                                    	<option value="ac">AC</option>
                                        <option value="non-ac">NON-AC</option>
                                    </select>
                                </li>
                                
                                
                               
                                <div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                                
                            </form>
                        </div>
                            <ul class="filter-ul">
                            	<li><a href = "conventions-map-view.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">Map</a></li>
                            	<li><a href = "convention-listview.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="flats-home">
                           <ul>
                             <li>Home/</li>
                             <li>Rent/</li>
                             <li>Hyderabad/</li>
                             <li>Jubilee Hills</li>
                              <div class="clearfix"></div>
                           </ul>
                          <h2>Convention Centers in Hyderabad </h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          <h6>6 flats found. <span style="color:#f2635d;">Include nearby flats</span></h6>
                          <ul class="date-add">
                            <li>Sort by: <span style="color:#f2635d;">Relevance</span> </li>    
                            <li>Date Added (Recent First)</li>  
                            <li>Price: Low High</li>
                            <li><i class="fa fa-heart-o" style="margin-right:2px;"></i>0 Shortlisted Properties </li>
                            
                          </ul>
                         <div class="clear"></div>
                        </div>
                        <div class="container-fluid"> 
                        
                         <div class="row">
	                        <div class="results-list1">
                            <div>
                            <?php 

							 if($posts){
							 	//$result=mysql_fetch_array($query);
							 	foreach($posts as $result_info) {
							 	
							?>
                            	<div class="results-list-div1">
	                            	<div class="col-md-4 cont-im">
	                            	<?php if($result_info['images']!=""){$dbimages = explode(",", $result_info['images']);}?>
	                                    <img src="uploads/convention_images/<?=$dbimages[0]?>" />
                                    </div>
                                     <div class="col-md-7" style="margin-left:5%;">
                                       <div class="row">
                                          <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?=$result_info['title']?></h1>
                                        <i class="fa fa-heart-o"></i>
                                        <div class="clear"></div>
                                     </div>
                                      <div class="par-div">
                                        <span>5.2</span>
                                      <p class="para-1"><?=$result_info['description']?></p>                                         
                                      <div class="clearfix"></div>
                                      </div>
                                      <span class="rs-sp1"><i class="fa fa-inr"></i> <?=$result_info['price_per_plate']?></span>
                                    </div>
                                          <div class="col-md-4">
                                              <div class="cont-but">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6>Contact Person</h6>
                                                  <div class="clearfix"></div>
                                             </div> 
                                         
                                         </div>
                                          <div class="clearfix"></div>
                                          <div class="cal-md-12">
                                            <div class="specitions">
                                           <ul>
                                              <li>
                                                 <span>Security Deposit</span>
                                                 <p><?=$result_info['deposite']?></p>
                                              </li>
                                               <li>
                                                 <span> Availability </span>
                                                 <p></p>
                                              </li>
                                              <li>
                                                 <span>Dining Capacity</span>
                                                 <p><?=$result_info['dining_seating_cap']?></p>
                                              </li>
                                              <li>
                                                 <span>Services</span>
                                                 <p><?php if($result_info['additional_services']!=""){ 
                                                  $amen = explode(",",$result_info['additional_services']); 
                                                  $count_amen =count($amen);
                                                  $count_amen1=$count_amen-2;
                                                  if($count_amen==2){
                                                    echo $amen[0].",".$amen[1];
                                                  }else if($count_amen>=2){
                                                    echo $amen[0].",".$amen[1]." +".$count_amen1;
                                                  }
                                                  else{
                                                  echo $amen[0]; 
                                                  }
                                                  }?></p>
                                              </li>
                                              <div class="clearfix"></div>
                                       
                                           </ul>
                                       
                                       </div>
                                             <div class="specitions">
                                           <ul>
                                              <li>
                                                 <span>Capacity</span>
                                                 <p> <?=$result_info['seating_cap_min']." - ".$result_info['seating_cap_max']?></p>
                                              </li>
                                               <li>
                                                 <span>Convention Type</span>
                                                 <p><?=$result_info['convention_type']?></p>
                                              </li>
                                              <li class="view-but">
                                                 <a href="list-view-convention-info.php?convention=<?=$result_info['convention_post_id']?>">View <i class="fa fa-angle-down"></i></a>
                                                 
                                              </li>
                                              <div class="clearfix"></div>
                                       
                                           </ul>
                                       
                                       </div>
                                          </div>
                                       </div>  
                                       <div class="clearfix"></div>
                                       
                                    </div>
                                    
                                   
                                    <div class="clearfix"></div>
                                </div>
                            	<div class="clearfix"></div>
                            	<?php }
							 	}else{
							 		echo "There is no Results";
							 	}
                            	?>
                                <div class="clearfix"></div>
                            </div>
                            
                        	<div class="clearfix"></div>	
                        </div>
                        </div>
                        <div class="clearfix"></div>
                         
                        </div>
                    </div>
                    
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
