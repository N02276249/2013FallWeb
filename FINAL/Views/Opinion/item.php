<tr>
	<td><?=$value['LastName']?>, <?=$value['FirstName']?></td> 
	<td><?=$value['ManufactureName']?> <?=$value['Model']?></td>
	<td><?=$value['OrderNumber']?></td>
	<td><?=$value['OpinionValue']?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['OP_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['OP_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['OP_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>												
	</td>