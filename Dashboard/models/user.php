<?php

	class user extends model{
	
		public $table = 'user';
		
		public function NewAuth(){
		
			$pass = '';
			
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()_+";
			for ($i = 0; $i < 16; $i++) {
				$n = rand(0, strlen($alphabet)-1);
				$pass .= $alphabet[$n];
			}
			$this->authToken = $pass;
			$this->save();
			
		}
		
		public function load($id){
		
			parent::load($id);
			$this->attributes = $this->getAttributes();
			$this->devices = $this->getDevices();
                        $this->shares = $this->getShares();
		
		}
		
		public function getAttributes(){
		
			$query = 'SELECT `id` FROM `userattributes` WHERE user = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new userAttributes($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
		
		public function getDevices(){
		
			$query = 'SELECT `id` FROM `device` WHERE user = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new device($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
                
                public function getShares(){
		
			$query = 'SELECT `id` FROM `share` WHERE user = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new share($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
	
                public function getUserRembered($md5string){
                    
                        $query = 'SELECT * FROM `user` WHERE md5(id) = "'.$md5string.'" LIMIT 0,1';
			$uitkomst = $this->select($query);
			
                        if(isset($uitkomst) and !empty($uitkomst)){
                            foreach($uitkomst as $attribute){
                                    $attributenLijst = $attribute;
                            }
                            return($attributenLijst);
                        }
		
			return(false);
                    
                }
                
	}
	
?>