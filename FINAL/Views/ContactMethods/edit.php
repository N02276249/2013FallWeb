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
			<label for="Value" class="col-sm-2 control-label">Value</label>
			<div class="col-sm-10">
				<input type="text" name="Value" id="Value" placeholder="Value" class="form-control" value="<?=$model['Value']?>"/>
				<? if(isset($errors['Value'])): ?><span class ="error"><?=$errors['Value'] ?></span><? endif;?>
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['ContactMethodType']) ? 'has-error' : '' ?>">
			<label for="ContactMethodType" class="col-sm-2 control-label">Contact Method Type</label>
			<div class="col-sm-10">
				<div class="col-sm-10">
					<label class="radio-inline">
						<input type="radio" name="ContactMethodType" id="ContactMethodType" value="9" <? if($model['ContactMethodType'] == '9') { echo 'checked="checked"'; }?>> Email
					</label>
					<label class="radio-inline">
						<input type="radio" name="ContactMethodType" id="ContactMethodType" value="10" <? if($model['ContactMethodType'] == '10') { echo 'checked="checked"'; }?>> Phone
					</label>
					<? if(isset($errors['ContactMethodType'])): ?><span class ="error"><?=$errors['ContactMethodType'] ?></span><? endif;?>	
				</div>
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Users_id']) ? 'has-error' : '' ?>">
			<label for="Users_id" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<select name="Users_id" id="Users_id" class="form-control ">				
					<? foreach (Users::GetSelectListBackend() as $UsersRs): ?>
		            	<option value="<?=$UsersRs['id'] ?>"><?=$UsersRs['FirstName'] ?> <?=$UsersRs['LastName'] ?></option>
					<? endforeach; ?>
				</select>
			</div>
		</div>	
		
								
			
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10">
				<input type="submit" class="form-control btn btn-primary" value="Save"/>
			</div>
		</div>		
	</form>
</div>