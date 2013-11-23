<?
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Products::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[Model]";
		break;
		
	case 'type':
		$model	= Products::FrontType($_REQUEST['id']);
		$view	= 'list.php';
		$title	= "Products";
		break;		
				
	case 'purchase':
		$model		= Front::Get();
		$product	= Products::Get($_REQUEST['id']);
		$view 		= 'purchase.php';
		$title		= "Purchasing: $product[Model]";
		break;		
							
	case 'save':
		
		Front::Save($_REQUEST);

			header("Location: ?");
			die();		
		
		$model	= $_REQUEST;
		$view	= 'purchase.php';
		$title	= "Purchasing: $product[Model]";
		break;										
		
	default:	
		$model	= Products::FrontAll();
		$view	= 'list.php';
		$title	= "Products";
		break;
}

switch ($format) 
{
	case 'dialog':
		include '../Shared/_dialogLayout.php';
		break;
	
	default:
		include '../Shared/_frontLayout.php';
		break;
}
?>
	

