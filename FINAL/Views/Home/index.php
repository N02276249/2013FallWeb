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
		
	case 'manage':
		$view = "manage.php";
		break;

	case 'updatePassword':
		Users::UpdatePassword($_REQUEST);
		$view = "manage.php";
		break;
		
	case 'newUser':
        $model      = Users::Blank();
		$view 		= 'purchaseNewUser.php';
		$title		= "Create A New User";
		break;	
		
	case 'newAddress':

		$model		= Addresses::Blank();
		$view		= 'purchaseNewAddress.php';
		$titl		= "Create New Address";		
		break;
		
	case 'newPayment':	
		$model		= Payments::Blank();
		$view		= 'purchaseNewPayment.php';
		$titl		= "Create New Payment";		
		break;				
		
		
		
	case 'saveUser':
		$errors = Users::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Users::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?action=login");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewUser.php';
		$title	= "Edit New User" ;
		break;			
		
	case 'saveAddress':
		$errors = Addresses::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Addresses::Save($_REQUEST);
		}

		if(!$errors)

		{
			header("Location: ?action=manage");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewAddress.php';
		$title	= "Edit New Address";
		break;
		
	case 'savePayment':
		$errors = Payments::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Payments::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?action=manage");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewPayment.php';
		$title	= "Edit New Payment";
		break;						
		
	case 'finalPurchase':
		$random = @date('U');

		Orders::FinalSale($_REQUEST, $random);
		
		foreach ($_SESSION['cart'] as $value):
			$cart[] = Products::Get($value['id']);
		endforeach;		
		
		foreach ($cart as $value):
			Orders::FinalSaleDetails($value, $random);
		endforeach;
		$view = "home.php";
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