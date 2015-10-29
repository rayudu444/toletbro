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
                        	<h3><?php //echo $_GET['ctype']."'s in ".$_GET['search_input']; ?>
                          Convention Centers
                          </h3>
                            <ul  class="filter-ul">
                            	<li><a href="conventions-map-view.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">Map</a></li>
                                <li><a href="convention-listview.php?lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>">List</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row flats-found">
                        
                          <h6><?=$conv_count?> Results found. <span style="color:#f2635d;"><!-- Include nearby flats --></span></h6>
                          <!-- <ul class="date-add">

                            <li><i class="fa fa-heart-o" style="margin-right:2px;"></i>0 Shortlisted Properties </li>
                            
                          </ul> -->
                         <div class="clear"></div>
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
	                            	<div class="col-md-4 cont-im1">
	                                    <img src="<?php echo  "uploads/convention_images/".@$image; ?>"/>
                                    </div>
                                    <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?= $post['title']; ?> </h1>
                                        <?php  $query9=mysql_query("select * from short_lists where user_id=".$_SESSION['upid']." and post_id=".$post['convention_post_id']);
                                         $like_count = mysql_num_rows($query9);
                                         ?>
                                        <a  <?php if(isset($_SESSION['upid'])){?> href='javascript:void(0)' class="liked" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>   id="<?= $post['convention_post_id'];?>"><i class="fa fa-heart"<?php if(isset($like_count) && $like_count>0){?> style="color: red"<?php }?>></i></a>
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
                    </div><!--
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
                     </div>-->
                </div>
                <div class="col-md-6 map-right-div" id="googleMap" style="height:700px;">
                	
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
