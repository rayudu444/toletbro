<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
 /* if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}*/
 include_once('includes/inner-header.php');
 
 $shortlisted = 0;
 $sql = (isset($_GET['shortlisted']) && isset($_SESSION['upid']))? "select * from post_add inner join short_lists ON short_lists.post_id = post_add.post_id where short_lists.user_id =  $_SESSION[upid] " :  "select * from post_add ";
 
 if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '') )
 {
 	 
     $lat = $_GET['lat'];
     $lng = $_GET['lng'];
     $sql =  "select *, (((acos(sin((".$lat."*pi()/180)) * 
            sin((`location_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
            cos((`location_lat`*pi()/180)) * cos(((".$lng."- `location_long`)* 
            pi()/180))))*180/pi())*60*1.1515* 1.609344
        )  as distance  from post_add  ";
     
  }
  if(isset($_GET['type'],$_GET['property_type']) && ($_GET['type']!="") && ($_GET['property_type']!="") )
  {
  		$type = $_GET['type'];


  	
  		$sql .= " where property='$type' and property_type='".$_GET['property_type']."'";
  } else if(isset($_GET['type']))
  {
      $type = $_GET['type'];
    
      $sql .= " where property='$type'";
  }  
  
  if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')) 
  {
  		$sql .= " HAVING distance  <= 5";
  }
  
  $sql .= " order by post_add.post_id desc";

  //echo $sql;

  $statement = $dbh->prepare($sql);
  $statement->execute();
   $property_count = $statement->rowCount();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  if(isset($_SESSION['upid']))
  {
  	//getting sortilisted properties
  	$sql = "SELECT count(*) FROM `short_lists` WHERE `user_id` =? AND `user_type` = ?";       
  	$statement = $dbh->prepare($sql);
  	$statement->execute(array($_SESSION['upid'],1));
    $shortlisted = $statement->fetchColumn();

     /*$sql1 = "SELECT `post_id` FROM `short_lists` WHERE `user_id`=".$_SESSION['upid']." AND `user_type`=1"; 
    $rows =mysql_fetch_array(mysql_query($sql1));
    $sh_id=array();
    foreach ($rows as $row_id) {
      echo $row_id['post_id'];

      array_push($sh_id, $row_id['post_id']);
          }
          print_r($sh_id);*/
    //$statement1 = $dbh->prepare($sql1);
    //$statement1->execute(array($_SESSION['upid'],1));
    //$shortlist_ar = $statement1->fetchAll(PDO::FETCH_ASSOC);
    /*$sh_id=array();
    foreach ($shortlist_ar as $shortlist_id) {
      $sh_id[]=$shortlist_id;
    }*/
    //print_r($shortlist_ar);


  	
  }
 
  
?>
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>

<script>
	$(document).ready(function(){
		$(".post-filters").change(function(){
			var formData = new FormData();
			formData.append("property",$("#type").val());
			formData.append("location_lat",$("#lat").val());
			formData.append("location_long",$("#lng").val());
			formData.append("bedrooms",$("#bhk").val());
			formData.append("budget",$("#budget").val());
			formData.append("listed_by",$("#listed-by").val());
			formData.append("view","list_view");
			formData.append("price-order",$("#sort-by-price").val());
			formData.append("posted-order",$("#sort-by-posted").val());
			 $.ajax({
			        url: 'filter-posts.php',
			        data: formData,
			        contentType: false,
			        processData: false,
			        type: 'POST',
			        success: function(data){
			           $(".listing-div").empty();
			           $(".listing-div").html(data);
			           var length = $(".listing-div").find(".latlng-length").length;
				}
			  });
			
		});
	});
</script>
        <div class="container-fluid white-div-wrapper" > 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div"  >
                	<div>
                    	<div class="filter-inner-div">
                        	 <div class="list-uls">
                        	<form>
                        	<ul class="list3">
                            	<li>Refine Results</li>
                                <li>
                                	<select class="refine1 post-filters" id="bhk" >
                                		<option value="">BHK</option>
                                    	<option value="1">1 BHK</option>
                                        <option value="2">2 BHK</option>
                                        <option value="3">3 BHK</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2 post-filters" id="budget">
                                    	<option value="">BUDGET</option>
                                        <option value="10000">1,00,000</option>
                                        <option value="10000">2,00,000</option>
                                        <option value="10000">3,00,000</option>
                                    </select>
                                </li>
                                <li>
                                	<select class="refine2 post-filters" id="listed-by">
                                    	<option value="">Listed By</option>
                                        <option value="Landlord">Landlord</option>
                                        <option value="Agent">Agent</option>
                                    </select>
                                </li>
                               
                                <!--
                                <li>
                                	<select class="refine2">
                                    	<option>Lease Type</option>
                                        <option>1 Year</option>
                                        <option>2 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </li>
                                --><!--
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
                                --><div class="clearfix"></div>
                            </ul>
                        	<div class="clearfix"></div>
                                
                            </form>
                        </div>
                            <ul class="filter-ul">
                            	<li><a href = "filter-conventions-sub.php?type=<?php echo  @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">Map</a></li>
                            	<li><a href = "property-listview.php?type=<?php echo @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">List</a></li>
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
                        
                          <h6><?=$property_count?> flats found. <span style="color:#f2635d;">Include nearby flats</span></h6>
                          <ul class="date-add " id="<?php echo (isset($_SESSION['upid']))? '' : '' ;?>">
                            <li>Sort by: <span style="color:#f2635d;">Relevance</span> </li>    
                            <li>
                                <select class="refine2 post-filters" id="sort-by-posted">
                                    <option value="">Date Added </option>
                                        <option value="desc">Recent-older</option>
                                        <option value="asc">Older-Recent</option>
                                    </select>
                            </li>

                            <li>
                                <select class="refine2 post-filters" id="sort-by-price">
                                    <option value="">Price</option>
                                        <option value="asc">Low-High</option>
                                        <option value="desc">High-Low</option>
                                    </select>
                            </li>
                            <li><a href="<?php echo (isset($_SESSION['upid']))? "property-listview.php?shortlisted" : "#test-popup" ?>"  ><i class="fa fa-heart-o" style="margin-right:2px;"></i><?= $shortlisted;?> Shortlisted Properties</a> </li>
                            
                          </ul>
                         <div class="clear"></div>
                        </div>
                        <div class="container-fluid" > 
                        
                         <div class="row">
	                        <div class="results-list1">
                            <div class="listing-div">
                            <?php 

							 if($posts){
							 	//$result=mysql_fetch_array($query);
							 	foreach($posts as $result_info) {
							 	
							?>
                            	<div class="results-list-div1">
	                            	<div class="col-md-4 cont-im">
	                            	<?php if($result_info['property_image']!=""){$dbimages = explode(",", $result_info['property_image']);}?>
	                                    <img src="uploads/property_images/<?=$dbimages[0]?>"/>
                                    </div>
                                     <div class="col-md-7" style="margin-left:5%;">
                                       <div class="row">
                                          <div class="col-md-8">
                                   
                                    <div class="bhk-un" id="<?php echo (isset($_SESSION['upid']))? '' : '' ;?>" >
                                        <h1><?=$result_info['bedrooms']?>BHK <?=$result_info['property_furnished_status']?></h1>
                                        <a  <?php if(isset($_SESSION['upid'])){?> href='javascript:void(0)' class="liked" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>   id="<?= $result_info['post_id']; ?>"><i class="fa fa-heart-o" ></i></a>
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
                                              <a href="#test-popup9<?=$result_info['post_id']?>" class="inline-popups-a"  style="color:#fff; outline:none;"data-effect="mfp-zoom-in">
                                              <div class="cont-but">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6 > Contact Agent</h6>
                                                  <div class="clearfix"></div>
                                             </div> </a>
                                         
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
                                                 <p></p>
                                              </li>
                                              <li>
                                                 <span>Added</span>
                                                 <p><?=$result_info['additional_charges']?></p>
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
                                                 <p></p>
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
                            	                            <!--popup code start here-->
                              <div id="test-popup9<?=$result_info['post_id']?>" class="white-popup mfp-with-anim mfp-hide">
            <div class="col-md-12 left-part-12">
                            <div class="col-md-6">  
                                <div class="agent-name">
                                    <p><?=$result_info['contact_name']?></p>
                                     <p><?=$result_info['listed_by']?></p>
                                     <h2><?=$result_info['contact_mobile']?></h2>
                                </div>
                             </div>
                             <div class="col-md-6"> 
                                <div class="flat-603">
                                    <h6> Flat id: <?=$result_info['post_id']?></h6>
                                    <div class="address-flat">
                                        <h4> <?=$result_info['bedrooms']?> BHK , <?=$result_info['property_furnished_status']?> </h4>
                                        <p><?=$result_info['addres_locality']?></p>
                                        <span><i class="fa fa-inr"></i><?=$result_info['price_monthly']?></span>
                                    </div>
                                    <!--div class="report-ready">
                                      <p>Flat already taken</p>
                                       <span>Report</span>
                                        <div class="clearfix"></div>
                                    </div-->
                                </div>
                             </div>
                        </div>
            <div class="col-md-12">
                            <div class="col-md-6">  
                                <div class="agent-form">
                                   <form class="agent-fr">
                                       <label>
                                          <input type="text" placeholder="Name" />
                                       </label>
                                       <label>
                                          <input type="text" placeholder="Mobile" />
                                       </label>
                                       <label>
                                          <input type="text" placeholder="Email" />
                                       </label>
                                       <label>
                                          <input type="submit" placeholder="Email" />
                                       </label>
                                   </form>
                                 </div>
                             </div>
                            <div class="col-md-6">
                               <div class="popup-ban">
                                 <img src="images/pop-banner.png"/>
                               
                               </div>
                            </div>  
                        </div>
                        <div class="clearfix"></div>
              </div><!--popup code end here-->
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
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index2.js"></script>

