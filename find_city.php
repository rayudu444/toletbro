<?php 
include("includes/dbutil.php");
//echo "hiii";
$state1 = get_row_by_condition("tbl_state","WHERE state_name='".$_POST['main_cat']."'");
$state_id = $state1['id'];
$pcount=get_row_count_by_condition("tbl_city","WHERE state_id=".$state_id);
if($pcount>0)
{
	$scats=select_rows_by_condition("tbl_city","WHERE state_id=".$state_id);
}
?>
<select name="city" id="city">

<option value="">Select City</option>

<?php 
if($pcount>0){
foreach ($scats as $row) {?>

<option value='<?php echo $row['city_name']?>'><?php echo $row['city_name']?></option>

<?php } 
}?>

</select>