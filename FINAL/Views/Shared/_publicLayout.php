<!DOCTYPE html>
<html>
  <head>
    <title>Electronics 'R' Us - <?=@$title?></title>
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
          <a class="navbar-brand" href="../Home"><span class="glyphicon glyphicon-header"></span>ome</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">      
             
             <li class="dropdown">
              <a href="#" class="dropdown-toggle compact" data-toggle="dropdown"><small><? $user=Auth::GetUser(); echo $user['FirstName'];?> <?echo $user['LastName']; ?><br /></small>Your Account <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<? if (Auth::GetUser() != null)
				{
					?>
						<li><a href="?action=manage">Manage Account</a></li>
						<li><a href="?action=logout">Logout</a></li>
					<?
				}
				
				else 
				{
						?><li><a href="?action=login">Login</a></li><?
				}
				?>
				</ul>
             </li>
             <?if(isset($user) && $user['Name'] == 'Admin')
				{?>
			<li>
          	    <a href="../Users">Admin Console</a>
			</li>  <? } ?>
          </ul>
          <p class="navbar-text pull-right" id="shopping-cart"><a href="./cart" class="navbar-link">Cart</a>
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
