<?php

namespace MyProject\Models\Users;

use MyProject\Models\AbstractClassMain;

/**
 * WorkCookiesUser класс работы с cookies
 */

class WorkCookiesUser  extends AbstractClassMain
{
    public static function makeCookies(array $data)
    {
        $hash = $data['id'].':'.$data['hash'];

        setcookie('token', $hash, 0, '/', false, '', true);

        header('Location: /', true, 302);

                

    }


    public static function checkCookieUser()
    {
        
        $token = $_COOKIE['token'] ?? '';
        
        if(empty($token)){

            return null;
        }

        [$userId, $userToken] = explode(':', $token, 2);
        
        $user = AbstractClassMain::getById($userId);

        if(empty($user)){
            
            return null;
        }

        
        if($user[0]['hash'] !== $userToken){

            return null;

        }else{

            return $user;

        }


    }
}