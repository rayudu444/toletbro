<?php
	include_once('includes/dbutil.php');
	
	$params = array();
	$data = $_POST;
	
	$latitude = $data['location_lat'];
	$longitude = $data['location_long'];
	$distance_condition = '';
	
	unset($data['location_lat']);
	unset($data['location_long']);
	