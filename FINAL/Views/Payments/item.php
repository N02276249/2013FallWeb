<tr>
	<td><?=$value['LastName']?>, <?=$value['FirstName']?></td> 
	<td><?=$value['Name']?></td>
	<td>XXXX-XXXX-XXXX-<?=substr($value['Number'], -4);?></td>
	<td><?=substr($value['Expiration'], 0, -3)?></td>
	<td><?=$value['Street1']?> <?=$value['Street2']?>, <?=$value['State']?>, <?=$value['Zip']?></td>	
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['P_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['P_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['P_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>												
	</td>
</tr>