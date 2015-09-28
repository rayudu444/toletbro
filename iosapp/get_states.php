<?php
include('../includes/dbutil.php');
  //extract($_POST);

  $check_count=get_row_count("tbl_state");

  if($check_count>0)
  {      
    $states=select_columns_rows_by_condition("tbl_state t","t.id,t.state_name","order by t.id asc");
    foreach ($states as $st_info1) 
    {
      //$product_info=$product_info1;     
      $results[]=$st_info1;                
    }
     $results['status'] = "success";
     echo json_encode($results);
    
  }
  else{
    echo json_encode(array("status" => "failed"));
  }
 
  

?>
