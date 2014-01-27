<?php

	class share extends model{
	
		public $table = 'share';
	
		public function load($id){
		
			parent::load($id);
		
		}
		
		public function getDevice(){
		
			$query = 'SELECT `id` FROM `device` WHERE id = '.$this->device.' LIMIT 1';
			$uitkomst = $this->select($query);
			
			$attributenLijst = '';
			
			foreach($uitkomst as $attribute){
				$attrTMP = new device($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
		
		public function getUser(){
		
			$query = 'SELECT `id` FROM `user` WHERE id = '.$this->user.' LIMIT 1';
			$uitkomst = $this->select($query);
			
			$attributenLijst = '';
			
			foreach($uitkomst as $attribute){
				$attrTMP = new user($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
                
                public function getOwner(){
		
                        $device = $this->getDevice();
                        $userid = $device->user;
                    
			$query = 'SELECT `id` FROM `user` WHERE id = '.$userid.' LIMIT 1';
			$uitkomst = $this->select($query);
			
			$attributenLijst = '';
			
			foreach($uitkomst as $attribute){
				$attrTMP = new user($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
                
                public function findByUser($user){
		
                        $query = 'SELECT `share`.`id` FROM `device`, `share` WHERE `share`.device = `device`.`user` AND `device`.`user` = '.$user.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new share($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
                
	}
	
?>