		<!-- BEGIN FOOTER -->
		<div class="footer">
			<div class="footer-inner">
				 2014 &copy; Heart Beats
			</div>
			<div class="footer-tools">
				<span class="go-top">
					<i class="fa fa-angle-up"></i>
				</span>
			</div>
		</div>
		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="plugins/respond.min.js"></script>
		<script src="plugins/excanvas.min.js"></script> 
		<![endif]-->
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery.pulsate.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
		<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
		<script src="/<?php echo $this->themeUrl(); ?>plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/jquery.sparkline.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="/<?php echo $this->themeUrl(); ?>scripts/app.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>scripts/index.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>scripts/tasks.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/data-tables/jquery.dataTables.js" type="text/javascript"></script>
		<script src="/<?php echo $this->themeUrl(); ?>plugins/data-tables/DT_bootstrap.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
			jQuery(document).ready(function() {    
			   App.init(); // initlayout and core plugins
			   Index.init();
			    Index.initIntro();
			   Tasks.initDashboardWidget();
			   // begin first table
				$('.managedTables').dataTable({
					"aoColumns": [
					  { "bSortable": false },
					  null,
					  { "bSortable": false },
					  null,
					  { "bSortable": false },
					  { "bSortable": false }
					],
					"aLengthMenu": [
						[5, 15, 20, -1],
						[5, 15, 20, "All"] // change per page values here
					],
					// set the initial value
					"iDisplayLength": 5,
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						}
					]
				});
			});
		</script>
	</body>
	<!-- END BODY -->
</html>