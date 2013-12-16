<tr>
	<td><?=$value['ManufactureName']?></td> 
	<td><?=$value['Model']?></td>
	<td><?=$value['Description']?></td>
	<td><?=$value['Price']?></td>
	<td><?=$value['Name']?></td>
	<td><? if($value['InStock']>=1)
			{?>
				Yes
			<?}
			else if($value['InStock']==0)
			{?>
				No
			<?}?></td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['P_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['P_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['P_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>												
	</td>
</tr>