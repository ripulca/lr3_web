<?php
namespace App\Controller;

use App\Model\User;
use App\Controller\RedirectController;

class EnterController
{
    protected $errors=[];

    protected $login;
    protected $password;

    protected $login_pattern="/^[А-Яа-яЁё\s\-]+/";

    public function __construct($data){
        $redirect_obj = new RedirectController();
        $redirect_obj->redirectIfUserLogged();

        $this->login=$data['login'];
        $this->password=$data['password'];
    }
    
    public function validate(){
        $this->checkLogin();
        $this->checkPassword();
    }

    private function checkLogin(){
        if(!empty($this->login)){
            if(preg_match($this->login_pattern,$this->login)){
                return true;
            }
            else{
                array_push($this->errors,'forbidden symbols login');
                return false;
            }
        }
        else{
            array_push($this->errors, 'empty login');
            return false;
        }
    }

    private function checkPassword(){
        if(!empty($this->password)){
            if(strlen($this->password)>6){
                return true;
            }
            else{
                array_push($this->errors, 'pwd length must be over 6 characters');
                return false;
            }
        }
        else{
            array_push($this->errors, 'empty password');
            return false;
        }
    }

    public function getErrorMessages(){
        return $this->errors;
    }

    public function enter()
    {
        $this->validate();
        if(empty($this->getErrorMessages())){
            $user_obj = new User();
            $user = $user_obj->getUserIfPasswordVerify($this->login, $this->password);
            if ($user) {
                $_SESSION["client_id"]=$user['client_id'];
                $_SESSION["client_login"]=$user['client_login'];
                if (!isset($_SESSION['count'])) {
                    $_SESSION['count'] = 0;
                } else {
                    $_SESSION['count']++;
                }
                $response =[
                    "status" =>true,
                    "client_id"=>$user['client_id'],
                    "client_login"=>$user['client_login']
                ];
                return $response;
            } else {
                array_push($this->errors, "Неверный логин или пароль");
            }
        }
        $response =[
            "status" =>false,
            "errors" =>$this->errors
        ];
        return $response;
    }
}