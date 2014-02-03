<?php

    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }else{
        $date = date('Y-m-d');
    }
    if(isset($_GET['time'])){
        $time = date('H',strtotime('2014-01-01 '.$_GET['time'].':00:00'));
    }else{
        $time = date('H');
    }
    
    $timedate = new DateTime($date.' '.$time.':00');

?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Periodiek <small>per uur</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
					<a href="/">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">periodiek</a>
                <i class="fa fa-angle-right"></i>
			</li>
            <li>
				<a href="#">per uur</a>
			</li>
			<li class="pull-right">
				<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" style="display: block;">
					<i class="fa fa-calendar"></i>
					<span><?php echo $timedate->format('F'); ?> <?php echo $timedate->format('d'); ?>, <?php echo $timedate->format('Y'); ?></span>
				</div>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <ul>
            <li><a href="/dashboard/periodiek/?date=<?php echo $timedate->format('Y-m-d'); ?>&time=<?php echo $timedate->format('H'); ?>">Per uur</a></li>
            <li><a href="/dashboard/periodiekdag/?date=<?php echo $timedate->format('Y-m-d'); ?>&time=<?php echo $timedate->format('H'); ?>">Per dag</a></li>
            <li><a href="/dashboard/periodiekmaand/?date=<?php echo $timedate->format('Y-m-d'); ?>&time=<?php echo $timedate->format('H'); ?>">Per maand</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <?php
            $previousdate = new DateTime($date.' '.$time.':00');
            $previousdate->modify("-1 hour");
        ?>
        <a href="/dashboard/periodiek/?date=<?php echo $previousdate->format('Y-m-d'); ?>&time=<?php echo $previousdate->format('H'); ?>">eerder</a>
   </div>
        <div class="col-md-6 col-sm-6">     
       <?php
            $previousdate = new DateTime($date.' '.$time.':00');
            $previousdate->modify("+1 hour");
        ?>
        <a href="/dashboard/periodiek/?date=<?php echo $previousdate->format('Y-m-d'); ?>&time=<?php echo $previousdate->format('H'); ?>">Later</a>
    </div>
</div>
<div class="row">
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Metingen
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="/<?php echo $this->themeUrl(); ?>img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
<script>
    var hartslag = [
<?php 

    $values = new deviceData($this->system);
    foreach($this->system->user->devices as $device){
        
        $values = $values->getHourly($device->id,$time, $date);
        
    }
    
    $counter = 0;
    
    foreach($values as $value){
        
        $counter++;
        
        echo '['.$counter.','.$value['value'].',\''.$value['time'].'\', ],'."\r\n";
        
    }

?>
                    ];
            
</script>