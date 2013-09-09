<!DOCTYPE html>
<html>
  <head>
    <title>Final Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">

  </head>
  <body>
    <h1>This is the Final Project.</h1>
    <h2>It will be an E-Commerce website.</h2>
    
    <?
    
    	$msg = 'Hello ';
		$name = 'Nicholas';
		
		include 'something.php';
				
	?>

	<span class="label label-success"><?= $msg . $name ?></span>


    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
