<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
 include_once('includes/inner-header.php');
?>
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
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                                
                            </form>
                        </div>
                            <ul class="filter-ul">
                            	<li><a href = "filter-conventions-sub.php">Map</a></li>
                            	<li><a href = "property-listview.php">List</a></li>
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
                          <h2>Flats for Rent in Jubilee Hills </h2>
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
                            <?php $query= mysql_query("select * from post_add where property='Rent' order by post_id desc");
							$count =mysql_num_rows($query);

							 if($count>0){
							 	//$result=mysql_fetch_array($query);
							 	while($result_info=mysql_fetch_array($query)) {
							 	
							?>
                            	<div class="results-list-div1">
	                            	<div class="col-md-4 cont-im">
	                            	<?php if($result_info['property_image']!=""){$dbimages = explode(",", $result_info['property_image']);}?>
	                                    <img src="uploads/property_images/<?=$dbimages[0]?>"/>
                                    </div>
                                     <div class="col-md-7" style="margin-left:5%;">
                                       <div class="row">
                                          <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1>3 BHK Unfurnished</h1>
                                        <i class="fa fa-heart-o"></i>
                                        <div class="clear"></div>
                                     </div>
                                      <div class="par-div">
                                        <span>5.2</span>
                                      <p class="para-1"><?=$result_info['description']?></p>                                         
                                      <div class="clearfix"></div>
                                      </div>
                                      <span class="rs-sp1"><i class="fa fa-inr"></i> <?=$result_info['price_monthly']?></span>
                                    </div>
                                          <div class="col-md-4">
                                              <div class="cont-but">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6>Contact Agent</h6>
                                                  <div class="clearfix"></div>
                                             </div> 
                                         
                                         </div>
                                          <div class="clearfix"></div>
                                          <div class="cal-md-12">
                                            <div class="specitions">
                                           <ul>
                                              <li>
                                                 <span>Security Deposit</span>
                                                 <p><?=$result_info['price_deposite']?></p>
                                              </li>
                                               <li>
                                                 <span> Availability </span>
                                                 <p>Ready To Movie</p>
                                              </li>
                                              <li>
                                                 <span>Added</span>
                                                 <p><?=$result_info['price_deposite']?></p>
                                              </li>
                                              <li>
                                                 <span>Amenities</span>
                                                 <p><?php if($result_info['amenities']!=""){ 
                                                  $amen = explode(",",$result_info['amenities']); 
                                                  $count_amen =count($amen);
                                                  $count_amen1=$count_amen-2;
                                                  if($count_amen==2){
                                                    echo $amen[0].",".$amen[1];
                                                  }else if($count_amen>=2){
                                                    echo $amen[0].",".$amen[1]."+".$count_amen1;
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
                                                 <span>Built Up Area</span>
                                                 <p> <?=$result_info['plot_area']?></p>
                                              </li>
                                               <li>
                                                 <span>Lease Type</span>
                                                 <p>Lease Type</p>
                                              </li>
                                              <li class="view-but">
                                                 <a href="list-view-property-info.php?property=<?=$result_info['post_id']?>">View <i class="fa fa-angle-down"></i></a>
                                                 
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
