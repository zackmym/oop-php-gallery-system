<?php 
	class Db {

		private $conn;

		function __construct() {
			$this->db_conn();
		}

		public function db_conn() {

			define('DB_SERVER', 'localhost');
			define('DB_USER', 'root');
			define('DB_PASS', '');
			define('DB_NAME', 'gallery');

			$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

			if($this->conn->connect_errno) {
				die('Query Failed! '. $this->conn->connect_error);
			}
		}

	}

	$database = new Db();

 ?>