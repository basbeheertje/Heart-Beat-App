<?php

	class alert extends model{
	
		public $table = 'alert';
	
		public function load($id){
		
			parent::load($id);
			$this->type = $this->getType();
			//$this->device = $this->getDevice();*/
			$this->receivers = $this->getAlertreceivers();
		
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
		
		public function getType(){
		
			$query = 'SELECT `id` FROM `alertTypes` WHERE id = '.$this->type.' LIMIT 1';
			$uitkomst = $this->select($query);
			
			$attributenLijst = '';
			
			foreach($uitkomst as $attribute){
				$attrTMP = new alertTypes($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
	
		public function getAlertreceivers(){
		
			$query = 'SELECT `id` FROM `alertReceivers` WHERE alert = '.$this->id.'';
			$uitkomst = $this->select($query);
			
			$attributenLijst = array();
			
			foreach($uitkomst as $attribute){
				$attrTMP = new alertreceivers($this->system);
				$attrTMP->load($attribute['id']);
				$attributenLijst[] = $attrTMP;
			}
		
			return($attributenLijst);
		
		}
                
	}
	
?>