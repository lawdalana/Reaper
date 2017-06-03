<?php
namespace Model
class database{
	public $connection;

	function __construct(){
		$this->connect_db();
	}

	function connect_db(){
		$connection = PDO();
	}
}

?>