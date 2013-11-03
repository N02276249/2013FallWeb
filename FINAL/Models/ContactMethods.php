<?php

/**
 * 
 */
class ContactMethods
{
	static public function Get($id=null)
	{
		if (isset($id))
		{	
			return fetch_one("SELECT *,  2013NewFall_Users_id AS Users_id FROM 2013NewFall_ContactMethods WHERE id='$id'");
		}
		else
		{
			return fetch_all('Select *, C.id AS C_id, U.id AS U_id, K.id AS K_id From 2013NewFall_ContactMethods C left join 2013NewFall_Keywords K on C.ContactMethodType = K.id left join 2013NewFall_Users U on C.2013NewFall_Users_id = U.id');
		}
	}
		
	
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = ContactMethods::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_ContactMethods "
				.	" Set Value = '$row2[Value]', ContactMethodType = '$row2[ContactMethodType]', 2013NewFall_Users_id = '$row2[Users_id]' "
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_ContactMethods (Value, ContactMethodType, 2013NewFall_Users_id) "
				.	" Values ('$row2[Value]', '$row2[ContactMethodType]', '$row2[Users_id]') ";
		}
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
		return array('id' => null, 'Value' => null, 'ContactMethodType' => null, 'Users_id' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['Value']) $errors['Value'] = ' is required';
		if (!isset($row['ContactMethodType'])) $errors['ContactMethodType'] = ' is required';
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
		$sql = " DELETE from 2013NewFall_ContactMethods WHERE id=$id ";
		
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
