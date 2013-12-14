<style type="text/css">
	.error { color: red; }
</style>

<div class="container">
	<?$user=Auth::GetUser();?>
	
	<? if (isset($errors) && $errors): ?>
		<ul class="error">
			<? foreach ($errors as $key => $value): ?>
				<li>
					<label><?=$key?>:</label><?=$value?>
				</li>
			<? endforeach; ?>
		</ul>
	<? endif; ?>
	
	
	
	<form action="?action=updatePassword" method="post" class="form-horizontal row">
		<input type="hidden" name="id" value="<?=$user['id'] ?>" />		
		
		<div class="form-group <?= isset($errors['Password']) ? 'has-error' : '' ?>">
			<label for="Password" class="col-sm-2 control-label">Password</label>
			<div class="col-md-4">
				<input type="password" name="Password" id="Password" placeholder="Password" class="form-control" value="<?=$user['Password']?>" />		
				<? if(isset($errors['Password'])): ?><span class ="error"><?=$errors['Password'] ?></span><? endif;?>					
			</div>
		</div>
						
		<div class="form-group">
			<div class="col-sm-offset-2 col-md-4">
				<input type="submit" class="form-control btn btn-primary" value="Update Password"/>
			</div>
		</div>		
	</form>
	<div class="col-sm-offset-2 col-md-4">
		<a href="?action=newAddress" class="btn btn-success " role="button" align="center">Add Address</a>
		<a href="?action=newPayment" class="btn btn-success" role="button">Add Payment</a>
	</div>
</div>

