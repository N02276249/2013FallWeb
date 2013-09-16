<?
	$pages = array(
		array(
			'url' => 'index.php',
			'section' => 'home',
			'title' => 'Home'
			),
		array(
			'url' => 'links.php',
			'section' => 'links',
			'title' => 'Links'
			),
		array(
			'url' => 'contact.php',
			'section' => 'contact',
			'title' => 'Contact Us'
			)
		);	
		
		$pages[] = array(
			'url' => 'store.php',
			'section' => 'store',
			'title' => 'Buy Our Stuff'
			);
?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Playground</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	            
            <? foreach ($pages as $name => $data): ?>
            	<li class="<?=$data['section']?>">
            		<a href="<?=$data['url']?>"> <?=$data['title']?> </a>
        		</li>		

            <? endforeach; ?>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Nicholas Marion</a></p>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    	<pre class="container">
    		<?echo json_encode($pages);?>
    	</pre>
