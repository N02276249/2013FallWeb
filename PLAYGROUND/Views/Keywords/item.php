<tr>
	<td><?=$value['id']?></td> 
	<td><?=$value['Name']?></td>	
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>		
	</td>			
</tr>