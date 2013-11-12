<?
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Wishlists::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[WishlistValue]";
		break;
		
	case 'new':	
		$model	= Wishlists::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Wishlist";		
		break;
		
	case 'save':
		$errors = Wishlists::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Wishlists::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit: $model[WishlistValue]";
		break;				
		
	case 'edit':	
		$model	= Wishlists::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit: $model[WishlistValue]";		
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = Wishlists::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= Wishlists::Get($_REQUEST['id']);
			$view	= 'delete.php';	
			$title	= "Edit: $model[WishlistValue]";			
		break;
					
		
	default:	
		$model	= Wishlists::Get();
		$view	= 'list.php';
		$title	= "Wishlists";
		break;
}

switch ($format) 
{
	case 'dialog':
		include '../Shared/_dialogLayout.php';
		break;
	
	default:
		include '../Shared/_layout.php';
		break;
}
?>
	

