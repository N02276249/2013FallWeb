<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Orders </h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Order Date</th>
				<th>Name</th>
				<th>Shipping Address</th>
				<th>Payment</th>
				<th>Product</th>
				<th>Price</th>
				<th>Feedback</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
				<tr>
					<td><?=$value['OrderDate']?></td> 
					<td><?=$value['First Name']?> <?=$value['Last Name']?></td> 
					<td><?=$value['Street1']?> <?=$value['Street2']?>, <?=$value['State']?>, <?=$value['Zip']?></td>
					<td><?=$value['Number']?> EXP: <?=$value['Expiration']?></td>
					<td><?=$value['ManufactureName']?> <?=$value['Model']?></td>
					<td><?=$value['Price']?></td>
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