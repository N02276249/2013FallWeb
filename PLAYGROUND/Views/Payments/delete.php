<h3>Are you sure you want to delete <?=$model['PaymentType']?> XXXX-XXXX-XXXX-<?=substr($value['Number'], -4);?></h3>
	
<form action="?action=delete" method="post">
	<input type="hidden" name="id" value="<?=$model['id']?>" />
	<input type="submit" class="btn btn-primary" value="Delete" />
	<a href="?action=list">No, you're right.</a>
</form>