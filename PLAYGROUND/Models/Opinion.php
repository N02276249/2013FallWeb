<?php

/**
 * 
 */
class Opinion
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			return fetch_one("SELECT *, OP.2013NewFall_Users_id AS Users_id FROM 2013NewFall_Opinion OP WHERE id='$id'");
		}
		
		else 
		{
		return fetch_all('Select *, OP.2013NewFall_Users_id AS Users_id, OP.id AS OP_id, U.id AS U_id, P.id AS P_id, O.id AS O_id, M.id AS M_id From 2013NewFall_Opinion OP left join 2013NewFall_Users U on 2013NewFall_Users_id = U.id left join 2013NewFall_Products P on OP.Product_id = P.id left join 2013NewFall_Orders O on OP.Orders_id = O.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id');
		}
	}
	
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = Opinion::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_Opinion "
				.	" Set OpinionValue = '$row2[OpinionValue]', Product_id = '$row2[Product_id]', Orders_id = '$row2[Orders_id]', 2013NewFall_Users_id = '$row2[Users_id]', "
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_Opinion (OpinionValue, Product_id, Orders_id, 2013NewFall_Users_id) "
				.	" Values ($row2[OpinionValue]', '$row2[Product_id]', '$row2[Orders_id]', '$row2[Users_id])";
		}
print_r($sql);		
		$conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		if($error)
		{
			return array('db_error' => $error);
		}
		
		else 
		{
			return false;
		}
	}
	
	static public function Blank()
	{
		return array('id' => null, 'OpinionValue' => null, 'Product_id' => null, 'Orders_id' => null, 'Users_id' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['OpinionValue']) $errors['OpinionValue'] = ' is required';
		if (!$row['Product_id'])	$errors['Product_id'] = ' is required';
		else if (!is_numeric($row['Product_id']))	$errors['Product_id'] = ' must be a number';
		if (!$row['Orders_id'])	$errors['Orders_id'] = ' is required';
		else if (!is_numeric($row['Orders_id']))	$errors['Order_id'] = ' must be a number';
		if (!$row['Users_id'])	$errors['Users_id'] = ' is required';
		else if (!is_numeric($row['Users_id']))	$errors['Users_id'] = ' must be a number';
		
		
		if(count($errors) == 0)
		{
			return false;
		}				
		
		else
		{
			return $errors;
		}
	}
	
	static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = " DELETE from 2013NewFall_Opinion WHERE id=$id ";
		
		$conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		if($error)
		{
			return array('db_error' => $error);
		}
		
		else 
		{
			return false;
		}
	}
	
	static function Encode($row, $conn)
	{
		$row2 = array();
		foreach ($row as $key => $value)
		{
			$row2[$key] = $conn->real_escape_string($value);
		}
		return $row2;
	}
}

