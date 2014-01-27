<?php

	class logout extends controller{
	
		public function IndexView(){
			
                    
                    unset($_SESSION);
                    session_unset();
                    session_destroy();
                    Header( "HTTP/1.1 301 Moved Permanently" ); 
                    Header( "Location: /" ); 
			
		}
	
	}
	
?>