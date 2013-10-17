<?php

/**
 * 
 */
class Keywords
{
	static public function Get()
	{
		return fetch_all('SELECT * FROM 2013NewFall_Keywords');
	}
}
