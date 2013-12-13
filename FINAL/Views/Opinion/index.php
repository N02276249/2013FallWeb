<?
include_once '../../inc/_global.php';
Auth::Secure();
@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Opinion::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[OpinionValue]";
		break;
		
	case 'new':	
		$model	= Opinion::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Opinion";		
		break;
		
	case 'save':
		$errors = Opinion::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Opinion::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit: $model[OpinionValue]";
		break;				
		
	case 'edit':	
		$model	= Opinion::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit: $model[OpinionValue]";		
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = Opinion::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= Opinion::Get($_REQUEST['id']);
			$view	= 'delete.php';	
			$title	= "Edit: $model[OpinionValue]";			
		break;
					
		
	default:	
		$model	= Opinion::Get();
		$view	= 'list.php';
		$title	= "Addresses";
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
	
