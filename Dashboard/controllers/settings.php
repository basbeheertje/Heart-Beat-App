<?php

	class settings extends controller{
	
		public function IndexView(){
			
			$this->renderView('default');
			
		}
		
		public function alerts(){
			
			$this->renderView('alerts'.DIRECTORY_SEPARATOR.'default');
			
		}
        
        public function editprofile(){
            
            $this->system->user->email = $this->system->request->data['email'];
            $this->system->user->firstname = $this->system->request->data['firstname'];
            $this->system->user->lastname = $this->system->request->data['lastname'];
            $this->system->user->state = $this->system->request->data['state'];
            $this->system->user->save();
            
            Header( "HTTP/1.1 301 Moved Permanently" ); 
            Header( "Location: /" );
            
        }
                
                public function alertAdd(){
                    
                    if(!isset($this->system->request) or (!isset($this->system->request->data['formkey']) and $this->system->request->data['formkey'] != 'addAlert')){
                        
                        $this->renderView('alerts'.DIRECTORY_SEPARATOR.'add');
                        
                    }else{
                        
                        $alert = new alert($this->system);
                        $alert->device = $this->system->request->data['device'];
                        $alert->type = $this->system->request->data['type'];
                        $alert->state = $this->system->request->data['state'];
                        $alert->add();
                        
                        Header( "HTTP/1.1 301 Moved Permanently" ); 
                        Header( "Location: /settings/alerts" ); 
                        
                    }
                    
                }
                
                public function shares(){
			
			$this->renderView('shares'.DIRECTORY_SEPARATOR.'default');
			
		}
                
                public function sharesAdd(){
                    
                    if(isset($this->system->request) and isset($this->system->request->data['formkey']) and $this->system->request->data['formkey'] == 'addShares'){
                        
                        $alert = new share($this->system);
                        $alert->device = $this->system->request->data['device'];
                        $alert->user = $this->system->request->data['user'];
                        $alert->add();
                        
                        Header( "HTTP/1.1 301 Moved Permanently" ); 
                        Header( "Location: /settings/shares" ); 
                        
                    }else{
                        
                        $this->renderView('shares'.DIRECTORY_SEPARATOR.'add');
                        
                    }
                    
                }
                
                public function sharesRemove(){
                    if(isset($this->system->request) and isset($this->system->request->data['formkey']) and $this->system->request->data['formkey'] == 'sharesRemove'){
                        if(isset($this->system->request->data["id"]) and !empty($this->system->request->data["id"])){
                            foreach($this->system->request->data["id"] as $item){
                                
                                $share = new share($this->system);
                                $share->load($item);
                                $share->delete();
                                
                            }
                        }
                        Header( "HTTP/1.1 301 Moved Permanently" ); 
                        Header( "Location: /settings/shares" );
                    }
                    
                }
                
                public function alertRemove(){
                    if(isset($this->system->request) and isset($this->system->request->data['formkey']) and $this->system->request->data['formkey'] == 'alertRemove'){
                        if(isset($this->system->request->data["id"]) and !empty($this->system->request->data["id"])){
                            foreach($this->system->request->data["id"] as $item){
                                
                                $share = new alert($this->system);
                                $share->load($item);
                                $share->delete();
                                
                            }
                        }
                        Header( "HTTP/1.1 301 Moved Permanently" ); 
                        Header( "Location: /settings/alerts" );
                    }
                    
                }
	
	}
	
?>