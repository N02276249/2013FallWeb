<?
include_once('_password.php');
include_once __DIR__ . '/../Models/Keywords.php';
include_once __DIR__ . '/../Models/Users.php';
include_once __DIR__ . '/../Models/ContactMethods.php';
include_once __DIR__ . '/../Models/Addresses.php';
include_once __DIR__ . '/../Models/Payments.php';
include_once __DIR__ . '/../Models/Products.php';
include_once __DIR__ . '/../Models/Manufacturers.php';
include_once __DIR__ . '/../Models/Orders.php';
include_once __DIR__ . '/../Models/Opinion.php';


function GetConnection()
{
	global $sql_password;
	$conn = new mysqli('localhost', 'n02276249', $sql_password, 'n02276249_db');	
	return $conn;
}
