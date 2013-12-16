<?
include_once '../../inc/_global.php';
Auth::Secure();
@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Manufactures::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[ManufactureName]";
		break;
		
	case 'new':	
		$model	= Manufactures::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Manufacture";		
		break;
		
	case 'save':
		$errors = Manufactures::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Manufactures::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit: $model[ManufactureName]";
		break;				
		
	case 'edit':	
		$model	= Manufactures::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit: $model[ManufactureName]";		
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = Manufactures::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= Manufactures::Get($_REQUEST['id']);
			$view	= 'delete.php';	
			$title	= "Edit: $model[ManufactureName]";			
		break;
					
		
	default:	
		$model	= Manufactures::Get();
		$view	= 'list.php';
		$title	= "Manufactures";
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
	

