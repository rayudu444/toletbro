<?php 
	include_once('includes/dbutil.php');
	
	$params = array();
	$data = $_POST;
	
	$latitude = $data['location_lat'];
	$longitude = $data['location_long'];
	$distance_condition = '';
	
	$price_order = $data['price-order'];
	$posted_order = $data['posted-order'];
	
	unset($data['location_lat']);
	unset($data['location_long']);
	unset($data['posted-order']);
	unset($data['price-order']); 
	
	
	$sql = "  FROM `post_add` WHERE";
	
	foreach($data as $key => $value)
	{
		
		if($value != '')
		{
			if($key == 'bedrooms')  $sql .= " `bedrooms` =$value and";
			if($key == 'budget')  $sql .= " `price_monthly` <=$value and";
			if($key == 'listed_by')  $sql .= " `listed_by` ='$value' and";
			if($key == 'property')  $sql .= " `property` ='$value' and";
		}
	}
	//removes and or where from the string
	$sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);
	
	if($latitude != '' && $longitude != '')
	{
		$sql = "SELECT *,( 3959 * acos( cos( radians($latitude) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians( $longitude ) ) + sin( radians( $latitude) ) * sin( radians( location_lat ) ) ) ) * 1.609344 as distance".$sql;
		$sql .= " HAVING distance <= 5";
	}else{
		$sql = "SELECT * ".$sql;
			
	}
	$sql .= " order by ";
	
	if($price_order != '')
	{
		$sql .= "price_monthly $price_order,";
	}
	
	if($posted_order != '')
	{
		$sql .= "  post_id $posted_order";
	}else{
		$sql .= "  post_id desc";
	}
	
	
	
	
	
	//echo $sql;exit;
	$statement = $dbh->prepare($sql);
	$statement->execute();
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	
?>

<?php 
	if($_POST['view'] == "list_view")
	{
		if($posts){
				 	//$result=mysql_fetch_array($query);
				 	foreach($posts as $result_info) {
				 	
				?>
                            <div class="results-list-div1">
                            <div class="col-md-4 cont-im">
                            	<input type="hidden" class="latlng-length" value="<?php echo $result_info['location_lat'].','.$result_info['location_lng']; ?>"/>
                            	
                            <?php if($result_info['property_image']!=""){$dbimages = explode(",", $result_info['property_image']);}?>
                                    <img src="uploads/property_images/<?=$dbimages[0]?>"/>
                                    </div>
                                     <div class="col-md-7" style="margin-left:5%;">
                                       <div class="row">
                                          <div class="col-md-8">
                                   
                                    <div class="bhk-un">
                                        <h1><?=$result_info['bedrooms']?>BHK <?=$result_info['property_furnished_status']?></h1>
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
                                                 <h6 id="inline-popups"><a href="#test-popup9"  style="color:#fff; outline:none;"data-effect="mfp-zoom-in"> Contact Agent</a></h6>
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
                            
                            <?php }
				 	}else{
				 		echo "There is no Results";
				 	}
                            ?>
                                <div class="clearfix"></div>
      <?php }else if($_POST['view'] == 'map_view'){ echo json_encode($posts);exit;  }?>
      