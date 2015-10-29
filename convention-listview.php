<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 include_once('includes/inner-header.php');
  include_once('convention-filters.php');
 
  //$sql = "select * from convention_post_add";
 $sql = (isset($_GET['shortlisted']) && isset($_SESSION['upid']))? "select * from convention_post_add cpa inner join short_lists ON short_lists.post_id = cpa.convention_post_id where short_lists.user_id =  $_SESSION[upid] and short_lists.post_type=2 " :  "select * from convention_post_add";
 
 if((isset($_GET['lng'],$_GET['ctype']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')  )
 {

     $lat = $_GET['lat'];
     $lng = $_GET['lng'];
     $sql =  "select *, ( 3959 * acos( cos( radians($lat) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians( $lng ) ) + sin( radians( $lat) ) * sin( radians( location_lat ) ) ) ) as distance from convention_post_add where status=2 ";
  }
  else if(isset($_GET['ctype']))
  {
      $type = $_GET['ctype'];
    
      $sql .= " where ctype='$type' and status=2";
  } 
  
  if((isset($_GET['lng']) && $_GET['lng'] != '') && (isset($_GET['lat']) && $_GET['lat'] != '')) 
  {
  		if($_GET['lat']=='17.385044' && $_GET['lng']=='78.486671'){
      $sql .= " HAVING distance  <= 40";
    }else{$sql .= " HAVING distance  <= 5";}
  }
  
  $sql .= " order by convention_post_id desc";

  $statement = $dbh->prepare($sql);
  $statement->execute();
   $conv_count = $statement->rowCount();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
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
          data : {post_id : id,user_id : user_id,user_type : user_type,post_type : 2},
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

        <div class="container-fluid white-div-wrapper" > 
        	<div class="row"> 
	            <div class="col-md-12 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	 <div class="list-uls">
                           <div class="filters-bt">
                           <a href="#test-popup5" class="click4 inline-popups-a">Filters</a> <a  <?php if(isset($_SESSION['upid'])){?> href="?shortlisted=0" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>> Shortlisted Conventions</a> </div>

                        </div>
                            <ul class="filter-ul">
                            	<li><a href = "conventions-map-view.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&ctype=<?php echo @$_GET['ctype']?>">Map</a></li>
                            	<li><a href = "convention-listview.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&ctype=<?php echo @$_GET['ctype']?>">List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="flats-home">
                           
                          <h2><?php //echo $_GET['ctype']."'s in ".$_GET['search_input']; ?>Convention Centers</h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row flats-found">
                        
                          <h6><?=$conv_count?> Results found. <span style="color:#f2635d;"><!-- Include nearby flats --></span></h6>
                          <!-- <ul class="date-add">

                            <li><i class="fa fa-heart-o" style="margin-right:2px;"></i>0 Shortlisted Properties </li>
                            
                          </ul> -->
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
	                                    <img src="uploads/convention_images/<?=$dbimages[0]?>" style="height:280px" />
                                    </div>
                                     <div class="col-md-7" style="margin-left:5%;">
                                       <div class="row">
                                          <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?=$result_info['title']?></h1>
                                        <!-- <i class="fa fa-heart-o"></i> -->
                                        <?php  $query9=mysql_query("select * from short_lists where user_id=".$_SESSION['upid']." and post_id=".$result_info['convention_post_id']);
                                         $like_count = mysql_num_rows($query9);
                                         ?>
                                        <a  <?php if(isset($_SESSION['upid'])){?> href='javascript:void(0)' class="liked" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>   id="<?= $result_info['convention_post_id'];?>"><i class="fa fa-heart"<?php if(isset($like_count) && $like_count>0){?> style="color: red"<?php }?>></i></a>

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
                                          <a href="#test-popup9<?=$result_info['convention_post_id']?>" class="inline-popups-a"  style="color:#fff; outline:none; text-decoration:none"data-effect="mfp-zoom-in">
                                              <div class="cont-but">
                                              
                                                 <i class="fa fa-phone"></i>
                                                 <h6> Contact</h6>
                                                  <div class="clearfix"></div>
                                             </div> </a>
                                         
                                         </div>
                                                                                                  <!--popup code start here-->
                              <div id="test-popup9<?=$result_info['convention_post_id']?>" class="white-popup mfp-with-anim mfp-hide">
            <div class="col-md-12 left-part-12">
                            <div class="col-md-6">  
                                <div class="agent-name">
                                    <p><?=$result_info['contact_person_name']?></p>
                                     <p><? //=$result_info['listed_by']?></p>
                                     <h2><?=$result_info['contact_person_mobile']?></h2>
                                </div>
                             </div>
                             <div class="col-md-6"> 
                                <div class="flat-603">
                                    <h6> Flat id: 602404</h6>
                                    <div class="address-flat">
                                        <h4> 2 BHK , Unfurnished </h4>
                                        <p>Banjara Hills</p>
                                        <span><i class="fa fa-inr"></i>16,000</span>
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
    <?php include("includes/footer.php") ?>
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