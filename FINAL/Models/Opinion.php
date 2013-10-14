<?php

/**
 * 
 */
class Opinion
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('Select * From 2013NewFall_Opinion OP left join 2013NewFall_Users U on OP.2013NewFall_Users_id = U.id left join 2013NewFall_Products P on OP.Product_id = P.id left join 2013NewFall_Orders O on OP.Orders_id = O.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
