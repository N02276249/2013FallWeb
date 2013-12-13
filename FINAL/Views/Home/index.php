<?php
include_once '../../inc/_global.php';
@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
$errors = null;

switch ($action)
{
	
	case 'categories':
		$model	= Keywords::GetSelectListFor(5);
		break;
		
	case 'products':
        $model	= Products::FrontType($_REQUEST['categoryID']);
		break;
		
	case 'removeFromCart':
		unset($_SESSION['cart'][$_REQUEST['id']]);
		header('Location: ?action=cart');
		break;
		
	case 'addToCart':
		$cart = $_SESSION['cart'];
		$cart[] = $_REQUEST['id'];
		$_SESSION['cart'] = $cart;
		header('Location: ?');
		break;
 
	case 'cart':
		foreach ($_SESSION['cart'] as $value):
			$cart[] = Products::Get($value['id']);
		endforeach;		
			
		$view = "cart.php";
		break;
	
	case 'purchase':
		$view = "purchase.php";
		break;
        
	case 'logout':
		session_destroy();
		session_start();
		$_SESSION['cart'] = array();
		$view = "home.php";
		break;
		
	case 'login':
		$model = array('LastName' => null, 'Password' => null);    
		$view = "login.php";
		break;
		
	case 'submitLogin':
		Auth::LogIn($_REQUEST['LastName'], $_REQUEST['Password']);
		header("Location: ../Home/");			
		
		if(isset($_SESSION['url']) && $_SESSION['url'] != null)
		{
			$url = $_SESSION['url'];
			$_SESSION['url'] = null;
			header("Location: http://cs.newpaltz.edu/" . $url);
		}
		
		else
		{
			$view="home.php";
		} 
    

		break;
		
 	default:
		$model = array('LastName' => null, 'Password' => null); 
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