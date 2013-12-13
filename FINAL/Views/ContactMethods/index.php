<?
include_once '../../inc/_global.php';
Auth::Secure();
@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= ContactMethods::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[Value]";
		break;
		
	case 'new':	
		$model	= ContactMethods::Blank();
		$view	= 'edit.php';
		$titl	= "Create New Contact Method";		
		break;
		
	case 'save':
		$errors = ContactMethods::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = ContactMethods::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'edit.php';
		$title	= "Edit: $model[Value]";
		break;				
		
	case 'edit':	
		$model	= ContactMethods::Get($_REQUEST['id']);
		$view	= 'edit.php';
		$title	= "Edit: $model[Value]";
		break;
		
	case 'delete':	
		if(isset($_POST['id']))
		{
			$errors = ContactMethods::Delete($_REQUEST['id']);
			if(!$errors)
			{
				header("Location: ?");
				die();
			}
		}
			$model	= ContactMethods::Get($_REQUEST['id']);
			$view	= 'delete.php';	
			$title	= "Edit: $model[Value]";	
		break;
					
		
	default:	
		$model	= ContactMethods::Get();
		$view	= 'list.php';
		$title	= "Contact Methods";
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
	
