<?php
//error_reporting(0);
define ( "DB_HOST", "localhost" );
define ( "DB_USER", "root" );
define ( "DB_PASS", "" );
define ( "DB_NAME", "toletbro" );

include_once 'database.class.php';
$dbh = new Database_class();
 
 $uri = "http://localhost/toletbro";
 define('URI', $uri);

mysql_connect("localhost","root","");
//mysql_connect("localhost","docniin_timesnap","timesnappy");
mysql_select_db("toletbro");
 
 date_default_timezone_set('Asia/Calcutta');

 /**
  * for inserting data into table
  */
function insertdata($usrData,$table_name) 
{
  
   $count = 0;
   $fields = '';

   foreach($usrData as $col => $val) {
      if ($count++ != 0) $fields .= ', ';
      $col = @mysql_real_escape_string($col);
      $val = @mysql_real_escape_string($val);
      $fields .= "`$col` = '$val'";
   }

   //echo "INSERT INTO `$table_name` SET $fields";  exit();    
    if($query = mysql_query("INSERT INTO `$table_name` SET $fields"))
    {
    	return 1;
    }else{
    	return 0;	
    }
}

/**
 * returns number of rows fetched 
 */
function get_row_count($table){
	//echo "select * from $table  $cond";exit;
	$query=mysql_query("select * from $table");
	$count=mysql_num_rows($query);
	return $count;
}

/**
 * returns number of rows fetched by condition
 */
function get_row_count_by_condition($table,$cond){
	//echo "select * from $table  $cond";exit;
	$query=mysql_query("select * from $table  $cond");
	$count=mysql_num_rows($query);
	return $count;
}

//For single Data
function selectdata($table){

	$query=mysql_query("select * from $table");
	
	$row=mysql_fetch_assoc($query);
	return $row;
}

//getting max id in table
function get_max_id($table_name,$column_name)
{

	$query=mysql_query("select max($column_name) as maxid from $table_name");
	
	$row=mysql_fetch_assoc($query);
	return $row;
}
/**
 * returns all the data in the table
 */
function get_all_data($table){
	
	$query=mysql_query("select * from $table");
	$len=mysql_num_rows($query);
	while($row=mysql_fetch_assoc($query)){
	$arr[]=$row;
	}
	return $arr;
}
/**
 * returns single row by specific condition
 */
function get_row_by_condition($table,$cond){
  //echo "select * from $table  $cond";exit();
  $query=mysql_query("select * from $table  $cond");
  $row=mysql_fetch_assoc($query);
  return $row;
}

/**
 * selcts particular column with specific condition
 */
function selected_columns_by_condition($table,$cols,$condition)
{
  //echo "select $cols from $table  $condition";exit();
  $query=mysql_query("select $cols from $table  $condition");
  $row8=mysql_fetch_assoc($query);
  return $row8;
}

/* function count_columns_rows_by_condition($table,$cols,$condition)
{
  $query=mysql_query("select $cols from $table  $condition");
  $count8=mysql_num_rows($query);
  return $count8;
}
 */
/**
 * selct multiple rows by  particular column with specific condition
 */
function select_columns_rows_by_condition($table,$cols,$condition)
{
 //echo  "select $cols from $table  $condition"; //exit();
 $query=mysql_query("select $cols from $table  $condition");
 while($row8=mysql_fetch_assoc($query))
 {
		$arr8[]=$row8;
 }
 return $arr8;
}


/*select multiple rows by condition*/
function select_rows_by_condition($table,$cond){
	
	//echo "select * from $table  $cond";exit();
	$query=mysql_query("select * from $table  $cond");
	while($row9=mysql_fetch_assoc($query))
	{
	$arr[]=$row9;
	}
	
	return $arr;
}	

//delete row basedon condition
function delete_row($table,$cond){
	
	
	$query=mysql_query("delete  from $table   $cond");
	//echo $_SERVER['HTTP_REFERER'];

//$url=$_SERVER['HTTP_REFERER'];
//header("location:$url");
 return $query;
}
//Update table based on contion	
function update($usrData,$table,$cond) {
   $count = 0;
   $fields = '';

   foreach($usrData as $col => $val) {
      if ($count++ != 0) $fields .= ', ';
      $col = mysql_real_escape_string($col);
      $val = mysql_real_escape_string($val);
      $fields .= "`$col` = '$val'";
   }
   //echo "UPDATE `$table` SET $fields $cond";exit();
    mysql_query("UPDATE `$table` SET $fields $cond");
   return mysql_affected_rows();
   
}	
function GetAge($y, $m, $d) {
  $Year = $y;
  $Month = $m;
  $Day = $d;
  $YearDifference  = date("Y") - $Year;
  $MonthDifference = date("m") - $Month;
  $DayDifference   = date("d") - $day;
  if ($DayDifference < 0 || $MonthDifference < 0) {
    $YearDifference--;
  }
  return $YearDifference;
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
 function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );
	  for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
   return $print;
	}

  /**
   * creates school specific tables 
   */
  function create_school_specific_tables($school_id)
  {
    $create_student_table = "create table ".$school_id."_students(id INT NOT NULL AUTO_INCREMENT primary key,student_id varchar(255),student_registration varchar(255),";
    $create_student_table .= "date_of_birth Date,first_name varchar(255),class_roll varchar(255),middle_name varchar(255),last_name varchar(255),house varchar(255),";
    $create_student_table .= "res_address text,res_phone varchar(255),mother_name varchar(255),father_name varchar(255),gender varchar(255),class varchar(255))";
    
    $create_classes_table = "create table ".$school_id."_classes(id INT NOT NULL AUTO_INCREMENT primary key,class_id varchar(255),class_name varchar(255),group_id int(11),subjects varchar(255))";
    mysql_query($create_students_table);
    mysql_query($create_classes_table);
  }

  //grades for school progress report
  function get_grade($average)
  {
    if($average >= 4.0 && $average <= 5.0)
      return 'A';
    if($average >= 3.0 && $average <= 3.99)
      return 'B';
    if($average >= 2.0 && $average <= 2.99)
      return 'C';
    if($average >= 1.0 && $average <= 1.99)
      return 'D';
    if($average >= 0.0 && $average <= 0.99)
      return 'E';
  }
	
?>