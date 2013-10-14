<?php

/**
 * 
 */
class Payments
{
	static public function Get()
	{
		$ret = array();
		$conn = GetConnection();
		$result = $conn->query('SELECT * From 2013NewFall_Payments P left join 2013NewFall_Keywords K on P.PaymentTypes = K.id left join 2013NewFall_Users U on P.2013NewFall_Users_id = U.id left join 2013NewFall_Addresses A on P.Address_id = A.id');
		
		while ($rs = $result->fetch_assoc())
		{
			$ret[] = $rs;
		}
		
		$conn->close();		
		return $ret;
	}
}
