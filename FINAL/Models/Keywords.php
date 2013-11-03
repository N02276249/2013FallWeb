<?php

/**
 * 
 */
class Keywords
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			return fetch_one("SELECT * FROM 2013NewFall_Keywords WHERE id='$id'");
		}
		
		else 
		{
			return fetch_all('SELECT * FROM 2013NewFall_Keywords');	
		}
		
	}		
	
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = Keywords::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_Keywords "
				.	" Set Name = '$row2[Name]', Parent_id = '$row2[Parent_id]'"
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_Keywords (Name, Parent_id) "
				.	" Values ('$row2[Name]', '$row2[Parent_id]')";
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
		return array('id' => null, 'Name' => null, 'Parent_id' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['Name']) $errors['Name'] = ' is required';
		if (!$row['Parent_id'])	$errors['Parent_id'] = ' is required';
		else if (!is_numeric($row['Parent_id']))	$errors['Parent_id'] = ' must be a number';
		
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
		$sql = " DELETE from 2013NewFall_Keywords WHERE id=$id ";
		
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
