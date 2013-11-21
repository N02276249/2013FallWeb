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
		
	default:	
		$model	= Products::Get();
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
	

