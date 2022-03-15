<?php
namespace App\Controller;
use Post;
use Photo;
use SplFileInfo;
use PostController;

class PhotoController
{
    protected $errors=[];

    protected $name;
    protected $comment;
    protected $format;
    // protected $uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR;
    protected $bddir=DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR;

    public function __construct($data){
        $this->name=$data['photo_name'];
        $this->comment=$data['photo_comment'];
        $info = new SplFileInfo($_FILES['photo']['name']);
        $this->format=$info->getExtension();

        $validation_obj = new PostController($name, $comment, $format);
        $validation_obj->validate();
        $this->errors = $validation_obj->getErrorMessages();
        if(!empty($this->errors)){
            $response =[
                "status" =>false,
                "errors" =>$this->errors
            ];
            echo json_encode($response);
            return;
        }
    }

    public function uploadPhoto(){
        $files=$_FILES['photo']['name'];
        $uploadfile = $this->uploaddir . basename($_FILES['photo']['name']);
        $new_bddir=$this->bddir.basename($_FILES['photo']['name']);

        $post=new Post();
        if($post->add($this->comment)){
            $post_id=$post->getPostIdByInfo($comment)["post_id"];
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $photo=new Photo();
                if($photo->add($post_id, $name, $bddir, $format)){
                    $response =[
                        "status" =>true,
                    ];
                } else {
                    array_push($errors, "Ошибка добавления фото\n");
                }
            } else {
                array_push($errors, "Ошибка сохранения на сервер\n");
            }
        } else {
            array_push($this->errors, "Ошибка создания поста<br>");
            array_push($this->errors, $post->getErrorMessages());
        }
        if (!empty($this->errors)) {
            $response =[
                "status" =>false,
                "errors" =>$this->errors
            ];
        }
        echo json_encode($response);
    }
}