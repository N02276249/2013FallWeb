<?php

/**
 * 
 */
class Products
{
	static public function Get()
	{
		return fetch_all('Select * From 2013NewFall_Products P left join 2013NewFall_Keywords K on P.ProductType = K.id left join 2013NewFall_Manufactures M on P.Manufacture_id = M.id');
	}
}
