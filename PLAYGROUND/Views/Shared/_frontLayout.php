<!DOCTYPE html>
<html>
  <head>
    <title>My Website - <?=@$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
        	body { padding-top: 75px; }
        </style>
  </head>
  <body>
  	
  	<header>
  		<div class="container">
 		 <h1>My Website</h1>
 		 </div>
  	</header>
        <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../Front">Home</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">        		                    		
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../Front/">All Products</a></li>
                <li><a href="?action=type&id=16>">Televisions</a></li>
                <li><a href="?action=type&id=17">Computers</a></li>
                <li><a href="?action=type&id=18">Phones</a></li>
              </ul>
            </li>
          </ul>
          <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Nicholas Marion</a></p>
        </div>
      </div>
    </div>
    
    <? include $view; ?>
     
    

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="Scripts/main.js"></script>
    <? if(function_exists('Scripts')) Scripts(); ?>
  </body>
</html>
