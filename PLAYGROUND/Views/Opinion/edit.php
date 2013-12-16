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
		
		<div class="form-group <?= isset($errors['']) ? 'has-error' : '' ?>">
			<label for="OpinionValue" class="col-sm-2 control-label">Opinion</label>
			<div class="col-sm-10">
				<input type="text" name="OpinionValue" id="OpinionValue" placeholder="Opinion" class="form-control" value="<?=$model['OpinionValue']?>"/>
				<? if(isset($errors['OpinionValue'])): ?><span class ="error"><?=$errors['OpinionValue'] ?></span><? endif;?>
			</div>
		</div>

		<div class="form-group <?= isset($errors['Product_id']) ? 'has-error' : '' ?>">
			<label for="Product_id" class="col-sm-2 control-label">Product ID</label>
			<div class="col-sm-10">
				<input type="text" name="Product_id" id="Product_id" placeholder="Product ID" class="form-control" value="<?=$model['Product_id']?>" />
				<? if(isset($errors['Product_id'])): ?><span class ="error"><?=$errors['Product_id'] ?></span><? endif;?>		
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Orders_id']) ? 'has-error' : '' ?>">
			<label for="Orders_id" class="col-sm-2 control-label">Orders ID</label>
			<div class="col-sm-10">
				<input type="text" name="Orders_id" id="Orders_id" placeholder="Orders ID" class="form-control" value="<?=$model['Orders_id']?>" />		
				<? if(isset($errors['Orders_id'])): ?><span class ="error"><?=$errors['Orders_id'] ?></span><? endif;?>					
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Users_id']) ? 'has-error' : '' ?>">
			<label for="Users_id" class="col-sm-2 control-label">Users ID</label>
			<div class="col-sm-10">
				<input type="text" name="Users_id" id="Users_id" placeholder="Users ID" class="form-control" value="<?=$model['Users_id']?>" />		
				<? if(isset($errors['Users_id'])): ?><span class ="error"><?=$errors['Users_id'] ?></span><? endif;?>					
			</div>
		</div>
			
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10">
				<input type="submit" class="form-control btn btn-primary" value="Save"/>
			</div>
		</div>		
	</form>
</div>