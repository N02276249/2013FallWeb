<?php

/**
 *
 */
class Addresses {
	static public function Get($id = null) 
	{
		if (isset($id)) 
		{
			return fetch_one("SELECT *,  2013NewFall_Users_id AS Users_id FROM 2013NewFall_Addresses WHERE id='$id'");
		} 
		
		else 
		{
			return fetch_all('SELECT FirstName, LastName, Street1, Street2, City, State, Zip, AddressTypes, Name, A.id AS A_id, U.id AS U_id, K.id AS K_id, 2013NewFall_Users_id From 2013NewFall_Addresses A left join 2013NewFall_Keywords K on A.AddressTypes = K.id left join 2013NewFall_Users U on A.2013NewFall_Users_id = U.id');
		}
	}
	
	static public function GetSelectListFor($id)
	{
		return fetch_all("Select id, Street1, Street2, City, State, Zip FROM 2013NewFall_Addresses");
	}
	
	static public function Save($row) 
	{
		$conn = GetConnection();
		$row2 = Addresses::Encode($row, $conn);
		if ($row['id']) {
			$sql = " UPDATE 2013NewFall_Addresses " . " Set Street1 = '$row2[Street1]', Street2 = '$row2[Street2]', City = '$row2[City]', State = '$row2[State]', Zip = '$row2[Zip]', AddressTypes = '$row2[AddressTypes]',  2013NewFall_Users_id = '$row2[Users_id]' " . " WHERE id = $row2[id] ";
		} else {
			$sql = " Insert Into 2013NewFall_Addresses (`Street1`, `Street2`, City, State, Zip, AddressTypes, 2013NewFall_Users_id) " . " Values ('$row2[Street1]', '$row2[Street2]', '$row2[City]', '$row2[State]', '$row2[Zip]', '$row2[AddressTypes]', '$row2[Users_id]') ";
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

	static public function Blank() {
		return array('id' => null, 'Street1' => null, 'Street2' => null, 'City' => null, 'State' => null, 'Zip' => null, 'AddressTypes' => null, 'Users_id' => null);
	}

	static public function Validate($row) {
		$errors = array();
		if (!$row['Street1'])
			$errors['Street1'] = ' is required';
		if (!$row['City'])
			$errors['City'] = ' is required';
		if (!$row['State'])
			$errors['State'] = ' is required';
		if (!$row['Zip'])
			$errors['Zip'] = ' is required';
		else if (!is_numeric($row['Zip']))
			$errors['Zip'] = ' must be a number';
		if (!isset($row['AddressTypes']))
			$errors['AddressTypes'] = ' is required';
		if (!$row['Users_id'])
			$errors['Users_id'] = ' is required';
		else if (!is_numeric($row['Users_id']))
			$errors['Users_id'] = ' must be a number';

		if (count($errors) == 0) {
			return false;
		} else {
			return $errors;
		}
	}

	static public function Delete($id) {
		$conn = GetConnection();
		$sql = " DELETE from 2013NewFall_Addresses WHERE id=$id ";
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
