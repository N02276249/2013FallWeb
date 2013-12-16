<?
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];


switch ($action)
{
	case 'details':	
		$model	= Products::Get($_REQUEST['id']);
		$view 	= 'details.php';
		$title	= "Details for: $model[Model]";
		break;
		
	case 'type':
		$model	= Products::FrontType($_REQUEST['id']);
		$view	= 'list.php';
		$title	= "Products";
		break;		
				
	case 'purchaseInitial':
		$model		= Front::Get();
		$product	= Products::Get($_REQUEST['id']);
		$view 		= 'purchaseInitial.php';
		$title		= "Are you a registered user?";
		break;		
		
	case 'newUser':
        $model      = Users::Blank();
		$product	= Products::Get($_REQUEST['product_id']);
		$view 		= 'purchaseNewUser.php';
		$title		= "Create A New User";
		break;	
		
	case 'newAddress':

		$model		= Addresses::Blank();
		$product	= Products::Get($_REQUEST['product_id']);
		$view		= 'purchaseNewAddress.php';
		$titl		= "Create New Address";		
		break;
		
	case 'newPayment':	
		$model		= Payments::Blank();
		$product	= Products::Get($_REQUEST['product_id']);
		$view		= 'purchaseNewPayment.php';
		$titl		= "Create New Payment";		
		break;				
		
	case 'saveUser':
		$product	= Products::Get($_REQUEST['product_id']);
		$errors = Users::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Users::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?action=newAddress&product_id=$product[id]");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewUser.php';
		$title	= "Edit New User" ;
		break;				               
		
	case 'saveAddress':
		$product	= Products::Get($_REQUEST['product_id']);
		$errors = Addresses::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Addresses::Save($_REQUEST);
		}

		if(!$errors)

		{
			header("Location: ?action=newPayment&product_id=$product[id]");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewAddress.php';
		$title	= "Edit New Address";
		break;
		
	case 'savePayment':
		$product	= Products::Get($_REQUEST['product_id']);
		$errors = Payments::Validate($_REQUEST);
		if(!$errors)
		{
			$errors = Payments::Save($_REQUEST);
		}

		if(!$errors)
		{
			header("Location: ?action=purchase&product_id=$product[id]");
			die();		
		}
		
		$model	= $_REQUEST;
		$view	= 'purchaseNewPayment.php';
		$title	= "Edit New Payment";
		break;						
		
		
		
	case 'purchasePayment':
		break;	
							
	case 'save':
		
		Front::Save($_REQUEST);

			header("Location: ?");
			die();		
		
		$model	= $_REQUEST;
		$view	= 'purchase.php';
		$title	= "Purchasing: $product[Model]";
		break;	
		
    case 'purchase':
        $model          = Front::Get();
        $product        = Products::Get($_REQUEST['product_id']);
        $view           = 'purchase.php';
        $title          = "Purchasing: $product[Model]";
        break; 											
		
	default:	
		$model	= Products::FrontAll();
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
		include '../Shared/_frontLayout.php';
		break;
}
?>
	

