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
			<label for="Model" class="col-sm-2 control-label">Model</label>
			<div class="col-sm-10">
				<input type="text" name="Model" id="Model" placeholder="Model" class="form-control" value="<?=$model['Model']?>"/>
				<? if(isset($errors['Model'])): ?><span class ="error"><?=$errors['Model'] ?></span><? endif;?>
			</div>
		</div>

		<div class="form-group <?= isset($errors['Description']) ? 'has-error' : '' ?>">
			<label for="Description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<input type="text" name="Description" id="Description" placeholder="Description" class="form-control" value="<?=$model['Description']?>" />
				<? if(isset($errors['Description'])): ?><span class ="error"><?=$errors['Description'] ?></span><? endif;?>		
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['Price']) ? 'has-error' : '' ?>">
			<label for="Price" class="col-sm-2 control-label">Price</label>
			<div class="col-sm-10">
				<input type="text" name="Price" id="Price" placeholder="Price" class="form-control" value="<?=$model['Price']?>" />		
				<? if(isset($errors['Price'])): ?><span class ="error"><?=$errors['Price'] ?></span><? endif;?>					
			</div>
		</div>
		
		<div class="form-group <?= isset($errors['InStock']) ? 'has-error' : '' ?>">
			<label for="InStock" class="col-sm-2 control-label">Available</label>
			<div class="col-sm-10">
				<input type="text" name="InStock" id="InStock" placeholder="Available" class="form-control" value="<?=$model['InStock']?>" />		
				<? if(isset($errors['InStock'])): ?><span class ="error"><?=$errors['InStock'] ?></span><? endif;?>					
			</div>
		</div>
		
	<div class="form-group <?= isset($errors['Manufacture_id']) ? 'has-error' : '' ?>">
		<label for="Manufacture_id" class="col-sm-2 control-label">Manufacture</label>
		<div class="col-sm-10">
			<select name="Manufacture_id" id="Manufacture_id" class="form-control ">				
				<? foreach (Manufactures::GetSelectList() as $keywordRs): ?>
	            	<option value="<?=$keywordRs['id']?>"><?=$keywordRs['ManufactureName']?></option>
				<? endforeach; ?>
			</select>
		</div>
	</div>
		
	<div class="form-group <?= isset($errors['ProductType']) ? 'has-error' : '' ?>">
		<label for="ProductType" class="col-sm-2 control-label">Product Type</label>
		<div class="col-sm-10">
			<select name="ProductType" id="ProductType" class="form-control ">				
				<? foreach (Keywords::GetSelectListFor(5) as $keywordRs): ?>
	            	<option value="<?=$keywordRs['id']?>"><?=$keywordRs['Name']?></option>
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
                $("#ProductType").val(<?=$model['ProductType']?>);
                $("#Manufacture_id").val(<?=$model["Manufacture_id"]?>);
        })        
</script>
