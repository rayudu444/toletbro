<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 include_once('includes/inner-header.php');
 include_once('property-filters.php');
 
 $shortlisted = 0;
 $sql = (isset($_GET['shortlisted']) && isset($_SESSION['upid']))? "select * from post_add inner join short_lists ON short_lists.post_id = post_add.post_id where short_lists.user_id =  $_SESSION[upid] and post_add.status=2 and short_lists.post_type=1" :  "select * from post_add ";
 
 if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '') )
 {
 	 
     $lat = $_GET['lat'];
     $lng = $_GET['lng'];
     $sql =  "select *, (((acos(sin((".$lat."*pi()/180)) * 
            sin((`location_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
            cos((`location_lat`*pi()/180)) * cos(((".$lng."- `location_long`)* 
            pi()/180))))*180/pi())*60*1.1515* 1.609344
        )  as distance  from post_add";
     
  }
  if(isset($_GET['type'],$_GET['property_type']) && ($_GET['type']!="") && ($_GET['property_type']!="") )
  {
  		$type = $_GET['type'];


  	
  		$sql .= " where property='$type' and status=2 and property_type='".$_GET['property_type']."'";
  } else if(isset($_GET['type']))
  {
      $type = $_GET['type'];
    
      $sql .= " where property='$type' and status=2";
  }  
  
  if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')) 
  {
    if($_GET['lat']=='17.385044' && $_GET['lng']=='78.486671'){
  		$sql .= " HAVING distance  <= 40";
    }else{$sql .= " HAVING distance  <= 5";}
  }
  /*Filters code start here*/
  if(isset($_GET['filter_search']))
{
  extract($_GET);

  $condition_res="";
 if(!empty($price))
  {   
    $price = explode(";",$price); 
    $condition_res[] .= "price_monthly between ($price[0] and $price[1])";   
  }
  if(!empty($property_for))
  {

    $condition_res[] .= "property_for='$property_for'";   
  }
  if(!empty($type))
  {

    $condition_res[] .= "property='$type'";   
  }
  if(!empty($listed_by))
  {

    $condition_res[] .= "listed_by='$listed_by'";   
  }

  if(!empty($bedrooms))
  {

    $condition_res[] .= "bedrooms='$bedrooms'";   
  }
  if(!empty($bathrooms))
  {

    $condition_res[] .= "bathrooms='$bathrooms'";   
  }
  if(!empty($no_parking2))
  {

    $condition_res[] .= "parking_2wheeler='$no_parking2'";   
  }
  if(!empty($no_parking4))
  {

    $condition_res[] .= "parking_4wheeler='$no_parking4'";   
  }
  if(!empty($funished_status))
  {

    $condition_res[] .= "property_furnished_status='$funished_status'";   
  }

  if(!empty($facing))
  {

    $condition_res[] .= "door_facing='$facing'";   
  }
  if(!empty($pets_allowed))
  {

    $condition_res[] .= "pets_allowed='$pets_allowed'";   
  }
/*$usrData1=array(
        'ac'=>$ac, 'tv'=>$tv, 'cupboard'=>$cupboard, 'sofa'=>$sofa, 'bed'=>$bed,'microwave'=>$microwave,
         'waching_machine'=>$waching_machine, 'dining_table'=>$dining_table, 'fridge'=>$fridge, 'stove'=>$stove,
          'servent_room'=>$servent_room, 'security'=>$security, 'electricity_backup'=>$electricity_backup, 
          'pooja_room'=>$pooja_room, 'store_room'=>$store_room, 'micro_wave'=>$micro_wave, 
         'gym'=>$gym, 'swimming_pool'=>$swimming_pool, 'lift'=>$lift, 'gas_pipeline'=>$gas_pipeline     
      );*/
  if(!empty($ac))
  {

    $condition_res[] .= "pa.ac='$ac'";   
  }

  if(!empty($tv))
  {

    $condition_res[] .= "pa.tv='$tv'";   
  }

  if(!empty($cupboard))
  {

    $condition_res[] .= "pa.cupboard='$cupboard'";   
  }

  if(!empty($bed))
  {

    $condition_res[] .= "pa.bed='$bed'";   
  }

  if(!empty($sofa))
  {

    $condition_res[] .= "pa.sofa='$sofa'";   
  }

  if(!empty($dining_table))
  {

    $condition_res[] .= "pa.dining_table='$dining_table'";   
  }

  if(!empty($microwave))
  {

    $condition_res[] .= "pa.microwave='$microwave'";   
  }
  
  if(!empty($fridge))
  {

    $condition_res[] .= "pa.fridge='$fridge'";   
  }

  if(!empty($stove))
  {

    $condition_res[] .= "pa.stove='$stove'";   
  }

  if(!empty($waching_machine))
  {

    $condition_res[] .= "pa.waching_machine='$waching_machine'";   
  }

  if(!empty($servent_room))
  {

    $condition_res[] .= "pa.servent_room='$servent_room'";   
  }

  if(!empty($security))
  {

    $condition_res[] .= "pa.security='$security'";   
  }

  if(!empty($electricity_backup))
  {

    $condition_res[] .= "pa.electricity_backup='$electricity_backup'";   
  }

  if(!empty($pooja_room))
  {

    $condition_res[] .= "pa.pooja_room='$pooja_room'";   
  }

  if(!empty($store_room))
  {

    $condition_res[] .= "pa.store_room='$store_room'";   
  }

  if(!empty($gym))
  {

    $condition_res[] .= "pa.gym='$gym'";   
  }

  if(!empty($swimming_pool))
  {

    $condition_res[] .= "pa.swimming_pool='$swimming_pool'";   
  }

  if(!empty($lift))
  {

    $condition_res[] .= "pa.lift='$lift'";   
  }

  if(!empty($gas_pipeline))
  {

    $condition_res[] .= "pa.gas_pipeline='$gas_pipeline'";   
  }

  $condition= implode(" and ",$condition_res);
  
  if(!empty($condition))
  {
    $cond = "on post_add.post_id=pa.post_id where $condition  and status=2";
  }
  else
  {
    $cond = "on post_add.post_id=pa.post_id where status=2";
  }
  echo $sql = "select post_add.* from post_add LEFT JOIN post_add_amenties pa $cond";
}


 /*Filters code end here*/

 $sql .= " order by post_add.post_id desc";
  

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

    
  }  
?>
<link rel="stylesheet" type="text/css" href="css/popup.css"/>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
<link rel="stylesheet" type="text/css" href="css1/fillter.css"/>
<script type="text/javascript">
    $(document).ready(function(){
    var user_id = '<?= @$_SESSION['upid']; ?>';
    var user_type = '<?= @$_SESSION['user_type']; ?>';
    
    $(".liked").click(function(){
      var link = $(this).attr("href");
      var this1 = $(this);
      if(link == "#test-popup" )  
      {
        $( "input[action='checkuser.php']" ).append("<input type='hidden' name='selected' value='selected'>");
      }else{
        var id = $(this).attr("id");
        $.ajax({
          url : "short-list.php",
          type : "POST",
          data : {post_id : id,user_id : user_id,user_type : user_type,post_type : 1},
          success : function(data){
            
            switch(parseInt(data))
            {
              case 1 :
                this1.find(".fa").addClass("bhk-un1"); 
                //alert("Successfully Shortilisted");
                $(".bhk-un1").css("color","Red");
                
                break;
              case 2 : 
                alert("Error While Shorlist");
                break;
              case 3 :
                 //alert("Deleted From Shortlist");

                $(".bhk-un1").css("color","#ccc");
                 this1.find(".fa").removeClass("bhk-un1");
                break;
              case 4 : 
                alert("Error While dis Shortlist");
                break;
            }
            
            
            
          }
          
        });
      }
      
       });
    });
</script>
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
                           <div class="filters-bt">
                           <a href="#test-popup5" class="click4 inline-popups-a">Filters</a> 
                           
                           <a  <?php if(isset($_SESSION['upid'])){?> href="?shortlisted=0" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>>
                            Shortlisted Properties</a></div>

                         </div>
                            <ul class="filter-ul">
                            	<li><a href = "filter-conventions-sub.php?type=<?php echo  @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&property_type=<?php echo @$_GET['property_type']?>">Map</a></li>
                            	<li><a href = "property-listview.php?type=<?php echo  @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&property_type=<?php echo @$_GET['property_type']?>">List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="flats-home">
                           
                          <h2><?php //echo $_GET['property_type']." for ".$_GET['type']." in ".$_GET['search_input']; ?>Properties</h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          <h6><?=$property_count?> results found. <span style="color:#f2635d;">Include nearby flats</span></h6>
                          
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
                                   
                                    <div class="bhk-un">
                                        <h1><?=$result_info['bedrooms']?>BHK, <?=$result_info['property_furnished_status']."".$result_info['property_type']?></h1>
                                        <?php  $query9=mysql_query("select * from short_lists where user_id=".$_SESSION['upid']." and post_id=".$result_info['post_id']);
                                         $like_count = mysql_num_rows($query9);
                                         ?>
                                        <a  <?php if(isset($_SESSION['upid'])){?> href='javascript:void(0)' class="liked" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>   id="<?= $result_info['post_id'];?>"><i class="fa fa-heart"<?php if(isset($like_count) && $like_count>0){?> style="color: red"<?php }?>></i></a>
                                        <div class="clear"></div>
                                     </div>
                                     <div><span class="area-div">Area: <?php echo substr($result_info['description'],0,100).'....';?></span></div>
                                      <div class="par-div">
                                        <span>5.2</span>
                                      <p class="para-1"><?php echo $result_info['address'].", ".$result_info['addres_locality'].", ".$result_info['addres_city'];?></p>                                         
                                      <div class="clearfix"></div>
                                      </div>
                                      <span class="rs-sp1"><i class="fa fa-inr"></i> <?php echo $result_info['price_monthly']."/".$result_info['price_type']?></span>
                                    </div>
                                          <div class="col-md-4">
                                              <a href="#test-popup9<?=$result_info['post_id']?>" class="inline-popups-a"  style="color:#fff; outline:none; text-decoration:none"data-effect="mfp-zoom-in">
                                              <div class="cont-but">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6 > Contact</h6>
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
                                                 <span>Parking Availability </span>
                                                 <p><?php echo $result_info['parking_2wheeler']." Bikes, ".$result_info['parking_4wheeler']." cars";?></p>
                                              </li>
                                              <li>
                                                 <span>Facing</span>
                                                 <p><?=$result_info['door_facing']?></p>
                                              </li>
                                              <li>
                                                 <span>Maintenance</span>
                                                 <p><?=@$result_info['maintenance_monthly']?></p>
                                              </li>
                                              <li>
                                                 <span>Pets Allowed</span>
                                                 <p><?=@$result_info['pets_allowed']?></p>
                                              </li>
                                              <li>
                                                 <span>Restrictions</span>
                                                 <p><?=@$result_info['rent_for']?></p>
                                              </li>
                                              
                                              <!-- <li>
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
                                              </li> -->
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
							 		//echo "There is no Results";
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
    <?php include("includes/footer.php"); ?>
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

