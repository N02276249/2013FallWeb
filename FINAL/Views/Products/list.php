<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Products </h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Description</th>
				<th>Price</th>
				<th>Product Type</th>
				<th>Available</th>
				<th>Review</th>
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
					<td><?=$value['OpinionValue']?></td>
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
