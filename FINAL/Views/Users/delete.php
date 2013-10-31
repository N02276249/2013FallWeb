<div class="container">
	<form action="?action=delete" method="post">
		<h3>Are you sure you want to delete <?=$model['FirstName']?> <?=$model['LastName']?></h3>
		<input type="hidden" name="id" value="<?=$model['id']?>" />
		<input type="submit" class="btn btn-primary" value="Yes" />
		<a href="?" class="btn btn-default" value="No" />
	</form>
</div>
