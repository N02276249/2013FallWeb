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
			$sql = "	Select *, P.id AS P_id, K.id AS K_id, M.id AS M_id 
						From 2013NewFall_Products P 
							JOIN 2013NewFall_Keywords K on P.ProductType = K.id
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
						WHERE P.id='$id'							
					";			
					
			return fetch_one($sql);
		}
		
		else 
		{
			$sql = "	Select *, P.id AS P_id, K.id AS K_id, M.id AS M_id 
						From 2013NewFall_Products P 
							JOIN 2013NewFall_Keywords K on P.ProductType = K.id
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
					";
			return fetch_all($sql);
		}
	}

	static public function GetSelectList()
	{
		return fetch_all("Select id AS P_id, Model FROM 2013NewFall_Products");
	}	
	
	static public function FinalPurchase($id)
	{
		return fetch_all("Select id, Price FROM 2013NewFall_Products WHERE id=$id");
	}		
	
	static public function FrontAll()
	{
			$sql = "	Select *, P.id AS P_id, K.id AS K_id, M.id AS M_id 
						From 2013NewFall_Products P 
							JOIN 2013NewFall_Keywords K on P.ProductType = K.id
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
						ORDER BY P.id
					";
			return fetch_all($sql);		
	}
	
	static public function FrontType($id=null)
	{
			$sql = "	Select *, P.id AS P_id, K.id AS K_id, M.id AS M_id 
						From 2013NewFall_Products P 
							JOIN 2013NewFall_Keywords K on P.ProductType = K.id
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
						WHERE K.id='$id'
						ORDER BY P.id
					";
			return fetch_all($sql);		
	}	
	
	
	static public function Save($row) 
	{
		$conn = GetConnection();
		$row2 = Products::Encode($row, $conn);
		if ($row['id']) {
			$sql = " UPDATE 2013NewFall_Products " . " Set Model = '$row2[Model]', Description = '$row2[Description]', Price = '$row2[Price]', InStock = '$row2[InStock]', ProductType = '$row2[ProductType]', Manufacture_id = '$row2[Manufacture_id]' " . " WHERE id = $row2[id] ";
		} else {
			$sql = " Insert Into 2013NewFall_Products (`Model`, `Description`, Price, InStock, Zip, ProductType, 2013NewFall_Manufacture_id) " . " Values ('$row2[Model]', '$row2[Description]', '$row2[Price]', '$row2[InStock]', '$row2[ProductType]', '$row2[Manufacture_id]') ";
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
		return array('id' => null, 'Model' => null, 'Description' => null, 'Price' => null, 'InStock' => null, 'Zip' => null, 'ProductType' => null, 'Manufacture_id' => null);
	}

	static public function Validate($row) {
		$errors = array();
		if (!$row['Model'])
			$errors['Model'] = ' is required';
		if (!$row['Description'])
			$errors['Description'] = ' is required';
		if (!$row['Price'])
			$errors['Price'] = ' is required';
		if (!$row['InStock'])
			$errors['InStock'] = ' is required';
		else if (!is_numeric($row['InStock']))
			$errors['InStock'] = ' must be a number';
		if (!isset($row['ProductType']))
			$errors['ProductType'] = ' is required';
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