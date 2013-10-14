<?php

/**
 * 
 */
class Addresses
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('Select * From 2013NewFall_Addresses A left join 2013NewFall_Keywords K on A.AddressTypes = K.id left join 2013NewFall_Users U on A.2013NewFall_Users_id = U.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
