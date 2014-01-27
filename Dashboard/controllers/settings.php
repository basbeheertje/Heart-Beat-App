<?php

	class settings extends controller{
	
		public function IndexView(){
			
			$this->renderView('default');
			
		}
		
		public function alerts(){
			
			$this->renderView('alerts'.DIRECTORY_SEPARATOR.'default');
			
		}
	
	}
	
?>