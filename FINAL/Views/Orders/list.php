<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Orders </h2>
	
	<a href="?action=new">Add Order</a>	

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Order Number</th>
				<th>Name</th>
				<th>Shipping Address</th>
				<th>Payment</th>
				<th>Product</th>
				<th>Price</th>
				<th>Order Date</th>
				<th>Ship Date</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($model as $value): ?>
					<? include 'item.php'; ?>
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
