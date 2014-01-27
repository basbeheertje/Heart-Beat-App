			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Alerts<small>overzicht van alle alerts en waardes</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Akties
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="/settings/alertAdd">Toevoegen</a>
								</li>
								<li>
									<a href="#">Verwijderen</a>
								</li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="/">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="/settings">Instellingen</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							Alerts
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell"></i>Alerts
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
							</div>
							<table class="managedTables table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
								</th>
								<th>
									Apparaat Type
								</th>
								<th>
									Aantal ontvangers
								</th>
								<th>
									Type melding
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							
								foreach($this->system->user->devices as $device){
									
									echo $device->id;
									$alerts = $device->getalerts();
									
									if(isset($alerts) and !empty($alerts)){
									
										foreach($alerts as $alert){
										
							?><tr>
								<td><input type="checkbox" class="checkboxes" value="<?php echo $alert->id; ?>"/></td>
								<td><?php echo $device->type->title; ?></td>
								<td><?php echo count($alert->getAlertreceivers()); ?></td>
								<td><?php echo $alert->type->title; ?></td>
							</tr><?php
										
										}
									
									}
								
								}
							
							?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->