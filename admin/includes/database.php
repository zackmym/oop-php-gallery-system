<?php
require_once("new_config.php"); 

class Database {

	public $connection;

	function __construct() {

		$this->open_db_connection();
	}

	public function open_db_connection() {
		//$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		if($this->connection->connect_errno) {

		die("Database Connection Failed!! ". $this->connection->connect_error);

		}
	}

	public function query($sql) {
		//$result = mysqli_query($this->connection, $sql);
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
		return $result;
	}

	private function confirm_query($result){
		if(!$result) {
			die("Query Failed!! ". $this->connection->error);
		}
	}

	public function escape_string($string) {
		$escaped_string = $this->connection->real_escape_string($string);

		return $escaped_string;
	}

	public function insert_id() {
		//getting the last id inserted 
		return $this->connection->insert_id;
	}



}

$database = new Database();


	
 ?>