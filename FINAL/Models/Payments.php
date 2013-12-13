<?php

/**
 * 
 */
class Payments
{
	static public function Get($id = null) 
	{
		if (isset($id)) 
		{
			$sql = 	"	SELECT *, P.2013NewFall_Users_id AS Users_id, P.id AS P_id, K.id AS K_id, U.id AS U_id, A.id AS A_id
						FROM 2013NewFall_Payments P
							JOIN 2013NewFall_Keywords K ON P.PaymentTypes = K.id
							JOIN 2013NewFall_Users U ON P.2013NewFall_Users_id = U.id
							JOIN 2013NewFall_Addresses A ON P.Address_id = A.id
						WHERE P.id='$id'
					";
			return fetch_one($sql);
		} 
		
		else 
		{
			$sql = 	"	SELECT *, P.2013NewFall_Users_id AS Users_id, P.id AS P_id, K.id AS K_id, U.id AS U_id, A.id AS A_id 
						FROM 2013NewFall_Payments P 
							JOIN 2013NewFall_Keywords K ON P.PaymentTypes = K.id 
							JOIN 2013NewFall_Users U ON P.2013NewFall_Users_id = U.id 
							JOIN 2013NewFall_Addresses A on P.Address_id = A.id
					";
			return fetch_all($sql);
		}
	}
	
	static public function GetSelectList($id)
	{
		return fetch_all("Select Number, Expiration, P.id AS P_id, U.id AS U_id FROM 2013NewFall_Payments P JOIN 2013NewFall_Users U ON P.2013NewFall_Users_id = U.id WHERE U.id=$id");
	}
		
	
	static public function Save($row) 
	{
		print_r($row);
		$conn = GetConnection();
		$row2 = Payments::Encode($row, $conn);
		if ($row['id']) {
			$sql = " UPDATE 2013NewFall_Payments " . " Set Number = '$row2[Number]', Expiration = '$row2[Expiration]', CID = '$row2[CID]', Address_id = '$row2[Address_id]', PaymentTypes = '$row2[PaymentTypes]',  2013NewFall_Users_id = 'row2[Users_id]' " 
			. " WHERE id = $row2[id] ";
		} else {
			$sql = " Insert Into 2013NewFall_Payments (`Number`, `Expiration`, `CID`, `Address_id`, `PaymentTypes`, `2013NewFall_Users_id`) " . " Values ('$row2[Number]', '$row2[Expiration]', '$row2[CID]', '$row2[Address_id]', '$row2[PaymentTypes]', '$row2[Users_id]') ";
		}

		$conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		if ($error) {
			return array('db_error' => $error);
		} else {
			return false;
		}
	}

	static public function Blank() 
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

	static public function Delete($id) {
		$conn = GetConnection();
		$sql = " DELETE from 2013NewFall_Payments WHERE id=$id ";
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
