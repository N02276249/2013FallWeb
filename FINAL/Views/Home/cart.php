<?$_SESSION['url'] = $_SERVER['REQUEST_URI'];?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th></th>
                        <th></th>
                        <th  class="col-sm-1 col-md-1 text-center">Price</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                	<?
                	if (is_array(@$cart)) {
                	 $subtotal = 0; foreach ($cart as $cartkey => $value): ?>
						<tr>
							

	                        <td class="col-sm-8 col-md-6">
	                        <div class="media">
	                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?=$value['ImgURL']?>" style="width: 100px; height: 72px;"> </a>
	                            <div class="media-body">
	                                <h4 class="media-heading"><a href="#"><?=$value['Model']?></a></h4>
	                                <h5 class="media-heading"> by <a href="#"><?=$value['ManufactureName']?></a></h5>
	                                <span>Status: </span>
	                                <?
	                                	if($value['InStock'] > 0)
										{
										?>
										<span class="text-success"><strong>In Stock</strong></span>
										<?
										}
																	
										else
										{
										?><span class="text-danger"><strong>Currently Not Available</strong></span><?			
										}
										?>

	                            </div>
	                        </div></td>
	                        <td class="col-sm-1 col-md-1" style="text-align: center">
	                        <td></td>
	                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$value['Price']?></strong></td>
	                        <td class="col-sm-1 col-md-1">
                        	<a href="?action=removeFromCart&id=<?=$cartkey?>" class="btn btn-danger">Remove</a>
                        	</td>
	                    </tr>
	                    <?$subtotal += $value['Price'];?>
					<? endforeach; }
					else 
					{
						$subtotal = 0;?><h3>You have nothing in your cart.</h3><br>
					<?}?>
					
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?=$subtotal?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong><?$shipping = number_format(($subtotal / 95), 2, '.', ','); echo $shipping;?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?$finalCost=($subtotal + $shipping); echo $finalCost;?></strong></h3></td>
                    </tr>
                    <tr>
                        <?if(!empty($cart))
                        {?>
                        <td>
                        	<a href="?action=emptyCart" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>Empty Cart</a></td>
                        <? } 
                        else 
                        {
                        	?><td></td><?
                        }?>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        	<a href="?action=" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Continue Shopping</a>
                        </td>
                        <?if(!empty($cart))
                        {?>
                        <td>
                        	<a href="?action=purchase&total=<?=$finalCost?>" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>Checkout</a></td>
                        <? } 
                        else 
                        {
                        	?><td></td><?
                        }?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>