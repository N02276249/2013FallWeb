<?php

/**
 * 
 */
class Wishlists
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('SELECT * From 2013NewFall_Wishlists W left join 2013NewFall_Users U on W.2013NewFall_Users_id = U.id left join 2013NewFall_Products P on W.Products_id = P.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
