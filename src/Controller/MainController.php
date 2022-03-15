<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\User;
use App\Model\Photo;
use App\Controller\BaseController;
use App\Controller\PostController;
use App\Controller\EnterController;
use App\Controller\RedirectController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends BaseController
{
    private DB $db;
    private Photo $photo_obj;
    private PostController $post_obj;
    private User $user_obj;
    private EnterController $enter_obj;
    private RegistrationController $reg_obj;

    private RedirectController $redirect;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function startPage(): Response
    {
        $this->redirect = new RedirectController();
        $user=false;
        if(!empty($this->redirect->getUserIfUserLogged())){
            $user=$this->redirect->getUserIfUserLogged();
        }
        return $this->renderTemplate('start.php', $user);
    }

    public function detailpage(): Response
    {
        $this->redirect = new RedirectController();
        $this->redirect->redirectIfUserNotLogged();
        $photo_id=$_POST["photo_id"];
        $this->photo_obj=new Photo();
        $photo=$this->photo_obj->getPhotoById($photo_id);
        $this->post_obj=new Post();
        $post=$this->post_obj->getPostByPhotoId($photo["photo_id"]);
        $this->user_obj=new User();
        $user=$this->user_obj->getUserById($post["client_id"]);
        $detail_page = [
            'post'=>$post,
            'photo'=>$photo,
            'user'=>$user
        ];
        return $this->renderTemplate('detail.php', $detail_page);
    }

    public function showmore(): Response
    {
        if (!array_key_exists('page', $_GET)) {
            return false;
        }
        $page_num = (int)$_GET['page'];
        $photos_per_page = 9;
        $offset = (int)($page_num * $photos_per_page);
        $photos = $this->photo_obj->getPhotosWithOffset($offset);
        return $this->renderTemplate('photo_gen.php', $photos);
    }

    public function authorize(): Response
    {
        $this->redirect = new RedirectController();
        $this->redirect->redirectIfUserLogged();
        $this->enter_obj=new EnterController($_POST);
        $user=$this->enter_obj->enter();
        return $this->renderTemplate('log.php', $user);
    }

    public function register(): Response
    {
        $this->redirect = new RedirectController();
        $this->redirect->redirectIfUserLogged();
        $this->reg_obj=new RegistrationController($_POST);
        $user=$this->reg_obj->register();
        return $this->renderTemplate('log.php', $user);
    }

    public function addPost(): Response
    {
        $this->redirect = new RedirectController();
        $this->redirect->redirectIfUserNotLogged();
        $this->post_obj=new PostController($_POST);
        $post=$this->post_obj->addPost();
        return $this->renderTemplate('log.php', $post);
    }
}