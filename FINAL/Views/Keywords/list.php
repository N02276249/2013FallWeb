<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Keywords </h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
				<tr>
					<td><?=$value['id']?></td> 
					<td><?=$value['Name']?></td>				
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
