<?php
namespace App\Controller;

use SplFileInfo;
use App\Model\Post;
use App\Model\Photo;
use App\Controller\RedirectController;

class PostController
{
    protected $errors=[];

    protected $name;
    protected $comment;
    protected $format;

    protected $name_pattern="/^[A-Za-zА-Яа-яЁё\s\-]+/";
    protected $comment_pattern="/^[0-9A-Za-zА-Яа-яЁё\s\-]+/";

    public function __construct($data){
        $redirect_obj = new RedirectController();
        $redirect_obj->redirectIfUserNotLogged();
        $this->name=$data['photo_name'];
        $this->comment=$data['photo_comment'];

        $info = new SplFileInfo($_FILES['photo']['name']);
        $this->format=$info->getExtension();
    }

    public function validate(){
        $this->checkName();
        $this->checkComment();
        $this->checkFormat();
    }

    public function checkName(){
        if(!empty($this->name)){
            if(preg_match($this->name_pattern,$this->name)){
                return true;
            }
            else{
                array_push($this->errors,'forbidden symbols name');
                return false;
            }
        }
        else{
            array_push($this->errors, 'empty login');
            return false;
        }
    }
    
    public function checkComment(){
        if(preg_match($this->comment_pattern,$this->comment)||empty($this->comment)){
            return true;
        }
        else{
            array_push($this->errors,'forbidden symbols comment');
            return false;
        }
    }

    public function checkFormat(){
        if((($_FILES['photo']['type']!='image/jpeg')&&($_FILES['photo']['type']!='image/png'))||(($this->format!='jpg')&&($this->format!='jpeg')&&($this->format!='png'))){
            array_push($this->errors, "Неправильный тип файла\n");
            return false;
        }
        return true;
    }

    public function getErrorMessages(){
        return $this->errors;
    }

    public function addPost()
    {
        $this->validate();
        if(empty($this->getErrorMessages())){
            $uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR;
            $bddir=DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR;
            $files=$_FILES['photo']['name'];
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            $bddir=$bddir.basename($_FILES['photo']['name']);
        
            $post=new Post();
            if($post->add($this->comment)){
                $post_info=$post->getPostIdByInfo($this->comment);
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                    $photo=new Photo();
                    if($photo->add($post_info['post_id'], $this->name, $bddir, $this->format)){
                        $response =[
                            "status" =>true
                        ];
                    } else {
                        array_push($errors, "Ошибка добавления фото\n");
                    }
                } else {
                    array_push($errors, "Ошибка сохранения на сервер\n");
                }
            } else {
                array_push($errors, "Ошибка создания поста\n");
            }
            if (!empty($errors)) {
                $response =[
                    "status" =>false,
                    "errors" =>$errors
                ];
            }
            return $response;
        }
        else{
            $response =[
                "status" =>false,
                "errors" =>$errors
            ];
            return $response;
        }
    }
}