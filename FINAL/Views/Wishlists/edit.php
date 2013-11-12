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
			<label for="WishlistValue" class="col-sm-2 control-label">Wishlist Value</label>
			<div class="col-sm-10">
				<input type="text" name="WishlistValue" id="WishlistValue" placeholder="Wishlist Value" class="form-control" value="<?=$model['WishlistValue']?>"/>
				<? if(isset($errors['WishlistValue'])): ?><span class ="error"><?=$errors['WishlistValue'] ?></span><? endif;?>
			</div>
		</div>
	
			
		<div class="form-group <?= isset($errors['Products_id']) ? 'has-error' : '' ?>">
			<label for="Products_id" class="col-sm-2 control-label">Product</label>
			<div class="col-sm-10">
				<select name="Products_id" id="Products_id" class="form-control ">				
					<? foreach (Products::GetSelectList() as $productRs): ?>
		            	<option value="<?=$productRs['id']?>"><?=$productRs['Model']?></option>
					<? endforeach; ?>
				</select>
			</div>
		</div>
			
		<div class="form-group <?= isset($errors['Users_id']) ? 'has-error' : '' ?>">
			<label for="Users_id" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<select name="Users_id" id="Users_id" class="form-control ">				
					<? foreach (Users::GetSelectList() as $UsersRs): ?>
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

<script type="text/javascript">
        $(function(){
                $("#Products_id").val(<?=$model["Products_id"]?>);
                $("#Users_id").val(<?=$model['Users_id'] ?>);
        })        
</script>
