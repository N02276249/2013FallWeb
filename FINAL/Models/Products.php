<?php

/**
 * 
 */
class Products
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('Select * From 2013NewFall_Products P left join 2013NewFall_Keywords K on P.ProductType = K.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id left join 2013NewFall_Opinion OP on P.id = OP.Product_id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
