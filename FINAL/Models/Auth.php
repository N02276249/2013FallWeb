<?
	const ADMIN = 1;

	class Auth
	{
		public static function IsLoggedIn()
		{
			return self::GetUser() != null;
		}
		
		public static function GetUser()
		{
			if(isset($_SESSION['User']))
			{
				return $_SESSION['User'];
			}
			
			else return null;
			
		}
				
		public static function HasPermission()
		{
			$user = self::GetUser();
			return $user['UserType'] == ADMIN;
		}	

		public static function LogIn($userName, $password)
		{
			$sql = "	SELECT U.*, K.Name
						FROM 2013NewFall_Users U
							JOIN 2013NewFall_Keywords K ON U.UserType = K.id
						WHERE U.LastName='$userName'
					";
			$user = fetch_one($sql);
			if($user['Password'] == $password)
			{
				$_SESSION['User'] = $user;	
			}
		}		
		
		public static function Secure()
		{
			if(!self::IsLoggedIn())
			{
				header('Location: ' . "../Auth?action=login");
				die();
			}
		}			
	}

?>