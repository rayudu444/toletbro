<?php
	
	function is_post_parameters_exists($parameters)
	{
		$is_parameter_available = 0;
		foreach ($parameters as $parameter) {
			if(!isset($_POST[$parameter]) || $_POST[$parameter] == null || $_POST[$parameter] == "" ) {
				++$is_parameter_available;
			}
		}
		return $is_parameter_available;
	}

	function is_get_parameters_exists($parameters)
	{
		$is_parameter_available = 0;
		foreach ($parameters as $parameter) {
			if(!isset($_GET[$parameter]) || $_GET[$parameter] == null || $_GET[$parameter] == "" ) {
				++$is_parameter_available;
			}
		}
		return $is_parameter_available;
	}
?>