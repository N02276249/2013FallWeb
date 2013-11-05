<?
include_once('_password.php');
include_once __DIR__ . '/../Models/Keywords.php';
include_once __DIR__ . '/../Models/Users.php';
include_once __DIR__ . '/../Models/ContactMethods.php';
include_once __DIR__ . '/../Models/Addresses.php';
include_once __DIR__ . '/../Models/Payments.php';
include_once __DIR__ . '/../Models/Products.php';
include_once __DIR__ . '/../Models/Manufactures.php';
include_once __DIR__ . '/../Models/Orders.php';
include_once __DIR__ . '/../Models/Opinion.php';
include_once __DIR__ . '/../Models/Wishlists.php';


function GetConnection()
{
	global $sql_password;
	$conn = new mysqli('localhost', 'n02276249', $sql_password, 'n02276249_db');	
	return $conn;
}

function fetch_all($sql)
{
	$ret = array();
	$conn = GetConnection();
	$result = $conn->query($sql);
	
	echo $conn->error;
	print_r($sql);
	
	while ($rs = $result->fetch_assoc())
	{
		$ret[] = $rs;
	}
	
	$conn->close();		
	return $ret;
}

function fetch_one($sql)
{
	$arr = fetch_all($sql);
	print_r($sql);
	return $arr[0];
}

?>
