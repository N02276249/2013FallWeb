<tr class="<?=$value['U_id']==$_REQUEST['id'] ? 'success' : '' ?> ">
	<td><?=$value['FirstName']?></td> 
	<td><?=$value['LastName']?></td>
	<td><?=$value['Name']?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['U_id']?>" ></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['U_id']?>" ></a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['U_id']?>" ></a>												
	</td>				
</tr>