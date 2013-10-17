<?php

/**
 * 
 */
class ContactMethods
{
	static public function Get()
	{
		return fetch_all('Select * From 2013NewFall_ContactMethods C left join 2013NewFall_Keywords K on C.ContactMethodType = K.id left join 2013NewFall_Users U on C.2013NewFall_Users_id = U.id');
	}
}
