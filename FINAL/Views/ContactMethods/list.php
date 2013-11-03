<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Contact Methods </h2>

	<a href="?action=new">Add Contact Method</a>	
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User</th>
				<th>Value</th>
				<th>Contact Type</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
				<tr>
					<td><?=$value['LastName']?>, <?=$value['FirstName']?></td> 
					<td><?=$value['Value']?></td>
					<td><?=$value['Name']?></td>			
					<td>
						<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['C_id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
						<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['C_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"</a>
						<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['C_id']?>&format=dialog"  data-toggle="modal" data-target="#myModal"></a>
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
