<div class="container">
	<form action="?action=save" method="post" class="form-horizontal">
		
		<div class="form-group">
			<label for="First Name" class="col-sm-2 control-label">First Name</label>
			<div class="col=sm-10">
				<input type="text" name="First Name" id="First Name" placeholder="First Name" class="form-control" value="<?=$model['First_Name']?>" />				
			</div>
		</div>

		<div class="form-group">
			<label for="Last Name" class="col-sm-2 control-label">Last Name</label>
			<div class="col=sm-10">
				<input type="text" name="Last Name" id="Last Name" placeholder="Last Name" class="form-control" value="<?=$model['Last_Name']?>" />				
			</div>
		</div>
		
		<div class="form-group">
			<label for="Password" class="col-sm-2 control-label">Password</label>
			<div class="col=sm-10">
				<input type="password" name="Password" id="Password" placeholder="Password" class="form-control" value="<?=$model['Password']?>" />				
			</div>
		</div>
		
		<div class="form-group">
			<label for="UserType" class="col-sm-2 control-label">User Type</label>
			<div class="col=sm-10">
				<input type="text" name="UserType" id="UserType" placeholder="UserType" class="form-control" value="<?=$model['UserType']?>" >				
			</div>
		</div>						
			
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10"></div>
			<input type="submit" class="form-control btn btn-primary" value="Save"/>
		</div>		
	</form>
</div>