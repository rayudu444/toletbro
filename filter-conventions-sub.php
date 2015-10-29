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
  if(isset($_POST['filter_search']))
{
  extract($_POST);
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
  if(!empty($property))
  {

    $condition_res[] .= "property='$property'";   
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
  /*if(!empty($Amenities))
  {
    $amen =implode(",", $Amenities);
    //$condition_res[] .= "amenities like ".'%'.$amen.'%';   
    $condition_res[] .= "amenities = '$amen'";   
  }
 
  if(!empty($SocietyAmenities))
  {
    $amen1 =implode(",", $SocietyAmenities);
    //$condition_res[] .= "amenities like ".'%'.$amen.'%';   
    $condition_res[] .= "society_amenities = '$amen1'";   
  }*/

  $condition= implode(" and ",$condition_res);
  
  if(!empty($condition))
  {
    $cond = "where $condition and status=2";
  }
  else
  {
    $cond = "where status=2";
  }
  $sql = "select * from post_add $cond";
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
/*  $statement = $dbh->prepare($sql);
  $statement->execute();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);*/
 
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

<script src="js/markerwithlabel.js"></script>
 <script>
 	var map = null;
 	var markers = [];
	$(function(){
		$(document).on("click","#popup-close",function(){
				$(".dialog").empty();
				$(".dialog").hide();
		});		
	});

	function emptyMarker()
	{
		for (var i = 0, marker; marker = markers[i]; i++) {
		      marker.setMap(null);
		    }
	}
	

	//initializing google maps
	function initialize12() {
	 
	 
	  var mapProp = {
	    center:new google.maps.LatLng(17.410097,78.4607968),
	    zoom:18,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	   map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  
		
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
	      
		 var pictureLabel<?= $count;?> = document.createElement("img");
    	 pictureLabel<?= $count;?>.src = '<?php echo  "uploads/property_images/".$image; ?>';
    	 pictureLabel<?= $count;?>.style.height = '50px';
    	 pictureLabel<?= $count;?>.style.width = '50px';
    	 
	     var marker<?= $count;?> =  new MarkerWithLabel({
	    	 position: latlnt<?= $count;?>,
	    	   
	    	   map: map,
	    	   labelContent: pictureLabel<?= $count;?>,
	           labelAnchor: new google.maps.Point( 24, 37),
	           labelClass: "labels", // the CSS class for the label
	           labelInBackground: false,
	           icon : " "
	           
	         });
	      markers.push(marker<?= $count;?>);
	      marker<?= $count;?>.image = '<?= $image;?>';
	      marker<?= $count;?>.address = '<?= str_replace('"',' ',trim($post['addres_locality'])) ;?>';
	      marker<?= $count;?>.price = '<?= $post["price_monthly"];?>';
	      marker<?= $count;?>.bedrooms = '<?= $post["bedrooms"];?>';
	      marker<?= $count;?>.furnished = '<?= $post["property_furnished_status"];?>';
	      marker<?= $count;?>.description = '<?= str_replace('"',' ',trim(substr($post["description"],0,100))) ;?>';
	      marker<?= $count;?>.area = '<?=  ($post["plot_state"]== 1)? $post["plot_area"].' Square feets' : $post["plot_area"].' Square yards'; ?>';
	     
	      google.maps.event.addListener(marker<?= $count;?>, 'click', markerClicked<?= $count;?>);
	
	       function markerClicked<?= $count;?>(e) {
		       
	    	   var popup_content = '<div class="pop-ums"><a href="javascript:void(0);" id="popup-close" style="float:right;">X</a><div class="col-im-87"><img src="uploads/property_images/'+ marker<?= $count;?>.image+'"/></div><div class="col-im-88">';
	    	   popup_content += "<h3>"+marker<?= $count;?>.bedrooms+"BHK FLAT "+marker<?= $count;?>.furnished+"</h3><h6>Price:"+marker<?= $count;?>.price+"</h6>"; 
	    	   popup_content += '<ul style="list-style-type: none;"><li>Area : '+marker<?= $count;?>.area+'</li><li>Description :'+ marker<?= $count;?>.description+' </li></ul></div> <div class="clearfix"></div></div>';
               
               $(".dialog").empty();
               $(".dialog").append(popup_content);
               $(".dialog").show();
	          return false;
	       }
	       
	  <?php ++$count; } ?>
	  map.setZoom(12)
	}
	google.maps.event.addDomListener(window, 'load', initialize12);
</script>
<script>
	function markerClicked(e) {
	    
		   var popup_content = '<div class="pop-ums"><a href="javascript:void(0);" id="popup-close" style="float:right;">X</a><div class="col-im-87"><img src="uploads/property_images/'+ this.image+'"/></div><div class="col-im-88">';
		   popup_content += "<h3>"+this.bedrooms+"BHK FLAT "+this.furnished+"</h3><h6>Price:"+this.price+"</h6>"; 
		   popup_content += '<ul style="list-style-type: none;"><li>Area : '+this.area+'</li><li>Description :'+ this.description+' </li></ul></div> <div class="clearfix"></div></div>';
	    
	    $(".dialog").empty();
	    $(".dialog").append(popup_content);
	    $(".dialog").show();
	   return false;
	}
	$(document).ready(function(){
		$(".post-filters").change(function(){
			var formData = new FormData();
			formData.append("property",$("#type").val());
			formData.append("location_lat",$("#lat").val());
			formData.append("location_long",$("#lng").val());
			formData.append("bedrooms",$("#bhk").val());
			formData.append("budget",$("#budget").val());
			formData.append("listed_by",$("#listed-by").val());
			formData.append("view","map_view");
			formData.append("price-order",$("#sort-by-price").val());
			formData.append("posted-order",$("#sort-by-posted").val());
			 $.ajax({
			        url: 'filter-posts.php',
			        data: formData,
			        contentType: false,
			        processData: false,
			        type: 'POST',
			        success: function(data){
						var posts = JSON.parse(data); 
						//getting lat n lng values
						/*var lat = $("#lat").val();
					   	var lng = $("#lng").val();
						if(lat != '' && lng != '')
						{
							var panPoint = new google.maps.LatLng(lat, lat);
					        map.panTo(panPoint);
						}*/
					   	
					   	
						$(".content").empty();
						if(posts.length >0)
						{	
							emptyMarker();
							$.each(posts,function(index,value){
								
					        	var image = '';
					        	if(value.property_image != '')
					        	{
						        	var image = value.property_image.split(",")[0];
					        	}
					        	//creating div elements
				        		var post = '<div class="results-list-div">'+
				             	'<div class="col-md-4 cont-im">'+
				                     '<img src="'+  "uploads/property_images/"+image+'"/>'+
				                 '</div>'+
				                 '<div class="col-md-8">'+
				                
				                 '<div class="bhk-un">'+
				                     '<h1>'+value.bedrooms+' BHK'+ value.property_furnished_status+'</h1>'+
				                     '<i class="fa fa-heart-o"></i>'+
				                     '<div class="clear"></div>'+
				                  '</div>'+
				                   '<p class="para-1">'+value.description.substr(0,200)+'</p>'+
				                  '<div class="cont-sit-but">'+
				                   '<span class="rs-sp"><i class="fa fa-inr"></i>'+value.price_monthly+'</span>'+
				                    
				                    '<div class="clearfix"></div>'+
				                   '</div>'+
				                 '</div>'+
				                 '<div class="clearfix"></div>'
				             	'</div>'+
				         		'<div class="clearfix"></div>';
				         		
				         		//creating latlng object
				         		var latlnt = new google.maps.LatLng(value.location_lat,value.location_long);
				         	
				         		var pictureLabel = document.createElement("img");
					           	 pictureLabel.src = "uploads/property_images/"+image; ;
					           	 pictureLabel.style.height = '50px';
					           	 pictureLabel.style.width = '50px';
					           	 
					       	     var marker =  new MarkerWithLabel({
					       	    	position: latlnt,
					       	    	map: map,
					       	    	labelContent: pictureLabel,
					       	        labelAnchor: new google.maps.Point( 24, 37),
					       	        labelClass: "labels", // the CSS class for the label
					       	        labelInBackground: false,
					       	        icon : " "
					       	           
					       	      });
					       	      markers.push(marker);
					       	   	  marker.image = image;
					 	          marker.address = value.description;
					 	          marker.price = value.price_monthly;
					 	          marker.bedrooms = value.bedrooms;
					 	          marker.furnished = value.property_furnished_status;
					 	          marker.description = value.description.substr(0,200);
					 	          marker.area =  (value.plot_state== 1)? value.plot_area+" Square feets" : "$post[plot_area] Square yards"; 
					 	          google.maps.event.addListener(marker, 'click', markerClicked);
								  
				         		
				         		
				        		$(".content").append(post);
					        });
						}else{
							emptyMarker();
							$(".content").append("<span style='color:red'>No posts found</span>");
						}
				        	
						
				}
			  });
			
		});
	});
</script>

			<div class="dialog" style="display:none;" >
				
              </div>
        <div class="container-fluid white-div-wrapper"> 
        	<div class="row"> 
	            <div class="col-md-6 results-left-div">
                	<div>
                    	<div class="filter-inner-div">
                        	<h2><?php echo $_GET['property_type']." for ".$_GET['type']." in ".$_GET['search_input']; ?> Properties</h2>
                            <ul  class="filter-ul">
                            	<li><a href = "filter-conventions-sub.php?type=<?php echo  @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&property_type=<?php echo @$_GET['property_type']?>">Map</a></li>
                            	<li><a href = "property-listview.php?type=<?php echo  @$_GET['type']?>&lat=<?php echo @$_GET['lat']?>&lng=<?php echo @$_GET['lng']?>&search_input=<?php echo @$_GET['search_input']?>&property_type=<?php echo @$_GET['property_type']?>">List</a></li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>

                        <div class="row flats-found">
                        
                          <h6><?=$property_count?> flats found. <span style="color:#f2635d;">Include nearby flats</span></h6>
                          
                         <div class="clear"></div>
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
	                            	<div class="col-md-4 cont-im1">
	                                    <img src="<?php echo  "uploads/property_images/".@$image; ?>"/>
                                    </div>
                                    <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?= $post['bedrooms']; ?> BHK <?= $post['property_furnished_status'] ?></h1>
                                        <?php  $query9=mysql_query("select * from short_lists where user_id=".$_SESSION['upid']." and post_id=".$post['post_id']);
                                         $like_count = mysql_num_rows($query9);
                                         ?>
                                        <a  <?php if(isset($_SESSION['upid'])){?> href='javascript:void(0)' class="liked" <?php }else{?> href='#test-popup' class="inline-popups-a" <?php }?>   id="<?= $post['post_id'];?>"><i class="fa fa-heart"<?php if(isset($like_count) && $like_count>0){?> style="color: red"<?php }?>></i></a>
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
                    </div> -->
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
