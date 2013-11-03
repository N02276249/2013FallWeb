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
			<label for="Street1" class="col-sm-2 control-label">Street 1</label>
			<div class="col-sm-10">
				<input type="text" name="Street1" id="Street1" placeholder="Street 1" class="form-control" value="<?=$model['Street1']?>"/>
				<? if(isset($errors['Street1'])): ?><span class ="error"><?=$errors['Street1'] ?></span><? endif;?>
			</div>
		</div>

		<div class="form-group <?= isset($errors['Street2']) ? 'has-error' : '' ?>">
			<label for="Street2" class="col-sm-2 control-label">Street 2</label>
			<div class="col-sm-10">
				<input type="text" name="Street2" id="Street2" placeholder="Street 2" class="form-control" value="<?=$model['Street2']?>" />
				<? if(isset($errors['Street2'])): ?><span class ="error"><?=$errors['Street2'] ?></span><? endif;?>		
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['City']) ? 'has-error' : '' ?>">
			<label for="City" class="col-sm-2 control-label">City</label>
			<div class="col-sm-10">
				<input type="text" name="City" id="City" placeholder="City" class="form-control" value="<?=$model['City']?>" />		
				<? if(isset($errors['City'])): ?><span class ="error"><?=$errors['City'] ?></span><? endif;?>					
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['State']) ? 'has-error' : '' ?>">
			<label for="State" class="col-sm-2 control-label">State</label>
			<div class="col-sm-10">
				<input type="text" name="State" id="City" placeholder="State" class="form-control" value="<?=$model['State']?>" />		
				<? if(isset($errors['State'])): ?><span class ="error"><?=$errors['State'] ?></span><? endif;?>					
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Zip']) ? 'has-error' : '' ?>">
			<label for="Zip" class="col-sm-2 control-label">Zip</label>
			<div class="col-sm-10">
				<input type="text" name="Zip" id="Zip" placeholder="Zip" class="form-control" value="<?=$model['Zip']?>" />		
				<? if(isset($errors['Zip'])): ?><span class ="error"><?=$errors['Zip'] ?></span><? endif;?>					
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['AddressTypes']) ? 'has-error' : '' ?>">
			<label for="AddressTypes" class="col-sm-2 control-label">Address Type</label>
			<div class="col-sm-10">
				<div class="col-sm-10">
					<label class="radio-inline">
						<input type="radio" name="AddressTypes" id="AddressTypes" value="11" <? if($model['AddressTypes'] == '11') { echo 'checked="checked"'; }?>> Billing
					</label>
					<label class="radio-inline">
						<input type="radio" name="AddressTypes" id="AddressTypes" value="12" <? if($model['AddressTypes'] == '12') { echo 'checked="checked"'; }?>> Shipping
					</label>
					<? if(isset($errors['AddressTypes'])): ?><span class ="error"><?=$errors['AddressTypes'] ?></span><? endif;?>	
				</div>
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Users_id']) ? 'has-error' : '' ?>">
			<label for="Users_id" class="col-sm-2 control-label">User ID</label>
			<div class="col-sm-10">
				<input type="text" name="Users_id" id="Users_id" placeholder="User ID" class="form-control" value="<?=$model['Users_id']?>" />		
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