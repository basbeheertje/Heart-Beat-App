<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Dashboard <small>uw persoonlijke hartslag meting</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
					<a href="/">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Dashboard</a>
			</li>
			<li class="pull-right">
				<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" style="display: block;">
					<i class="fa fa-calendar"></i>
					<span><?php echo date('F'); ?> <?php echo date('d'); ?>, <?php echo date('Y'); ?></span>
				</div>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
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
        
        $values = $values->getHourly($device->id,date('H'));
        
    }
    
    $counter = 30;
    
    foreach($values as $value){
        
        $counter++;
        
        echo '['.$counter.', '.$value['value'].' + randValue()],';
        
    }

?>
                    ];
            
</script>