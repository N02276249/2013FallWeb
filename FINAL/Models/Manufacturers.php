<?php

/**
 * 
 */
class Manufacturers
{
	static public function Get()
	{
		return fetch_all('Select * From 2013NewFall_Manufactures M left join 2013NewFall_Products P on M.id = P.Manufacture_id left join 2013NewFall_Keywords K on P.ProductType = K.id');
	}
}
