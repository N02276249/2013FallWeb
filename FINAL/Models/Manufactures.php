<?php

/**
 * 
 */
class Manufactures
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			return fetch_one("SELECT * FROM 2013NewFall_Manufactures WHERE id='$id'");
		}
		
		else 
		{
			return fetch_all('Select *, M.id AS M_id, P.id AS P_id, K.id AS K_id From 2013NewFall_Manufactures M  left join 2013NewFall_Products P on M.id = P.Manufacture_id left join 2013NewFall_Keywords K on P.ProductType = K.id');
		}
		
	}		
	
	static public function Save($row)
	{
		$conn = GetConnection();		
		$row2 = Manufactures::Encode($row, $conn);
		if ($row['id'])
		{
			$sql =  " UPDATE 2013NewFall_Manufactures "
				.	" Set ManufactureName = '$row2[ManufactureName]'"
				.	" WHERE id = $row2[id] ";
		}
	
		else 
		{
			$sql = 	" Insert Into 2013NewFall_Manufactures (ManufactureName) "
				.	" Values ('$row2[ManufactureName]')";
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
		return array('id' => null, 'ManufactureName' => null);
	}
	
	static public function Validate($row)
	{
		$errors = array();
		if (!$row['ManufactureName']) $errors['ManufactureName'] = ' is required';
		
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
		$sql = " DELETE from 2013NewFall_Manufactures WHERE id=$id ";
		
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
