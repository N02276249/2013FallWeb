<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<div class="container">
	
	<h2> Products </h2>	
			
			<ul class="list-group">
				<? foreach ($model as $value): ?>
				<li class="list-group-item">
			
			  		<div class="media attribution">
						<a class="pull-left" href="#" class="img">
			    			<img src="<?=$value['ImgURL']?>" alt="64x64" />
			    		</a>
			    		<div class="media-body">
			    			<h4 class="media-heading"><?=$value['ManufactureName']?> <?=$value['Model']?></h4>
			    			<p><?=substr($value['Description'], 0, 32)?>...</p>
			    		</div>
					</div>
					
				</li>
				<? endforeach; ?>
			</ul>
</div>

<div id="myModal" class="modal fade"></div>

<? function Scripts()
{ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	</script>
	
<? } ?>
