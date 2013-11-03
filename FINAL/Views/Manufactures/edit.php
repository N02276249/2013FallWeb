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
	<? endif;?>
	<form action="?action=save" method="post" class="form-horizontal row">
		
		<input type="hidden" name="id" value="<?=$model['id']?>" />
		
		<div class="form-group <?= isset($errors['ManufactureName']) ? 'has-error' : '' ?>">
			<label for="ManufactureName" class="col-sm-2 control-label">Manufacture Name</label>
			<div class="col-sm-10">
				<input type="text" name="ManufactureName" id="ManufactureName" placeholder="Manufacture Name" class="form-control" value="<?=$model['ManufactureName']?>" />		
				<? if(isset($errors['ManufactureName'])): ?><span class ="error"><?=$errors['ManufactureName'] ?></span><? endif;?>					
			</div>
		</div>								
			
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10">
				<input type="submit" class="form-control btn btn-primary" value="Save"/>
			</div>
		</div>		
	</form>
</div>