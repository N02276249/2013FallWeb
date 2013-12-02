<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
$errors = null;

switch ($action)
{
	
	case 'categories':
		$model	= Keywords::GetSelectListFor(5);
		
		break;
		
	case 'products':
        $model	= Products::FrontType($_REQUEST['categoryID']);
		break;
 
        
 	default:
        $view	= 'home.php';
        $title	= "Store";
        break;
}

switch ($format)
{
        case 'dialog':
                include '../Shared/_dialogLayout.php';
                break;
        
        case 'plain':
                include $view;
                break;
				
		case 'json':
				echo json_encode(array('model' => $model, 'errors' => $errors));
				break;
        
        default:
                include '../Shared/_publicLayout.php';
                break;
}
?>