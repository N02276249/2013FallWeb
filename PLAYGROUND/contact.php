<!DOCTYPE html>
<html>
  <head>
    <title>Playground</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
        	body { padding-top: 75px; }
        </style>
  </head>
  <body>


    <?php include ("nav.php"); ?>
    
    <div class="container">
      <div class="well">
        <h1>Hello World</h1>
        <p>Welcome class of 2013 to Web Server Programming <a class="btn btn-default" href="../../components/#navbar">Learn More &raquo;</a> </p>
      </div>
    
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2"> 
				<h2>Contact Us</h2>
				<form class="form-horizontal">
				<div class="form-group">
					<label for="exampleInputEmail1" class="col-md-2 control-label">Your Email</label>
					<div class="col-md-10">
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputMessage1" class="col-md-2 control-label">Message</label>
					<div class="col-md-10">
						<textarea class="form-control" rows="3" id="exampleInputMessage1" placeholder="Please enter a message"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>


    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript"> 
    	$(function(){
    		$(".contact").addClass("active");
    	})    
    </script>	
  </body>
</html>
