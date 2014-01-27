<?php

	class model{
	
		public $system;
	
		public function __CONSTRUCT($system){
		
			$this->system = $system;
			$query = "SHOW COLUMNS FROM `".$this->table."`";
			$columns = $this->getColumns();
			foreach($columns as $attribute){
				
				$this->$attribute = '';
				
			}
		
		}
		
		public function getColumns(){
			
			$query = "SHOW COLUMNS FROM `".$this->table."`";
			$columns = $this->select($query);
			
			$array = array();
			
			foreach($columns as $attribute){
				
				$array[] = $attribute["Field"];
				
			}
			
			return($array);
			
		}
		
		public function add(){
			
			$columns = $this->getColumns();
                        unset($columns[0]);
			
			$query = "INSERT INTO `".$this->table."` (".implode(',',$columns).") VALUES(";
			
			$counter = 0;
			
			foreach($columns as $column){
			
				if($counter != 0){
					
					$query .= ',';
					
				}
				
				$query .= '"'.$this->$column.'"';
				
				$counter++;
			
			}
			
			$query .= ")";
			
			$this->insert($query);
			
		}
		
		public function save(){
			
			$columns = $this->getColumns();
			
			$query = "UPDATE `".$this->table."` SET ";
			
			$counter = 0;
			
			foreach($columns as $column){
			
				if($counter != 0){
					
					$query .= ',';
					
				}
				
				$query .= "`".$column.'`="'.$this->$column.'"';
				
				$counter++;
			
			}
			
			$query .= " WHERE id = ".$this->id."";
			
			$this->update($query);
			
		}
		
		public function load($id){
			
			$query = "SELECT * FROM `".$this->table."` WHERE id = ".$id." LIMIT 1";
			$result = $this->select($query);
			$result = $result[0];
			foreach($result as $key => $value){
				if(gettype($key) != "integer"){
					$this->$key = $value;
				}
			}
			
		}
		
		public function select($query){
		
			$mysqli = new mysqli("localhost", $this->system->db_username, $this->system->db_password, $this->system->db_database);

			/* check connection */
			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}
			
			if (!$result = $mysqli->query($query)) {
				echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
				echo "<br/><br/>".$query;
				exit;
			}
			
			$uitvoer = array();
					
			while($row = mysqli_fetch_array($result)){
				
				$uitvoer[] = $row;
				
			}
			
			return $uitvoer;			
		
		}
	
		public function insert($query){
		
			$con=mysqli_connect($this->system->db_host,$this->system->db_username,$this->system->db_password,$this->system->db_database);
			// Check connection
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			mysqli_query($con,$query);

			mysqli_close($con);
		
		}
		
		public function update($query){
		
			$con=mysqli_connect($this->system->db_host,$this->system->db_username,$this->system->db_password,$this->system->db_database);
			// Check connection
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			mysqli_query($con,$query);

			mysqli_close($con);
		
		}
                
                public function delete(){
		
                        $query = 'DELETE FROM `'.$this->table.'` WHERE id = '.$this->id;
                    
			$con=mysqli_connect($this->system->db_host,$this->system->db_username,$this->system->db_password,$this->system->db_database);
			// Check connection
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			mysqli_query($con,$query);

			mysqli_close($con);
		
		}
	
                public function findAll(){
                    
                    $list = array();
                    
                    $query = "SELECT * FROM `".$this->table."`";
                    $result = $this->select($query);
                    
                    return($result);
                    
                }
                
	}
	
?>