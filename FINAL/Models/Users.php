<?php

/**
 * 
 */
class Users
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('SELECT * From 2013NewFall_Users U left join 2013NewFall_Keywords K on U.UserType = K.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
