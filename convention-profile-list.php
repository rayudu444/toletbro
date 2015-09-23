<?php 
  session_start(); 
  include_once('includes/dbutil.php');
 
  if (!isset($_SESSION['cnv_upid']) || $_SESSION['cnv_upid'] == '' )
{

echo "<script>window.location.href='convention-centre.php'</script>";exit;
}
 include_once('includes/convention_header.php');
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
                    <th>Title</th>
                    <th>Convention Type</th>
                    <th>Contact Person</th>
                    <th>Mobile</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  <?php 
                    $query=mysql_query("select * from convention_post_add where cnv_upid=$_SESSION[cnv_upid]");
                    $count=mysql_num_rows($query);
                    if($count>0)
                    {
                      while($result_info=mysql_fetch_array($query)){
                        ?>
                    <tr>
                    <td><?=$result_info['title']?></td>
                    <td><?=$result_info['convention_type']?></td>
                     <td><?=$result_info['contact_person_name']?></td>
                    <td><?=$result_info['contact_person_mobile']?></td>
                     <td><a href="#"><!-- <a href="convention-post.php?post=<?=$result_info['convention_post_id']?>"> --><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="del-convention.php?post=<?=$result_info['convention_post_id']?>"><i class="fa fa-trash-o"></i></a></td>
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