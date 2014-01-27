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
			
			/*print '<pre>';
			var_dump($this);
			print '</pre>';*/
		
		}
		
		public function getAttributes(){
		
			$query = 'SELECT `id` FROM `userAttributes` WHERE user = '.$this->id.'';
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
	
	}
	
?>