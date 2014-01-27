<?php

	class login{
		
		private $system;
		public $loggedin = false;
		public $user = false;
		
		public function __CONSTRUCT($system){
			
			$this->system = $system;
			$this->checkLoginAction();
			
		}
		
		public function checkLoginAction(){
			
                        if(isset($this->system->request) and isset($this->system->request->data['formkey']) and $this->system->request->data['formkey'] == 'logon'){
                            
                            $this->checkUser($this->system->request->data['user'], $this->system->request->data['password']);
                            
                        }/*else if(isset($_GET) and !empty($_GET) and isset($_GET['user'])){
				
				$this->checkUser($_GET['user'], $_GET['password']);
				
			}else if(isset($_POST) and !empty($_POST) and isset($_POST['user'])){
				
				$this->checkUser($_POST['user'], $_POST['password']);
				
			}*/else if(isset($_SESSION) and isset($_SESSION['authToken']) and !empty($_SESSION['authToken'])){
				
				$this->checkToken($_SESSION['authToken']);
				
			}
			
		}
		
		public function checkUser($username, $password){
		
			$mysqli = new mysqli("localhost", $this->system->db_username, $this->system->db_password, $this->system->db_database);

			/* check connection */
			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}

			/* Select queries return a resultset */
			if ($result = $mysqli->query("SELECT id FROM user WHERE email = '".$username."' AND password = '".$password."' LIMIT 1")) {
				//printf("Select returned %d rows.\n", $result->num_rows);

				if($result->num_rows == 1){
					if (!$result = $mysqli->query("SELECT id FROM user WHERE email = '".$username."' AND password = '".$password."' LIMIT 1")) {
						echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
					}
					
					while ($row = mysqli_fetch_array($result)) {
						$user = new user($this->system);
						$user->load($row['id']);
					}
                                        
                                        if(isset($this->system->request->data['remember'])){
                                            
                                            setcookie("remember", md5($user->id));
                                            
                                        }
					
					$_SESSION['authToken'] = $user->authToken;
					
					$this->loggedin = true;
					
					$this->user = $user;
					
				}else{
				
					print 'To many results!';
					exit;
				
				}
				
				/* free result set */
				$result->close();
			}else{
				printf("User doesn't exist");
			}
		
		}
		
		public function checkToken($token){
		
			$mysqli = new mysqli("localhost", $this->system->db_username, $this->system->db_password, $this->system->db_database);

			/* check connection */
			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}

			/* Select queries return a resultset */
			if ($result = $mysqli->query("SELECT id FROM user WHERE authToken = '".$token."' LIMIT 1")) {
				//printf("Select returned %d rows.\n", $result->num_rows);

				if($result->num_rows == 1){
					if (!$result = $mysqli->query("SELECT id FROM user WHERE authToken = '".$token."' LIMIT 1")) {
						echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
					}
					
					while ($row = mysqli_fetch_array($result)) {
						$user = new user($this->system);
						$user->load($row['id']);
					}
					
					//$_SESSION['authToken'] = $user->authToken;
					
					$this->loggedin = true;
					
					$this->user = $user;
					
				}
				
				/* free result set */
				$result->close();
			}else{
				printf("User doesn't exist");
			}
		
		}
		
		public function renderView(){
			
                        $this->checkRemember();
                    
			require_once('views'.DIRECTORY_SEPARATOR.'login'.DIRECTORY_SEPARATOR.'default.php');
			
		}
		
		public function themeUrl(){
		
			return('theme'.DIRECTORY_SEPARATOR.$this->system->theme.DIRECTORY_SEPARATOR);
		
		}
		
                public function checkRemember(){
                    
                    if(isset($_COOKIE['remember'])){
                        
                        $user = new user($this->system);
                        $respons = $user->getUserRembered($_COOKIE['remember']);
                        $this->system->request['loginremembered']['user'] = $respons["email"];
                        $this->system->request['loginremembered']['password'] = $respons["password"];
                        $this->system->request['loginremembered']['remember'] = true;
                        
                    }
                    
                }
                
	}
	
?>