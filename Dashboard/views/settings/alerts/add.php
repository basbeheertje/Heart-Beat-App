<div class="portlet box red">
    <div class="portlet-title">
	<div class="caption">
            <i class="fa fa-reorder"></i>Alert toevoegen
	</div>
	<div class="tools">
	</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="/settings/alertAdd" class="form-horizontal" method="POST">
            <input type="hidden" name="formkey" value="alertAdd">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-3 control-label">Apparaat</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-mobile"></i>
						</span>
						<select class="form-control" name="device">
                                                        <?php 

                                                            foreach($this->system->user->devices as $device){
                                                                
                                                        ?>
							<option value="<?php echo $device->id; ?>"><?php echo $device->type->title; ?></option>
                                                        <?php
                                                            
                                                            }
                                                            
                                                        ?>
						</select>
					</div>
				</div>
			</div>
                        <div class="form-group">
				<label class="col-md-3 control-label">Type</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<select class="form-control" name="type">
							<?php 

                                                            $alertTypes = new alertTypes($this->system);
                                                            $alertTypes = $alertTypes->findAll();
                                                        
                                                            foreach($alertTypes as $alertType){
                                                                
                                                        ?>
							<option value="<?php echo $alertType["id"]; ?>"><?php echo $alertType["title"]; ?></option>
                                                        <?php
                                                            
                                                            }
                                                            
                                                        ?>
						</select>
					</div>
				</div>
			</div>
                        <div class="form-group">
				<label class="col-md-3 control-label">Status</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-flag"></i>
						</span>
						<select class="form-control" name="state">
							<option value="1">Ingeschakeld</option>
							<option value="0">Uitgeschakeld</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="col-md-offset-3 col-md-9">
				<button type="submit" class="btn blue">Submit</button>
				<a href="/settings/alerts" type="button" class="btn default">Cancel</a>
			</div>
		</div>
	</form>
	<!-- END FORM-->
    </div>
</div>