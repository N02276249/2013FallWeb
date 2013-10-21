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
			return fetch_one("SELECT * FROM 2013NewFall_Users WHERE id=$id");
		}
		
		else
		{
			return fetch_all('SELECT * From 2013NewFall_Users U left join 2013NewFall_Keywords K on U.UserType = K.id');
		}
	}
	
	
	static public function Save($row)
	{
		$sql = 	" Insert Into 2013NewFall_Users (`First Name`, `Last Name`, Password, UserType) "
			.	" Values ('$row[First_Name]', '$row[Last_Name]', '$row[Password]', '$row[UserType]') ";
		$conn = GetConnection();
		$conn->query($sql);
		echo $conn->error;
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
