<?php
include('../includes/dbutil.php');
include('includes/validation.php');
$parameters = array("state_id");
$is_parameter_available = is_post_parameters_exists($parameters);

if($is_parameter_available == 0)
{
  extract($_POST);

  $check_count=get_row_count_by_condition("tbl_city","where state_id='".$state_id."' ");

  if($check_count>0)
  {      
    $cities=select_columns_rows_by_condition("tbl_city t","t.id,t.city_name","where t.state_id='".$state_id."'");
    foreach ($cities as $ct_info1) 
    {
      //$product_info=$product_info1;     
      $results[]=$ct_info1;                
    }
    $results['status'] = "success";
    echo json_encode($results);
    
  }
  else{
    echo json_encode(array("status" => "There is no data"));
  }
  
  
}
else
{
  echo json_encode(array("status" => "failed"));
}
?>


