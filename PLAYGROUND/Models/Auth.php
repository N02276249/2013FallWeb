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
                        return $_SESSION['User'];
                }
                public static function HasPermission()
                {
                        $user = self::GetUser();
                        return $user['UserType'] == ADMIN;
                }
                
                public static function LogIn($userName, $password)
                {
                        $sql = "        SELECT U.*
                                                FROM 2013NewFall_Users U
                                                WHERE U.LastName='$userName'
                                        ";
                        $user = fetch_one($sql);
                        if($user['Password'] == $password){
                                $_SESSION['User'] = $user;
                        }                        
                }
                
                static public function Secure()
                {
                        if(!self::IsLoggedIn()){
                                header('Location: ' . "/~N02276249/2013/PLAYGROUND/Views/Auth?action=login"); die();
                        }
                }
        }