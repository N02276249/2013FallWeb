<div class="container">
	<dl class="dl-horizontal">
		<dt>Order Number</dt>
		<dd><?=$model['OrderNumber']?></dd>
		<dt>Address</dt>
		<dd><td><?=$model['Street1']?> <?=$model['Street2']?>, <?=$model['State']?>, <?=$model['Zip']?></td></dd>
		<dt>Payment</dt>
		<dd>XXXX-XXXX-XXXX-<?=substr($model['Number'], -4);?> EXP: <?=substr($model['Expiration'], 0, -3);?></dd>
		<dt>Product</dt>
		<dd><?=$model['ManufactureName']?> <?=$model['Model']?></dd>				
		<dt>Price</dt>
		<dd><?=$model['Price']?></dd>				
		<dt>created_at</dt>		
		<dd><?=$model['created_at']?></dd>
		<dt>User ID</dt>
		<dd><?=$model['Users_id']?></dd>	
	</dl>
</div>
