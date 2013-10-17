<?php

/**
 * 
 */
class Users
{
	static public function Get($id=null)
	{
		if (isset($id))
		{
			return fetch_one("SELECT * From 2013NewFall_Users U left join 2013NewFall_Keywords K on U.UserType = K.id WHERE id=$id");
		}
		
		else
		{
			return fetch_all('SELECT * From 2013NewFall_Users U left join 2013NewFall_Keywords K on U.UserType = K.id');
		}
	}
}
