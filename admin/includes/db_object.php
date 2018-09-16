<?php 

	class Db_object {
		
		public $errors = [];
		public $upload_errors = [
		UPLOAD_ERR_OK => "There is no error",
		UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize",
		UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only uploaded partially",
		UPLOAD_ERR_NO_FILE => "No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
		UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
		UPLOAD_ERR_EXTENSION => "a PHP extension stopped the file upload",
	];

		public static function find_all() {
		return static::find_by_query("SELECT * FROM " . static::$db_table);
		// global $database;
		// $result_set = $database->query("SELECT * FROM users");
		// return $result_set;

	}

		//function for finding users by id...
		public static function find_by_id($id) {
			//the instance in database class
			global $database;

			//retrieving result from the database
			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id= $id");

			return !empty($the_result_array) ? array_shift($the_result_array) : false;

			// if(!empty($the_result_array)) {
			// 	$first_item = array_shift($the_result_array);
			// 	return $first_item;
			// } else {
			// 	return false;
			// }

			//fetching the results in the database
			//$found_user = mysqli_fetch_assoc($result_set);
			//return $user_found;
		}


		public static function find_by_query($sql) {

			global $database;
			//finding any query from the database
			$result_set = $database->query($sql);
			//creating an empty array
			$the_object_array = [];

			while($row = mysqli_fetch_assoc($result_set)){
				$the_object_array[] = static::instantiation($row); 
			}
			return $the_object_array;
		}

		//function for displaying query
		public static function instantiation($user_record) {
			
			$calling_class = get_called_class();
			//creating a user object/instance
			$user_object = new $calling_class;

			// $user_object->id 		= $user_found['id']; 
			// $user_object->username 		= $user_found['username']; 
			// $user_object->password 		= $user_found['password']; 
			// $user_object->first_name 	= $user_found['first_name']; 
			// $user_object->last_name 	= $user_found['last_name']; 

			foreach ($user_record as $attribute => $value) {
					//condition for checking if key exists.. returns true/false
				if($user_object->has_attribute($attribute)) {
					 //the key found equals the value
					$user_object->$attribute = $value;
				}
			}

			return $user_object;
		}

		public function has_attribute($attribute) {
									  //getting the properties of the object
			$user_object_properties = get_object_vars($this);
					//check if attribute key exists in the user_object_properties array
			return array_key_exists($attribute, $user_object_properties);
		}


		protected function properties() {
 		//return get_object_vars($this);

	 		$properties = [];

	 		foreach (static::$db_table_fields as $db_field) {

	 			if(property_exists($this, $db_field)) {
	 				$properties[$db_field] = $this->$db_field;
	 			}
	 			

	 		}
	 		return $properties;
 	}

	 	protected function clean_properties() {
	 		global $database;
	 		$clean_properties=[];

	 		foreach ($this->properties() as $key => $value) {
	 			$clean_properties[$key] = $database->escape_string($value);
	 		}
	 		return $clean_properties;
	 	}

	 	public function save() {
			return isset($this->id) ? $this->update() : $this->create();
	 	}


		public function create() {
			global $database;

			$properties = $this->clean_properties();

			$sql  = "INSERT INTO " . static::$db_table . "(" . implode("," , array_keys($properties)) . ")";      //seperator,  //array
			$sql .= "VALUES ('". implode("','", array_values($properties)) ."')";
			

			if($database->query($sql)) {
			
			 $this->id = $database->insert_id();
			 	return true;
			} else {
			 	return false;
			}
		} //end of create method

		public function update() {
			global $database;
			$properties = $this->clean_properties();
			$property_pairs = [];

			foreach($properties as $key => $value) {
				$property_pairs[] = "$key = '$value'";
			}

			$sql  = "UPDATE "  .static::$db_table. " SET ";
			$sql .=  implode(", ", $property_pairs);
			// $sql .= "username= '" 	  . $database->escape_string($this->username) 	. "', ";
			// $sql .= "password= '" 	  . $database->escape_string($this->password)	. "', ";
			// $sql .= "first_name= '"   . $database->escape_string($this->first_name) . "', ";
			// $sql .= "last_name= '"    . $database->escape_string($this->last_name) 	. "' ";
			$sql .= " WHERE id= " . $database->escape_string($this->id);

			$database->query($sql);

			return (mysqli_affected_rows($database->connection) == 1) ? true : false ;
		} //end of update method

		public function delete() {
			global $database;

			$sql = "DELETE FROM " .static::$db_table. " WHERE id = " . $database->escape_string($this->id) . " LIMIT 1";
			$database->query($sql);

			return (mysqli_affected_rows($database->connection) == 1) ? true : false ;


		} //end of delete method

		public static function count_all() {
			global $database;
			$sql = "SELECT COUNT(*) FROM ". static::$db_table ;
			$result_set = $database->query($sql);
			$row = mysqli_fetch_assoc($result_set);

			return array_shift($row);

		}




	} //end of class








 ?>