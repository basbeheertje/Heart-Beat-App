<div class="portlet box red">
    <div class="portlet-title">
	<div class="caption">
            <i class="fa fa-reorder"></i>Mijn profiel
	</div>
	<div class="tools">
	</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="/settings/editprofile" class="form-horizontal" method="POST">
            <input type="hidden" name="formkey" value="alertAdd">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-3 control-label">Voornaam</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" value="<?php echo $this->system->user->firstname; ?>" class="form-control" name="firstname"/>
					</div>
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-3 control-label">Achternaam</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" value="<?php echo $this->system->user->lastname; ?>" class="form-control" name="lastname"/>
					</div>
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-3 control-label">Mail adres</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="text" value="<?php echo $this->system->user->email; ?>" class="form-control" name="email"/>
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
				<a href="/" type="button" class="btn default">Cancel</a>
			</div>
		</div>
	</form>
	<!-- END FORM-->
    </div>
</div>