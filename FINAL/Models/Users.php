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
			return fetch_one("SELECT * FROM 2013NewFall_Users WHERE id='$id'");
		}
		
		else
		{
			return fetch_all('SELECT FirstName, LastName, UserType, K.Name, U.id AS U_id, K.id AS K_id From 2013NewFall_Users U left join 2013NewFall_Keywords K on U.UserType = K.id;');
		}
	}
	
	
	static public function Save($row)
	{
		$sql = 	" Insert Into 2013NewFall_Users (`FirstName`, `LastName`, Password, UserType) "
			.	" Values ('$row[FirstName]', '$row[LastName]', '$row[Password]', '$row[UserType]') ";
		$conn = GetConnection();
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
}
