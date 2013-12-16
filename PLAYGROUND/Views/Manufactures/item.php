<tr>
	<td><?=$value['ManufactureName']?></td> 
	<td><?=$value['Name']?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['M_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['M_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['M_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>		
	</td>						
</tr>