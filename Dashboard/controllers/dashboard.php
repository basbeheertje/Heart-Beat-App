<?php

	class dashboard extends controller{
	
		public function IndexView(){
			
			$this->renderView('default');
			
		}
        
        public function periodiek(){
            
            $this->renderView('periodiek/peruur');
            
        }
        
        public function periodiekdag(){
            
            $this->renderView('periodiek/perdag');
            
        }
        
        public function periodiekmaand(){
            
            $this->renderView('periodiek/permaand');
            
        }
	
	}
	
?>