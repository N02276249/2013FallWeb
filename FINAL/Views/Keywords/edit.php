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
			<label for="Name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input type="text" name="Name" id="Name" placeholder="Name" class="form-control" value="<?=$model['Name']?>"/>
				<? if(isset($errors['Name'])): ?><span class ="error"><?=$errors['Name'] ?></span><? endif;?>
			</div>
		</div>	
		
		<div class="form-group <?= isset($errors['Parent_id']) ? 'has-error' : '' ?>">
			<label for="Parent_id" class="col-sm-2 control-label">Parent ID</label>
			<div class="col-sm-10">
				<select name="Parent_id" id="Parent_id" class="form-control ">				
					<? foreach (Keywords::GetSelectListFor(1) as $keywordRs): ?>
		            	<option value="<?=$keywordRs['id'] ?>"><?=$keywordRs['Name'] ?></option>
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
                $("#Parent_id").val(<?=$model['Parent_id']?>);
        })        
</script>