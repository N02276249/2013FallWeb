<?
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Payments::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[Name]";
		break;
		
	case 'new':	
		$model	= Payments::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Card";		
		break;
		
	case 'save':
		$errors = Payments::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Payments::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit $model[Name]";
		break;				
		
	case 'edit':	
		$model	= Payments::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit $model[Name]";
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = Payments::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= Payments::Get($_REQUEST['id']);
			$view	= 'delete.php';	
		$title	= "Edit $model[Name]";
		break;
					
		
	default:	
		$model	= Payments::Get();
		$view	= 'list.php';
		$title	= "Payments";
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
	
