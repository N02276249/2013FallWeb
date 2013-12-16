<?php

/**
 * 
 */
class Wishlists
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			$sql = "	SELECT *, W.id AS W_id, U.id AS U_id, P.id AS P_id, M.id AS M_id, W.2013NewFall_Users_id AS Users_id
						FROM 2013NewFall_Wishlists W
							JOIN 2013NewFall_Users U on W.2013NewFall_Users_id = U.id
							JOIN 2013NewFall_Products P on W.Products_id = P.id 
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
						WHERE W.id='$id'							
					";			
					
			return fetch_one($sql);
		}
		
		else 
		{
			$sql = "	SELECT *, W.id AS W_id, U.id AS U_id, P.id AS P_id, M.id AS M_id, W.2013NewFall_Users_id AS Users_id 
						FROM 2013NewFall_Wishlists W
							JOIN 2013NewFall_Users U on W.2013NewFall_Users_id = U.id
							JOIN 2013NewFall_Products P on W.Products_id = P.id 
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
					";
		
			return fetch_all($sql);
		}
	}
			
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = Wishlists::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_Wishlists "
				.	" Set WishlistValue = '$row2[WishlistValue]', Products_id = '$row2[Products_id]', 2013NewFall_Users_id = '$row2[Users_id]'"
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_Wishlists (WishlistValue, Products_id, 2013NewFall_Users_id) "
				.	" Values ('$row2[WishlistValue]', '$row2[Products_id]', '$row2[Users_id]')";
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
		return array('id' => null, 'WishlistValue' => null, 'Products_id' => null, 'Users_id' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['WishlistValue']) $errors['WishlistValue'] = ' is required';
		if (!$row['Products_id']) $errors['Products_id'] = ' is required';
		if (!$row['Users_id']) $errors['Users_id'] = ' is required';
		
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
		$sql = " DELETE from 2013NewFall_Wishlists WHERE id=$id ";
		
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
