<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<style>
	.table tr.success2, .table tr.success2 td
	{
		background-color: #FFAA00 !important;	
	}
	#table-wrapper
	{
 		transition: width .5s;
 		-webkit-transition: width .5s;
	}
</style>

<div class="container">
	
	<h2> Users </h2>

	<? if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Saved'): ?>
		<div class="alert alert-success">
			<button type="button" class="close" aria-hidden="true">&times;</button>
			<b>Success!</b> Your User has been saved.
		</div>	
	<? endif; ?>
	
	<a href="?action=new">Add Contact</a>
	
	<div id="table-wrapper" class="col-md-12">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Type</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<? foreach ($model as $value): ?>
					<tr class="<?=$value['U_id']==$_REQUEST['id'] ? 'success' : '' ?> ">
						<td><?=$value['FirstName']?></td> 
						<td><?=$value['LastName']?></td>
						<td><?=$value['Name']?></td>
						<td>
							<a class="glyphicon glyphicon-file" href="?action=details&id=<?=$value['U_id']?>" ></a>
							<a class="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$value['U_id']?>" ></a>
							<a class="glyphicon glyphicon-trash" href="?action=delete&id=<?=$value['U_id']?>" ></a>												
						</td>				
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>
	<div id="details" class="col-md-6"></div>
</div>

<div id="myModal" class="modal fade"></div>

<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(function()
		{
			$(".table").dataTable();
			
			$(".alert .close").click(function()
			{
				$(this).closest(".alert").slideUp();
				$(".success").removeClass("success");
			});
			/*
			$(".table tr").click(function()
			{
				$(this).toggleClass("success2");
			});
			*/
			$(".table a").click(function()
			{

				
				if($(this).closest("tr").hasClass("success2"))
				{
					$(".success2").removeClass("success2");
					$("#table-wrapper").removeClass("col-md-6").addClass("col-md-12");
					$("#details").html('');
				}
				
				else
				{
					$(".success2").removeClass("success2");
					$(this).closest("tr").addClass("success2");
					$("#table-wrapper").addClass("col-md-6").removeClass("col-md-12");
					
					$("#details").load(this.href, {format: "plain"}, function()
					{
						$("#details form").submit(HandleSubmit);
					});
					
				}
				
				return false;
			});
			
			var HandleSubmit = function()
			{
				$("#details").html(JSON.stringify($(this).serializeArray()));
				return false;
			}
		})
	</script>
	
<? } ?>