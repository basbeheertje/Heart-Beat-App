<?php

	class controller{
	
		public $system;
		private $class_name;
	
		public function __CONSTRUCT($system){
		
			$this->class_name = get_class($this);
			$this->system = $system;
			$this->extractAction();
		
		}
		
		private function extractAction(){
		
			$action = explode("/",$_SERVER['REQUEST_URI']);
			
			if(isset($action[2])){
				$action = $action[2];
			}else{
				$action = '';
			}
			
			if(empty($action) or $action == ''){
				$this->IndexView();
			}else if(method_exists($this,$action)){
				$this->$action();
			}else{
				print 'Unknown action:'.$action.'<br/>';
				exit;
			}
		
		}
		
		public function renderView($filename){
		
			ob_start();
			require_once("views".DIRECTORY_SEPARATOR.$this->class_name.DIRECTORY_SEPARATOR.$filename.'.php');
			$content = ob_get_clean();
			require_once('theme'.DIRECTORY_SEPARATOR.$this->system->theme.DIRECTORY_SEPARATOR.'index.php');
		
		}
		
		public function themeUrl(){
		
			return('theme'.DIRECTORY_SEPARATOR.$this->system->theme.DIRECTORY_SEPARATOR);
		
		}
	
	}
	
?>