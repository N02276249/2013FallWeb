<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Opinions </h2>
	
	<a href="?action=new">Add Opinion</a>	

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Product</th>
				<th>Order Number</th>
				<th>Feedback</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
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
