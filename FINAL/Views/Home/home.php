<div class = "container">
	
	<div>
		<ul class="nav nav-pills" data-bind="foreach: categories">
			<li><a href="#" data-bind="text: Name, click: $root.categoryClicked" >Cat 1</a></li>
		</ul>
	</div>
		
	<div data-bind="foreach: products" >
		<div class="col-sm-3">
			<div class="well clearfix">
				<img alt="item image" height="128px" data-bind="attr: {src: ImgURL}"></img>
				<h4 data-bind="text: ManufactureName"></h4> <h4 data-bind="text: Model"></h4>
				<p data-bind="text: Description"></p>
				<button type="button" class="btn btn-info btn disabled pull-left" data-bind="text: Price">Price</button>		
                <a class="btn btn-success pull-right" data-bind="attr: { href: '?action=addToCart&id=' + id} " >
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        Add To Cart
                </a>						
			</div>
		</div>
	</div>
	
	
	
</div>

<script type="text/html" id="shopping-cart-template">
	<span class="glyphicon glyphicon-shopping-cart"></span>
	<a href="#">Cart</a>
	<span class="badge"><? $cart = $_SESSION['cart']; echo count($cart); ?></span>
</script>


<? function Scripts()
{?>
		<? global $model; ?>
		
	    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.0.0/knockout-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js"></script>
        
        <script type="text/javascript">
        $(function()
        {
        	$("#shopping-cart").html($("#shopping-cart-template").html());
        	
        	var vm = {
        		categories: ko.observableArray(),
        		products: ko.observableArray(),
        		
        		categoryClicked: function(){
					$.getJSON("?action=products&format=json", { categoryID: this.id } ,function(results){
						vm.products(results.model);
					})        			
        		}
        	}
        	
        	ko.applyBindings(vm);
        	
			$.getJSON("?action=categories&format=json",function(results){
				vm.categories(results.model);
			})
        });
        </script>
<? } ?>
