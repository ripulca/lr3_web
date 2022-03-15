<?php
namespace App\Controller;

use App\Model\User;

class RedirectController
{
    function redirectIfUserLogged($user_var='client_id', $redirect_to='/')
    {
        if(!empty($_SESSION)){
            if(array_key_exists($user_var, $_SESSION)){
                session_start();
                if ($_SESSION[$user_var]) {
                    header("Location: " . $redirect_to);
                    exit;
                }
            }
        }
    }

    function getUserIfUserLogged()
    {
        // session_start();
        
        if(!empty($_SESSION)){
            if(array_key_exists('client_id', $_SESSION)){
                if ($_SESSION['client_id']) {
                    $user_id = (int) $_SESSION['client_id'];

                    $user_obj = new User();
                    return $user_obj->getUserById($user_id);
                }
            }
        }
        return false;
    }

    function redirectIfUserNotLogged($user_var='client_id', $redirect_to='/')
    {
        // session_start();

        if(!array_key_exists($user_var, $_SESSION)){
            header("Location: " . $redirect_to);
            exit;
        }
    }
}