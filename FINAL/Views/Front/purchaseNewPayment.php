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
		
		<input type="hidden" name="product_id" value="<?=$product['id'] ?>" />
		<input type="hidden" name="product_price" value="<?=$product['Price'] ?>" />
		
		<div class="form-group <?= isset($errors['Payments_id']) ? 'has-error' : '' ?>">
			<label for="Payments_id" class="col-sm-2 control-label">Payments</label>
			<div class="col-sm-10">
				<select name="Payments_id" id="Payments_id" class="form-control ">				
					<? foreach (Payments::GetSelectList($selectedUser) as $paymentsRs): ?>
		            	<option value="<?=$paymentsRs['id'] ?>">XXXX-XXXX-XXXX-<?=substr($paymentsRs['Number'], -4);?> EXP: <?=substr($paymentsRs['Expiration'], 0, -3);?></option>
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