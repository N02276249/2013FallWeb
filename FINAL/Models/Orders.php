<?php

/**
 * 
 */
class Orders
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('SELECT * From 2013NewFall_Orders O left join 2013NewFall_Users U on O.2013NewFall_Users_id = U.id left join 2013NewFall_Payments P on O.Payments_id = P.id left join 2013NewFall_Addresses A on O.Address_id = A.id left join 2013NewFall_OrderDetails OD on OD.Orders_id = O.id left join 2013NewFall_Products PR on OD.Products_id = PR.id left join 2013NewFall_Manufactures M on PR.Manufacture_id = M.id left join 2013NewFall_Opinion OP on O.id = OP.Orders_id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
