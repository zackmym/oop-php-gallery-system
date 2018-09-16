<?php 
	class Database {
		public $conn 
		public  function open_database() {
			$this->conn = new mysqli('localhost', 'root', '', 'gallery');
		
		if($this->conn->connect_errno) {
			die('query Failed!! '. $this->connect_error);
			} 
		}

		public function find_query() {
			$this->conn->query('SELECT * FROM users');
		}
	}
 ?>