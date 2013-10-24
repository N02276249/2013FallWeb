<style type="text/css">
	.error { color: red; }
</style>

<div class="container">
	
	<? if (isset($errors) && $errors): ?>
		<ul class="error">
			<? foreach ($errors as $key => $value): ?>
				<li>
					<label><?=$key?>:</label><?=$value?>
				</li>
			<? endforeach; ?>
		</ul>
	<? endif; ?>
	
	
	<form action="?action=save" method="post" class="form-horizontal row">
		
		<div class="form-group <?= isset($errors['FirstName']) ? 'has-errors' : '' ?>">
			<label for="FirstName" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-10">
				<input type="text" name="FirstName" id="FirstName" placeholder="First Name" class="form-control " value="<?=$model['FirstName']?>"/>
				<? if(isset($errors['FirstName'])): ?><span class="error"> <?= $errors['FirstName'] ?></span>			
			</div>
		</div>

		<div class="form-group <?= isset($errors['LastName']) ? 'has-errors' : '' ?>">
			<label for="LastName" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-10">
				<input type="text" name="LastName" id="LastName" placeholder="Last Name" class="form-control" value="<?=$model['LastName']?>" />
				<? if(isset($errors['LastName'])): ?><span class="error"> <?= $errors['LastName'] ?></span>				
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Password']) ? 'has-errors' : '' ?>">
			<label for="Password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="Password" id="Password" placeholder="Password" class="form-control" value="<?=$model['Password']?>" />
				<? if(isset($errors['Password'])): ?><span class="error"> <?= $errors['Password'] ?></span>								
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['UserType']) ? 'has-errors' : '' ?>">
			<label for="UserType" class="col-sm-2 control-label">UserType</label>
			<div class="col-sm-10">
				<input type="UserType" name="UserType" id="UserType" placeholder="User Type" class="form-control" value="<?=$model['UserType']?>" />
				<? if(isset($errors['UserType'])): ?><span class="error"> <?= $errors['UserType'] ?></span>								
			</div>
		</div>							
			
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10">
				<input type="submit" class="form-control btn btn-primary" value="Save"/>
			</div>
		</div>		
	</form>
</div>