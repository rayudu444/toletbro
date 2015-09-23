<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
  if (!isset($_SESSION['upid']) || $_SESSION['upid'] == '' )
{

echo "<script>window.location.href='index.php'</script>";exit;
}
 include_once('includes/property_header.php');
?>

        
        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>My Listings</p>
                               </div>  
                               <div class="clearfix"></div>            
        	<div class="container">
                 <div class="cont-profile-tb">
               <table class="tab-myprofile">
                  <tr>
                    <th>Property Type</th>
                    <th>Area</th>
                    <th>Monthly Rent</th>
                    <th>BHK</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  <?php 
                    $query=mysql_query("select * from post_add where upid=".$_SESSION['upid']);
                    $count=mysql_num_rows($query);
                    if($count>0)
                    {
                      while($result_info=mysql_fetch_array($query)){
                        ?>
                    <tr>
                    <td><?=$result_info['property_type']?></td>
                    <td><?=$result_info['plot_area']?></td>
                     <td><?=$result_info['price_monthly']?></td>
                    <td><?=$result_info['bedrooms']?></td>
                     <td><a href="#"><!-- <a href="convention-post.php?post=<?=$result_info['post_id']?>"> --><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="del-property.php?post=<?=$result_info['post_id']?>"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                    <?php }
                    }else {?>
                       <tr>
                    <td>No results</td>
                      </tr>
                    <?php }
                  ?>
                  
              </table>
                 
                 </div>
                 
                 <div class="cont-add-im">
                    <img src="images/add-cont12.jpg"/>
                 
                 </div>
            </div>
        </div>
        
        <?php include("includes/footer.php")?>