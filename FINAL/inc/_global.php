<?
include_once('_password.php');
include_once __DIR__ . '/../Models/Keywords.php';


function GetConnection()
{
	global $sql_password;
	$conn = new mysqli('localhost', 'n02276249', $sql_password, 'n02276249_db');	
	return $conn;
}
