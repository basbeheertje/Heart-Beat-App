<?php

    class generaterandom extends controller{
	
		public function IndexView(){
			
            $deviceData = new deviceData($this->system);
            
            $device = 1;
            $state = 1;
            $creator = 1;
            
            $enddate = date("Y-m-d");
            $enddate = strtotime(date("Y-m-d", strtotime($enddate)) . "+2 months");
            $enddate = date("Y-m-d",$enddate);
            
            $time = new DateTime();
            $time->modify('-2 months');
            $time->setDate(2014,2,3);
            $date = $time->format('Y-m-d');
            
            $deviceData->device = $device;
            $deviceData->state = $state;
            $deviceData->creator = $creator;
            $deviceData->create_date = date('Y-m-d H:i:s');
            
            while($date < $enddate){
                $time->add(new DateInterval('PT30S'));
                $date = $time->format('Y-m-d');
                $typeValue = rand(1,80);
                if($typeValue == 2){
                    //Hij is te hoog
                    $value = rand(250,300);
                }else if($typeValue == 79){
                    //Hij is te laag
                    $value = rand(0,59);
                }else if($typeValue == 50 or $typeValue == 51 or $typeValue == 52){
                    //Hij is oranje
                    $value = rand(101,250);
                }else{
                    //Hij is goed
                    $value = rand(80,100);
                }
                $deviceData->time = $time->format('H:i:s');
                $deviceData->date = $time->format('Y-m-d');
                $deviceData->value = $value;
                $deviceData->add();
            }
            
			echo 'done';
			
		}
        
    }

?>