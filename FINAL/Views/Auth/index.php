<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
$errors = null;

switch ($action)
{
        case 'login':    
			$model = array('LastName' => null, 'Password' => null);    
            $view		= 'login.php';
            $title		= "Login";                
            break;
			
		case 'submitLogin':
			Auth::LogIn($_REQUEST['LastName'], $_REQUEST['Password']);
            if(isset($user) && $user['Name'] == 'Admin')
			{
				header("Location: ../Users/");				
			}
			else
			{
				header("Location: ../Home/");
			}
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
                include '../Shared/_layout.php';
                break;
}
?>