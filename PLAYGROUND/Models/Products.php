<?php

/**
*
*/
class Products {
        /* Wow, that is quite an online editor */
        static public function Get()
        {
                return fetch_all('SELECT * FROM 2013NewFall_Products');
        }
        static public function GetItemsInCategory($CategoryId)
        {
                $sql = " SELECT * FROM 2013NewFall_Products P
                                 Where P.Product_Category_id = $CategoryId
                ";
                return fetch_all($sql);
        }
        static public function GetCategories()
        {
                $sql = " SELECT * FROM _Product_Categories ";
                return fetch_all($sql);
        }
		
			static public function FrontType($id=null)
	{
			$sql = "	Select *, P.id AS P_id, K.id AS K_id, M.id AS M_id 
						From 2013NewFall_Products P 
							JOIN 2013NewFall_Keywords K on P.ProductType = K.id
							JOIN 2013NewFall_Manufactures M on P.Manufacture_id = M.id
						WHERE K.id='$id'
						ORDER BY P.id
					";
			return fetch_all($sql);		
	}	
        
        
}