<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Products </h2>
	
	<a href="?action=new">Add Product</a>	

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Description</th>
				<th>Price</th>
				<th>Product Type</th>
				<th>Available</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
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
