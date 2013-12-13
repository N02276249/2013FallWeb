<?php

/**
*
*/
class Keywords {
        
        static public function Get()
        {
                return fetch_all('SELECT * FROM 2013NewFall_Keywords');
        }
        static public function GetSelectListFor($id)
        {
				return fetch_all("Select id, Name, Parent_id FROM 2013NewFall_Keywords WHERE Parent_id = $id ");
        }
}