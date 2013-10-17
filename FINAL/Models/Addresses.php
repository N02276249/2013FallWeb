<?php

/**
 * 
 */
class Addresses
{
	static public function Get()
	{
		return fetch_all('Select * From 2013NewFall_Addresses A left join 2013NewFall_Keywords K on A.AddressTypes = K.id left join 2013NewFall_Users U on A.2013NewFall_Users_id = U.id');
	}
}
