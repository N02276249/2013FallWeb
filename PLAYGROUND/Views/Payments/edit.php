<style type="text/css">
	.error {
		color: red;
	}
</style>

<div class="container">
	
	<? if (isset($errors) && $errors): ?>
		<ul class="error">
			<? foreach ($errors as $key => $value): ?>
				<li>
					<label><?=$key ?>:</label><?=$value ?>
				</li>
			<? endforeach; ?>
		</ul>
	<? endif; ?>
	<form action="?action=save" method="post" class="form-horizontal row">
		
		<input type="hidden" name="id" value="<?=$model['id'] ?>" />
		
		<div class="form-group <?= isset($errors['']) ? 'has-error' : '' ?>">
			<label for="Number" class="col-sm-2 control-label">Number</label>
			<div class="col-sm-10">
				<input type="text" name="Number" id="Number" placeholder="Number" class="form-control" value="<?=$model['Number'] ?>"/>
				<? if(isset($errors['Number'])): ?><span class ="error"><?=$errors['Number'] ?></span><? endif; ?>
			</div>
		</div>

		<div class="form-group <?= isset($errors['Expiration']) ? 'has-error' : '' ?>">
			<label for="Expiration" class="col-sm-2 control-label">Expiration</label>
			<div class="col-sm-10">
				<input type="text" name="Expiration" id="Expiration" placeholder="Expiration" class="form-control" value="<?=$model['Expiration'] ?>" />
				<? if(isset($errors['Expiration'])): ?><span class ="error"><?=$errors['Expiration'] ?></span><? endif; ?>		
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['CID']) ? 'has-error' : '' ?>">
			<label for="CID" class="col-sm-2 control-label">CID</label>
			<div class="col-sm-10">
				<input type="text" name="CID" id="CID" placeholder="CID" class="form-control" value="<?=$model['CID'] ?>" />		
				<? if(isset($errors['CID'])): ?><span class ="error"><?=$errors['CID'] ?></span><? endif; ?>					
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
		
		<div class="form-group <?= isset($errors['Address_id']) ? 'has-error' : '' ?>">
			<label for="Address_id" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-10">
				<select name="Address_id" id="Address_id" class="form-control ">				
					<? foreach (Addresses::GetSelectListBackend() as $addressRs): ?>
		            	<option value="<?=$addressRs['id'] ?>"><?=$addressRs['Street1'] ?></option>
					<? endforeach; ?>
				</select>
			</div>
		</div>	
					
		<div class="form-group <?= isset($errors['PaymentTypes']) ? 'has-error' : '' ?>">
			<label for="PaymentTypes" class="col-sm-2 control-label">Address Type</label>
			<div class="col-sm-10">
				<div class="col-sm-10">
					<label class="radio-inline">
						<input type="radio" name="PaymentTypes" id="PaymentTypes" value="14" <?
						if ($model['PaymentTypes'] == '14') { echo 'checked="checked"';
						}
					?>> Debit Card
					</label>
					<label class="radio-inline">
						<input type="radio" name="PaymentTypes" id="PaymentTypes" value="15" <?
						if ($model['PaymentTypes'] == '15') { echo 'checked="checked"';
						}
					?>> Credit Card
					</label>
					<? if(isset($errors['PaymentTypes'])): ?><span class ="error"><?=$errors['PaymentTypes'] ?></span><? endif; ?>	
				</div>
			</div>
		</div>
						
		<div class="form-group">
			<div class="col-sm-offset-2 col-lg-10">
				<input type="submit" class="form-control btn btn-primary" value="Save"/>
			</div>
		</div>		
	</form>
</div>

<script type="text/javascript">
        	$(function(){
                $("#Users_id").val(<?=$model['Users_id'] ?>);
                $("#Address_id").val(<?=$model["Address_id"] ?>
					);
					})        
</script>