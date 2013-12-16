<div class="container">
	<dl class="dl-horizontal">
		<dt>Type</dt>
		<dd><?=$model['Name']?></dd>
		<dt>Number</dt>
		<dd>XXXX-XXXX-XXXX-<?=substr($model['Number'], -4);?></dd>
		<dt>Expiration</dt>
		<dd><?=substr($model['Expiration'], 0, -3)?></dd>
		<dt>CID</dt>
		<dd><?=$model['CID']?></dd>				
		<dt>Address</dt>
		<dd><?=$model['Street1']?> <?=$model['Street2']?>, <?=$model['State']?>, <?=$model['Zip']?></dd>
		<dt>Name</dt>
		<dd><?=$model['FirstName']?> <?=$model['LastName']?></dd>	
	</dl>
</div>
