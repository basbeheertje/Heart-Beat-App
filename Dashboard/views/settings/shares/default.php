			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Shares<small>overzicht van alle gedeelde apparaten</small>
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
									<a href="/settings/sharesAdd">Toevoegen</a>
								</li>
								<li>
									<a href="#" onclick="document.getElementById('sharesRemove').submit();">Verwijderen</a>
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
							Shares
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
							<div class="table-toolbar"></div>
                                                        <form action="/settings/sharesRemove" class="form-horizontal" method="POST" id="sharesRemove">
                                                        <input type="hidden" name="formkey" value="sharesRemove">
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
									Gedeeld met
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							
                                                                $shares = new share($this->system);
                                                                $shares = $shares->findByUser($this->system->user->id);
                                                        
                                                                if(isset($shares) and !empty($shares)){
                                                                
                                                                    foreach($shares as $share){
                                                                        
                                                                        $device = $share->getDevice();
                                                                        $sharer = $share->getUser();
										
							?><tr>
								<td><input name="id[]" type="checkbox" class="checkboxes" value="<?php echo $share->id; ?>"/></td>
								<td><?php echo $device->type->title; ?></td>
								<td><?php echo $sharer->email; ?></td>
							</tr><?php
								
                                                                    }
                                                                
                                                                }
							
							?>
							</tbody>
							</table></form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->