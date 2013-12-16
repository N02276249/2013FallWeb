<tr>
	<td><?=$value['LastName']?>, <?=$value['FirstName']?></td> 
	<td><?=$value['Name']?></td>
	<td><?=$value['Street1']?> <?=$value['Street2']?></td>
	<td><?=$value['City']?></td>
	<td><?=$value['State']?></td>
	<td><?=$value['Zip']?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['A_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['A_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['A_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>												
	</td>
</tr>