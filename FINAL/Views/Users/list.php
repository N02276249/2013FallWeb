<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<style>
	.table tr.hightlight, .table tr.hightlight td
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
					<? include 'item.php'; ?>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>
	<div id="details" class="col-md-6"></div>
</div>

<div id="myModal" class="modal fade"></div>

<script id="row-template" type="text/x-handlebars-template">
	<td>{{FirstName}}</td> 
	<td>{{LastName}}</td>
	<td>{{Name}}</td>
	<td>
		<a class="glyphicon glyphicon-file" href="?action=details&id={{U_id}}" ></a>
		<a class="glyphicon glyphicon-pencil" href="?action=edit&id={{U_id}}" ></a>
		<a class="glyphicon glyphicon-trash" href="?action=delete&id={{U_id}}" ></a>												
	</td>				
</script>

<script id="tbody-template" type="text/x-handlebars-template">
	{{#each}}
		<tr>
			<td>{{FirstName}}</td> 
			<td>{{LastName}}</td>
			<td>{{Name}}</td>
			<td>
				<a class="glyphicon glyphicon-file" href="?action=details&id={{U_id}}" ></a>
				<a class="glyphicon glyphicon-pencil" href="?action=edit&id={{U_id}}" ></a>
				<a class="glyphicon glyphicon-trash" href="?action=delete&id={{U_id}}" ></a>												
			</td>
		</tr>
	{{/each}}
</script>


<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
	
	<script type="text/javascript">
		$(function()
		{
			
			var template = HandleBars.compile($("#tbody-template").html());
			$(".table tbody").html(tableTemplate(<?=json_encode($model);?>

			$(".table").dataTable();
			
			$(".alert .close").click(function()
			{
				$(this).closest(".alert").slideUp();
				$(".success").removeClass("success");
			});
			/*
			$(".table tr").click(function()
			{
				$(this).toggleClass("hightlight");
			});
			*/
			$(".table a").click(function()
			{

				
				if($(this).closest("tr").hasClass("hightlight"))
				{
					$(".hightlight").removeClass("hightlight");
					$("#table-wrapper").removeClass("col-md-6").addClass("col-md-12");
					$("#details").html('');
				}
				
				else
				{
					$(".hightlight").removeClass("hightlight");
					$(this).closest("tr").addClass("hightlight");
					$("#table-wrapper").addClass("col-md-6").removeClass("col-md-12");
					
					$("#details").load(this.href, {format: "plain"}, function()
					{
						$("#details form").submit(HandleSubmit);
					});
					
				}
				
				return false;
			});
			
/*			var HandleSubmit = function()
			{
				var data = $(this).serializeArray();
				data.push({name:'format', value:'plain'});
				$.post(this.action, data, function(results)
				{
					if($(results).find("form").length)
					{
						$("#details").html(results);						
					}
					
					else
					{
						$(".hightlight").html($(results).html());
					}

				});
				
				return false;
			}
*/

			var HandleSubmit = function()
			{
				var data = $(this).serializeArray();
				data.push({name:'format', value:'json'});
				$.post(this.action, data, function(results)
				{
					if($(results.errors)
					{
						$("#details").html(results);						
					}
					
					else
					{
						var template = HandleBars.compile($("#row-template").html());
						
						$(".hightlight").hmtl(template(results.model));
					}

				}, 'json');
				
				return false;
			}
		})
	</script>
	
<? } ?>