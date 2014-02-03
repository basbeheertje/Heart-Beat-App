<?php

	class device extends model{
	
		public $table = 'device';
		
		public function load($id){
		
			parent::load($id);
			/*$this->data = $this->getData();*/
			$this->type = $this->getType();
			/*$this->alerts = $this->getAlerts();*/
		
		}
		
		public function getData(){
		
			$query = 'SELECT `id` FROM `devicedata` WHERE device = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new deviceData($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
		
		public function getType(){
		
			$query = 'SELECT `id` FROM `devicetypes` WHERE id = '.$this->type.' LIMIT 1';
			$uitkomst = $this->select($query);
			
			$attributenLijst = '';
			
			foreach($uitkomst as $attribute){
				$attrTMP = new deviceTypes($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
		
		public function getAlerts(){
		
			$query = 'SELECT `id` FROM `alert` WHERE device = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new alert($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
	
	}
	
?>