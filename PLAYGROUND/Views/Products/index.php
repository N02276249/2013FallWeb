<?
include_once '../../inc/_global.php';
Auth::Secure();
@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Products::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[Model]";
		break;
		
	case 'new':	
		$model	= Products::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Product";		
		break;
		
	case 'save':
		$errors = Products::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Products::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit: $model[Model]";
		break;				
		
	case 'edit':	
		$model	= Products::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit: $model[Model]";		
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = Products::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= Products::Get($_REQUEST['id']);
			$view	= 'delete.php';	
			$title	= "Edit: $model[Model]";			
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
		include '../Shared/_layout.php';
		break;
}
?>
	

