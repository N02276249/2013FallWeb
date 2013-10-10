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
		$result = $conn->query('SELECT * FROM 2013NewFall_Users'); //must add Keywords db table
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
