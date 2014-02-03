<?php

	class system{
	
		public $controller;
		public $theme = 'base';
		public $models = array('model','share','device','deviceTypes','deviceData','alert','alertTypes','alertReceivers','user','userAttributes');
		public $needs = array('controller','login','dashboard','settings','logout','generaterandom');
		public $db_database = 'schoolminor';
		public $db_username = 'schoolminor';
		public $db_password = 'schoolminor';
		public $db_host = 'localhost';
		public $user;
		public $currentpage = 'dashboard';
                public $request;
		
		public function __CONSTRUCT(){
		
                        $this->createRequest();
			$this->loadAllModels();
			$this->loadAllNeeds();
			$this->extractController();
			$this->selectMenu();
			
			if($this->checkUser() == false){
				$view = new login($this);
				$view->renderView();
			}else{
				$this->loadController();
			}
		
		}
                
                public function createRequest(){
                    
                    if(isset($_POST) and !empty($_POST)){
                        
                        foreach($_POST as $key => $value){
                            
                            $this->request->data[$key] = $value;
                            
                        }
                        
                    }
                    if(isset($_GET) and !empty($_GET)){
                        
                        foreach($_GET as $key => $value){
                            
                            $this->request->data[$key] = $value;
                            
                        }
                        
                    }
                    
                }
		
		public function checkUser(){
		
			$this->user = new login($this);
			if($this->user->loggedin == true){
				$this->user = $this->user->user;
				return true;
			}
			
			return false;
		
		}
		
		public function loadAllModels(){
			
			foreach($this->models as $model){
			
				require_once('models'.DIRECTORY_SEPARATOR.$model.'.php');
			
			}
			
		}
		
		public function loadAllNeeds(){
		
			foreach($this->needs as $controller){
			
				require_once('controllers'.DIRECTORY_SEPARATOR.$controller.'.php');
			
			}
		
		}
	
		public function extractController(){
			
			$this->controller = explode("/",$_SERVER['REQUEST_URI']);
			$this->controller = $this->controller[1];
			
		}
	
		public function loadController(){
			
			if(empty($this->controller) or $this->controller == ""){
				$this->controller = new dashboard($this);
			}else if(!class_exists($this->controller,false)){
				echo 'Controller: '.$this->controller.' not found!';
				exit;
			}else{
				$this->controller = new $this->controller($this);
			}
			
		}
	
		public function selectMenu(){
		
			$alerts = array('/settings/alertEdit','/settings/alertRemove','/settings/alertAdd','/settings/alerts');
			$settings = array('/settings/','/settings/edit/','/settings/addAvatar/','/settings/');
                        $shares = array('/settings/sharesEdit','/settings/sharesRemove','/settings/sharesAdd','/settings/shares');
		
			if(in_array($_SERVER['REQUEST_URI'],$alerts)){
				
				$this->currentpage = 'alerts';
				
			}else if(in_array($_SERVER['REQUEST_URI'],$settings)){
			
				$this->currentpage = 'settings';
			
			}else if(in_array($_SERVER['REQUEST_URI'],$shares)){
			
				$this->currentpage = 'shares';
			
			}
		
		}
	
	}
	
?>