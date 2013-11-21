<div class="container">
	<div class="media attribution" align="center">
	<a class="pull-top" class="img">
		<img src="<?=$model['ImgURL']?>" width="200px" alt="200x200" />
	</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading"><?=$model['ManufactureName']?> <?=$model['Model']?></h4>
		<dl class="dl-horizontal">
			<dt>Description</dt>
			<dd><?=$model['Description']?></dd>	
			<dt>Price</dt>
			<dd>$<?=$model['Price']?></dd>
			<dt>Availability</dt>
			<dd><?=$model['InStock']?></dd>	
		</dl>
	</div>
	
	<div class="form-group">
		<?
		if($model['InStock'] > 0)
		{?>
			<div>
				<input type="submit" class="form-control btn btn-success" value="Buy Now"/>
			</div>
		<?}
		else
		{?>
			<div>
				<input type="submit" class="form-control btn btn-success" value="Add to Wishlist"/>
			</div>
		<?}?>
		<br>
		<div>
			<input type="submit" class="form-control btn btn-danger" value="Cancel"/>
		</div>
	</div>
</div>