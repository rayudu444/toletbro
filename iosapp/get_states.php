<?php
include('../includes/dbutil.php');
  //extract($_POST);

  $check_count=get_row_count("tbl_state");

  if($check_count>0)
  {      
    $products=select_columns_rows_by_condition("tbl_state t","t.id,t.state_name","order by t.id asc");
    foreach ($products as $product_info1) 
    {
      //$product_info=$product_info1;     
      $results[]=$product_info1;                
    }
    
  }
  else{
    echo json_encode(array("status" => "failed"));
  }
  $results['status'] = "success";
  echo json_encode($results);
  

?>
<?php 
/*include ('../includes/dbutil.php');

    //print_r($usrData);exit;
     //update($usrData,'post_add','where post_id='.$post_id.' and upid='.$upid);
     $query= mysql_query("SELECT id,state_name FROM `tbl_state`");
     //$arr =select_columns_rows_by_condition("id,state_name","tbl_state","order by id asc");
    
     while($row =mysql_fetch_array($query)){
      $result[]=$row['id'];
      $result[]=$row['state_name'];
     }
     $result1[]=$result;



 
     $result1['status'] = 'success';
     echo json_encode($result1);
     */
    
   /*foreach ($arr as $row) {
  $result[]=$row;
}*/ 
?>