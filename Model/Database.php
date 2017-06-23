<?php
namespace Model;
use mysqli;
require_once("../Core/config.php");

class database{
	private $connection;

	function __construct(){
		$this->connect_db();
	}

	function connect_db(){
		try{
			$this->connection = new mysqli(DB_Host, DB_User, DB_Pass,DB_Name);
			// var_dump($connection);
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}
		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	public function searchTitle($title){
		$title = $this->real($title);
		$sql = "select title, fav, chapter, visitor_all, visitor, id, username
		from result
		where title like '%".$title."%'
		AND DATEDIFF(NOW(),updated)<=30
		AND published=\"N\"
		AND chapter>=28
		order by result_value desc, fav desc";
		$statement = $this->connection->prepare($sql);
		return $statement->exec($data_array);
	}

	// public function query_by_id($id){
	// 	$id = $this->real($id);
	// 	$statement = "SELECT * FROM ". DB_Info ." WHERE ID = " .$id;
	// 	$result = $this->connection->query($statement);
	// 	return $result->fetch_assoc();
	// }

	public function real($str){
		$est_string = $this->connection->real_escape_string($str);
		return $est_string;
	}
}
?>
