<?php

/**
 * 
 */
class Products
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			return fetch_one("SELECT * FROM 2013NewFall_Products WHERE id='$id'");
		}
		
		else 
		{
			return fetch_all('Select * From 2013NewFall_Products P left join 2013NewFall_Keywords K on P.ProductType = K.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id');
		}
	}
	
	static public function Save($row) 
	{
		$conn = GetConnection();
		$row2 = Products::Encode($row, $conn);
		if ($row['id']) {
			$sql = " UPDATE 2013NewFall_Products " . " Set Model = '$row2[Model]', Description = '$row2[Description]', Price = '$row2[Price]', InStock = '$row2[InStock]', ProductTypes = '$row2[ProductTypes]', Manufacture_id = '$row2[Manufacture_id]' " . " WHERE id = $row2[id] ";
		} else {
			$sql = " Insert Into 2013NewFall_Products (`Model`, `Description`, Price, InStock, Zip, ProductTypes, 2013NewFall_Manufacture_id) " . " Values ('$row2[Model]', '$row2[Description]', '$row2[Price]', '$row2[InStock]', '$row2[ProductTypes]', '$row2[Manufacture_id]') ";
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
		return array('id' => null, 'Model' => null, 'Description' => null, 'Price' => null, 'InStock' => null, 'Zip' => null, 'ProductTypes' => null, 'Manufacture_id' => null);
	}

	static public function Validate($row) {
		$errors = array();
		if (!$row['Model'])
			$errors['Model'] = ' is required';
		if (!$row['Price'])
			$errors['Price'] = ' is required';
		if (!$row['InStock'])
			$errors['InStock'] = ' is required';
		if (!$row['Zip'])
			$errors['Zip'] = ' is required';
		else if (!is_numeric($row['Zip']))
			$errors['Zip'] = ' must be a number';
		if (!isset($row['ProductTypes']))
			$errors['ProductTypes'] = ' is required';
		if (!$row['Manufacture_id'])
			$errors['Manufacture_id'] = ' is required';
		else if (!is_numeric($row['Manufacture_id']))
			$errors['Manufacture_id'] = ' must be a number';

		if (count($errors) == 0) {
			return false;
		} else {
			return $errors;
		}
	}

	static public function Delete($id) {
		$conn = GetConnection();
		$sql = " DELETE from 2013NewFall_Products WHERE id=$id ";
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