<div class="portlet box red">
    <div class="portlet-title">
	<div class="caption">
            <i class="fa fa-reorder"></i>Share toevoegen
	</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="/settings/sharesAdd" class="form-horizontal" method="POST">
            <input type="hidden" name="formkey" value="addShares">
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
				<label class="col-md-3 control-label">User</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<select class="form-control" name="user">
							<?php 

                                                            $users = new user($this->system);
                                                            $users = $users->findAll();
                                                        
                                                            foreach($users as $user){
                                                                
                                                                if($user["id"] != $this->system->user->id){
                                                                
                                                        ?>
							<option value="<?php echo $user["id"]; ?>"><?php echo $user["email"]; ?></option>
                                                        <?php
                                                        
                                                                }
                                                            
                                                            }
                                                            
                                                        ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="col-md-offset-3 col-md-9">
				<button type="submit" class="btn blue">Submit</button>
				<a href="/settings/shares" type="button" class="btn default">Cancel</a>
			</div>
		</div>
	</form>
	<!-- END FORM-->
    </div>
</div>