<?php

/**
 * 
 */
class Users
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			$sql = "	SELECT U.*, K.Name, U.id AS U_id, K.id AS K_id
						FROM 2013NewFall_Users U
							JOIN 2013NewFall_Keywords K ON U.UserType = K.id
						WHERE U.id=$id
					";
			return fetch_one($sql);
		}
		
		else
		{
			$sql = 		'SELECT FirstName, LastName, UserType, K.Name, U.id AS U_id, K.id AS K_id 
						FROM 2013NewFall_Users U 
							JOIN 2013NewFall_Keywords K on U.UserType = K.id
						';
			return fetch_all($sql);
		}
	}

	static public function GetSelectList($id)
	{
		return fetch_all("Select FirstName, LastName, id FROM 2013NewFall_Users WHERE id=$id");
	}
	
	
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = Users::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_Users "
				.	" Set FirstName = '$row2[FirstName]', LastName = '$row2[LastName]', Password = '$row2[Password]', UserType = '$row2[UserType]' "
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_Users (`FirstName`, `LastName`, Password, UserType) "
				.	" Values ('$row2[FirstName]', '$row2[LastName]', '$row2[Password]', '$row2[UserType]') ";
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
		return array('id' => null, 'FirstName' => null, 'LastName' => null, 'Password' => null, 'UserType' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['FirstName']) $errors['FirstName'] = ' is required';
		if (!$row['LastName']) $errors['LastName'] = ' is required';
		if (!isset($row['UserType'])) $errors['UserType'] = ' is required';
		
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
		$sql = " DELETE from 2013NewFall_Users WHERE id=$id ";
		
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
