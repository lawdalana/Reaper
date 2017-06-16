<?php
	require_once("../vendor/autoload.php");
	require_once("config.php");
	$database = new Model\database();

	// echo "DB_Host Hello";
	$x = $database->query_by_id(1620011);
	foreach ($x as $y) {
		echo $y."<br>";
	}

	
	// $loader = require  '../vendor/autoload.php';
	// var_dump($loader);

?>