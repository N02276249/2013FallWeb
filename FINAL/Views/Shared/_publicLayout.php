<!DOCTYPE html>
<html>
  <head>
    <title>Electronics 'R Us - <?=@$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
        	body { padding-top: 75px; }
        </style>
  </head>
  <body>
  	
  	<header>
  		<div class="container">
 		 <h1>Electronics 'R' Us</h1>
 		 </div>
  	</header>
  	<div class="container">
        <div class="navbar navbar-default">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../Home">Home</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<li><a href="../Orders/">Categories</a></li>

              </ul>
             </li>           
             
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Account<b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<li><a href="../Orders/">Manage Account</a></li>

              </ul>
             </li>
             
          </ul>
          <p class="navbar-text navbar-right"><a href="#" id="shopping-cart" class="navbar-link">Cart</a></p>
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
