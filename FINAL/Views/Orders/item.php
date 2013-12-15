<tr>
	<td><?=$value['OrderNumber']?></td> 
	<td><?=$value['LastName']?>, <?=$value['FirstName']?></td> 
	<td><?=$value['Street1']?> <?=$value['Street2']?>, <?=$value['City']?>, <?=$value['State']?>, <?=$value['Zip']?></td>
	<td>XXXX-XXXX-XXXX-<?=substr($value['Number'], -4);?> EXP: <?=substr($value['Expiration'], 0, -3);?></td>
	<td><?=$value['ManufactureName']?> <?=$value['Model']?></td>
	<td><?=$value['Price']?></td>
	<td><?=$value['OrderDate']?></td>
	<td><?=$value['ShipDate']?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['O_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['O_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['O_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>												
	</td>
</tr>