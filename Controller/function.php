<?php
	function redirect($location){
		header("Location: {$location}.php");
		exit(0);
	}
?>