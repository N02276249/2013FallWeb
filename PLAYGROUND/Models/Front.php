<?php

/**
 * 
 */
class Front
{
	static public function Get($id = null) 
	{
		$sql = "	SELECT *, O.id AS O_id, U.id AS U_id, P.id AS P_id, A.id AS A_id, OD.id AS OD_id, PR.id AS PR_id, M.id AS M_id, O.2013NewFall_Users_id AS Users_id, O.OrderNumber AS O_OrderNumber, OD.OrderNumber AS OD_OrderNumber
					FROM 2013NewFall_Orders O 
						JOIN 2013NewFall_Users U ON O.2013NewFall_Users_id = U.id
						JOIN 2013NewFall_Payments P ON O.Payments_id = P.id
						JOIN 2013NewFall_Addresses A ON O.Address_id = A.id
						JOIN 2013NewFall_OrderDetails OD ON OD.OrderNumber = O.OrderNumber
						JOIN 2013NewFall_Products PR ON OD.Products_id = PR.id
						JOIN 2013NewFall_Manufactures M ON PR.Manufacture_id = M.id
					";
			return fetch_all($sql);
	}
	
	static public function Save($row) 
	{
		$random = date('U');
		@$orderDate = date('Y-m-d');
		@$shipDate = date('Y-m-d', strtotime("+3 days"));
		$conn = GetConnection();
			$sql = " Insert Into 2013NewFall_Orders (`Payments_id`, `2013NewFall_Users_id`, `Address_id`, `OrderNumber`, `OrderDate`, `ShipDate`)" . 
					" Values ('$row[Payments_id]', '$row[Users_id]', '$row[Address_id]', '$random', '$orderDate', '$shipDate') ";
									
		$conn->query($sql);
		$error = $conn->error;
		
			$sql = " Insert Into 2013NewFall_OrderDetails (`QuotedPrice`, `RequestedQuantity`, `Products_id`, `OrderNumber`) " . 
					" Values ('$row[product_price]', '1', '$row[product_id]', '$random')";
						
		$conn->query($sql);
		$error = $conn->error;					
		$conn -> close();

		if ($error) {
			return array('db_error' => $error);
		} else {
			return false;
		}
	}
}

/*	static public function Blank() 
	{
		return array('id' => null, 'Number' => null, 'Expiration' => null, 'CID' => null, 'Address_id' => null, 'PaymentTypes' => null, 'Users_id' => null, 'Name' => null);
	}

	static public function Validate($row) {
		$errors = array();
		if (!$row['Number'])
			$errors['Number'] = ' is required';
		if (!$row['Expiration'])
			$errors['Expiration'] = ' is required';
		if (!$row['CID'])
			$errors['CID'] = ' is required';
		else if (!is_numeric($row['CID']))
			$errors['CID'] = ' must be a number';
		if (!isset($row['PaymentTypes']))
			$errors['PaymentTypes'] = ' is required';
		else if (!is_numeric($row['PaymentTypes']))
			$errors['PaymentTypes'] = ' must be a number';

		if (count($errors) == 0) {
			return false;
		} else {
			return $errors;
		}
	}


	static function Encode($row, $conn) {
		$row2 = array();
		foreach ($row as $key => $value) {
			$row2[$key] = $conn -> real_escape_string($value);
		}
		return $row2;
	}

}
*/