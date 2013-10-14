<?php

/**
 * 
 */
class Manufacturers
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('Select * From 2013NewFall_Manufactures M left join 2013NewFall_Products P on M.id = P.Manufacture_id left join 2013NewFall_Keywords K on P.ProductType = K.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
