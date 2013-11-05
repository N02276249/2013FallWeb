<?php

/**
 * 
 */
class Orders
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			$sql = "	SELECT *, O.id AS O_id, U.id AS U_id, P.id AS P_id, A.id AS A_id, OD.id AS OD_id, PR.id AS PR_id, M.id AS M_id, OP.id AS OP_id, O.2013NewFall_Users_id AS Users_id 
						FROM 2013NewFall_Orders O 
							JOIN 2013NewFall_Users U ON O.2013NewFall_Users_id = U.id
							JOIN 2013NewFall_Payments P ON O.Payments_id = P.id
							JOIN 2013NewFall_Addresses A ON O.Address_id = A.id
							JOIN 2013NewFall_OrderDetails OD ON OD.Orders_id = O.id
							JOIN 2013NewFall_Products PR ON OD.Products_id = PR.id
							JOIN 2013NewFall_Manufactures M ON PR.Manufacture_id = M.id
							JOIN 2013NewFall_Opinion OP ON O.id = OP.Orders_id
						WHERE O.id='$id'
					";
			return fetch_one($sql);
		}
		
		else 
		{
			return fetch_all('SELECT *, O.2013NewFall_Users_id AS Users_id, O.id AS O_id, U.id AS U_id, P.id AS P_id, A.id AS A_id, OD.id AS OD_id, PR.id AS PR_id, M.id AS M_id, OP.id AS OP_id From 2013NewFall_Orders O left join 2013NewFall_Users U on O.2013NewFall_Users_id = U.id left join 2013NewFall_Payments P on O.Payments_id = P.id left join 2013NewFall_Addresses A on O.Address_id = A.id left join 2013NewFall_OrderDetails OD on OD.Orders_id = O.id left join 2013NewFall_Products PR on OD.Products_id = PR.id left join 2013NewFall_Manufactures M on PR.Manufacture_id = M.id left join 2013NewFall_Opinion OP on O.id = OP.Orders_id');
		}
	}


	static public function Save($row) 
	{
		$conn = GetConnection();
		$row2 = Orders::Encode($row, $conn);
		if ($row['id']) {
			$sql = " UPDATE 2013NewFall_Orders " . " Set OrderDate = '$row2[OrderDate]', ShipDate = '$row2[ShipDate]', Payments_id = '$row2[Payments_id]', Address_id = '$row2[Address_id]', OrderNumber = '$row2[OrderNumber]',  2013NewFall_Users_id = '$row2[Users_id]' " . " WHERE id = $row2[id] ";
		} else {
			$sql = " Insert Into 2013NewFall_Orders (`OrderDate`, `ShipDate`, Payments_id, Address_id, OrderNumber, 2013NewFall_Users_id) " . " Values ('$row2[OrderDate]', '$row2[ShipDate]', '$row2[Payments_id]', '$row2[Address_id]', '$row2[OrderNumber]', '$row2[Users_id]') ";
		}

			print_r($sql);
			
		$conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		if ($error) {
			return array('db_error' => $error);
		} else {
			return false;
		}
	}

	static public function Blank() {
		return array('id' => null, 'OrderDate' => null, 'ShipDate' => null, 'Payments_id' => null, 'Users_id' => null, 'Address_id' => null, 'OrderNumber' => null, 'Users_id' => null);
	}

	static public function Validate($row) {
		$errors = array();
		if (!$row['OrderDate'])
			$errors['OrderDate'] = ' is required';
		if (!$row['Payments_id'])
			$errors['Payments_id'] = ' is required';
		if (!$row['Users_id'])
			$errors['Users_id'] = ' is required';
		if (!$row['Address_id'])
			$errors['Address_id'] = ' is required';
		else if (!is_numeric($row['Address_id']))
			$errors['Address_id'] = ' must be a number';
		if (!isset($row['OrderNumber']))
			$errors['OrderNumber'] = ' is required';

		if (count($errors) == 0) {
			return false;
		} else {
			return $errors;
		}
	}

	static public function Delete($id) {
		$conn = GetConnection();
		$sql = " DELETE from 2013NewFall_Orders WHERE id=$id ";
		$conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		if ($error) {
			return array('db_error' => $error);
		} else {
			return false;
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

