<?php

	class deviceData extends model{
	
		public $table = 'devicedata';
        
        public function getToday($device_id){
            
            $query = "SELECT * FROM `".$this->table."` WHERE time > '".date('H:')."00:00' AND time < '".date('H:')."59:59' AND date = '".date('Y-m-d')."' AND device = ".$device_id;
            
            //echo $query;
            
            return($this->select($query));
            
        }
        
        public function getHourly($device_id, $hour){
            
            $query = "SELECT * FROM `".$this->table."` WHERE time > '".$hour.":00:00' AND time < '".$hour.":59:59' AND date = '".date('Y-m-d')."' AND device = ".$device_id;
            
            //echo $query;
            
            return($this->select($query));
            
        }
	
	}
	
?>