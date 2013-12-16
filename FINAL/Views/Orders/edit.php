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
			<label for="OrderNumber" class="col-sm-2 control-label">Order Number</label>
			<div class="col-sm-10">
				<input type="text" name="OrderNumber" id="OrderNumber" placeholder="Order Number" class="form-control" value="<?=$model['OrderNumber']?>"/>
				<? if(isset($errors['OrderNumber'])): ?><span class ="error"><?=$errors['OrderNumber'] ?></span><? endif;?>
			</div>
		</div>

		<div class="form-group <?= isset($errors['OrderDate']) ? 'has-error' : '' ?>">
			<label for="OrderDate" class="col-sm-2 control-label">Order Date</label>
			<div class="col-sm-10">
				<input type="text" name="OrderDate" id="OrderDate" placeholder="Order Date" class="form-control" value="<?=$model['OrderDate']?>" />
				<? if(isset($errors['OrderDate'])): ?><span class ="error"><?=$errors['OrderDate'] ?></span><? endif;?>		
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['ShipDate']) ? 'has-error' : '' ?>">
			<label for="ShipDate" class="col-sm-2 control-label">Ship Date</label>
			<div class="col-sm-10">
				<input type="text" name="ShipDate" id="ShipDate" placeholder="Ship Date" class="form-control" value="<?=$model['ShipDate']?>" />		
				<? if(isset($errors['ShipDate'])): ?><span class ="error"><?=$errors['ShipDate'] ?></span><? endif;?>					
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
		
		<div class="form-group <?= isset($errors['Payments_id']) ? 'has-error' : '' ?>">
			<label for="Payments_id" class="col-sm-2 control-label">Payments</label>
			<div class="col-sm-10">
				<select name="Address_id" id="Payments_id" class="form-control ">				
					<? foreach (Payments::GetSelectListBackend() as $paymentsRs): ?>
		            	<option value="<?=$paymentsRs['id'] ?>"><?=$paymentsRs['Number'] ?></option>
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