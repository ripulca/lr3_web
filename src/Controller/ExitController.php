<?php
namespace App\Controller;
class ExitController
{
    public function exit(){
        if ($_SESSION['client_id']) {
            unset($_SESSION['client_id']);
            unset($_SESSION['count']);
        }
        header("Refresh:0; url=/");
    }
}