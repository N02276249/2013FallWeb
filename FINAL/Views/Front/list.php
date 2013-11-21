<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Products </h2>	
			
			<ul class="list-group">
				<? foreach ($model as $value): ?>
				<div class="well">
			
			  		<div class="media attribution">
						<a class="pull-left" href="?action=details&id=<?=$value['P_id']?>&format=dialog" data-toggle="modal" data-target="#myModal" class="img">
			    			<img src="<?=$value['ImgURL']?>" width="128px" alt="128x128" />
			    		</a>
			    		<div class="media-body">
			    			<h4 class="media-heading"><?=$value['ManufactureName']?> <?=$value['Model']?></h4>
			    			<p><?=$value['Description']?></p>
			    			<button type="button" class="btn btn-info btn-lg disabled">$<?=$value['Price']?></button>
			    			<button type="button" class="pull-right btn btn-success btn-sm" align="right">Add to Cart</button>
			    		</div>
					</div>
					
				</div>
				<? endforeach; ?>
			</ul>
</div>

<div id="myModal" class="modal fade"></div>

<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
</script>		
<? } ?>


