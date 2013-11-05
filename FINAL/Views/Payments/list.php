<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Payments </h2>
	
	<a href="?action=new">Add Card</a>	

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Number</th>
				<th>Expiration</th>
				<th>Address</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
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
			<? endforeach; ?>
		</tbody>
	</table>
</div>

<div id="myModal" class="modal fade"></div>

<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(".table").dataTable();
	</script>
	
<? } ?>
