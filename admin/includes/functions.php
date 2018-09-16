<?php 

	function autoloader($class) { 
		$class = strtolower($class);
		$path = "includes/$class.php";

		//file_exists($path) ? require_once($path) : die("this file $class.php was not found");

		// if(file_exists($path)) {
		// 	require_once($path);
		// } else {
		// 	die("this file $class.php was not found");
		// }
		if(is_file($path) && !class_exists($class)) {
			include $path;
		}
	}
	spl_autoload_register('autoloader');



	function redirect_to($location) {
		header("Location: $location");
	}
 ?>