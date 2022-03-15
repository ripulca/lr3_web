<?php

namespace App\Model;

use PDO;
use App\Model\DB;


class Post extends DB
{

    function getPostByPhotoId($id){
        $proc = $this->pdo->prepare("
        SELECT P.client_id, P.post_date, P.post_author_comment
        FROM post AS P, photo as PH
        WHERE P.post_id=PH.post_id AND PH.photo_id=?;");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();

        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    function getPostIdByInfo($comment){

        if(!empty($_SESSION)){
            if ($_SESSION['client_id']) {
                $user_id = (int) $_SESSION['client_id'];
            }
            $date=date("Y/m/d");
            $proc = $this->pdo->prepare("
            SELECT P.post_id
            FROM post AS P
            WHERE P.client_id= :id AND P.post_date=:date AND P.post_author_comment=:comment;");

            $proc->bindValue(":id", $user_id, PDO::PARAM_INT);
            $proc->bindValue(":date", $date);
            $proc->bindValue(":comment", $comment, PDO::PARAM_STR);

            $proc->execute();
            return $proc->fetch(PDO::FETCH_ASSOC);
        }
    }

    function add($comment){
        if(!empty($_SESSION)){
            if ($_SESSION['client_id']) {
                $user_id = (int) $_SESSION['client_id'];
            }
            $date=date("Y/m/d");
            try {
                $proc = $this->pdo->prepare("INSERT INTO post (client_id, post_date, post_author_comment) 
                                                VALUES (:client_id, :post_date, :comment); ");

                $save_comment = htmlspecialchars($comment);

                $proc->bindValue(":client_id" , $user_id);
                $proc->bindValue(":post_date" , $date);
                $proc->bindValue(":comment" , $save_comment);
                $proc->execute();
            } catch (PDOException $e) {
                echo "Ошибка сохранения: " . $e->getMessage();
                return false;
            }
        }
        return true;
    }
}