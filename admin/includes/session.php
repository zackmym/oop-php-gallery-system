<?php 
	class Session {
		private $logged_in = false;
		public  $id;
		public  $message;
		public  $count;

		//constructor to automatically call these functions
		public function __construct() {
			session_start();
			$this->check_login();
			$this->check_message();
			$this->views_count();

		}

		public function views_count() {
			if(isset($_SESSION['count'])) {
				return $this->count = $_SESSION['count']++;
			} else {
				return $_SESSION['count'] = 1;
			}
		}
		
		//used to access private property of logged_in 
		//to check if logged in or not
		public function is_logged_in() {
			return $this->logged_in; 
		}

		// checking the database if the user exists
		public function login($user) {
			if($user) {
				$this->id = $_SESSION['id'] = $user->id;
				$this->logged_in = true;
			}
			
		}

		//logging out
		public function logout() {
			unset($this->id); 
			unset($_SESSION['id']); 
			$this->logged_in = false;
		}

		//checking if a session is established
		public function check_login() {

			if(isset($_SESSION['id'])) {
				$this->id = $_SESSION['id'];
				$this->logged_in = true;
			} else {
				unset($this->id);
				$this->logged_in = false;
			}
		}

		public function message($msg = "") {
			if (!empty($msg)) {
				$_SESSION['message'] = $msg; 
			} else {
				return $this->message;
			}
		}

		private function check_message() {
			if(isset($_SESSION['message'])) {
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);
			} else {
				$this->message = "";
			}
		}
	}

	$session = new Session();
 ?>