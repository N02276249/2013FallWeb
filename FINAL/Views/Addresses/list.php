<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Addresses </h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User</th>
				<th>Type</th>
				<th>Street</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
				<tr>
					<td><?=$value['First Name']?> <?=$value['Last Name']?></td> 
					<td><?=$value['Name']?></td>
					<td><?=$value['Street1']?> <?=$value['Street2']?></td>
					<td><?=$value['City']?></td>
					<td><?=$value['State']?></td>
					<td><?=$value['Zip']?></td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
</div>
<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(".table").dataTable();
	</script>
	
<? } ?>
