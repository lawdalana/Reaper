<?php
namespace Model;
use PDO;
require_once("../Core/config.php");

class database{
	private $connection;

	function __construct(){
		$this->connect_db();
	}

	function connect_db(){
		try{
			$connection = new PDO("mysql:host=". DB_Host .";dbname=".DB_Name , DB_User, DB_Pass);
		}catch (PDOException $e){
			echo $e->getMessage();
		}
		
		
	}

	public function query($sql, $data_array){
		if(is_array($data_array)){
			$statement = $connection->prepare(sql);
			return $statement->exec($data_array);
		}
		
	}

	public function query_by_id($id){
		$statement = $connection->prepare("SELECT * FROM ". DB_Info ."WHERE ID = :ID");
		$data = array(':ID' => $id );
		return $statement->exec($data_array);
	}

}

?>