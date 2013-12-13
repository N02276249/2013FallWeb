<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
$errors = null;

switch ($action) {
        case 'categories':
				$model	= Keywords::GetSelectListFor(5);
                break;

        case 'list':			
        $model	= Products::FrontType($_REQUEST['categoryID']);
                break;
                
        default:
                //$model = Products::Get();
                $view         = 'home.php';
                $title        = 'Home';                
                break;
}

switch ($format) {
        case 'dialog':
                include '../Shared/_DialogLayout.php';                                
                break;
                
        case 'plain':
                include $view;
                break;
                
        case 'json':
                echo json_encode(array('model'=> $model, 'errors'=> $errors));
                break;
        
        default:
                include '../Shared/_PublicLayout.php';                
                break;
}