<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use App\Factory\PDOFactory;
use App\Helpers\Utilitaire;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class AdminController extends AbstractController
{

    #[Route('/userlist', name: "commentStore", methods: ["GET"])]
    public function listUser()
    {
        /** @var App\Entity\User $user */

        if(!empty($this->getUser()) && $this->getUser()->getAccess() == "Admin" ){
            $userManager = new UserManager(new PDOFactory());
            $users = $userManager->getAllUsers();
            return $this->render('users/showUsers.php',
                [
                    "users" => $users
                ]);
        }else{
            Utilitaire::redirect('posts');
        }
    }

    #[Route('/admin', name: "commentStore", methods: ["GET"])]
    public function formUpdateUser(): bool|string
    {
        return $this->render('users/editUser.php');
    }

    #[Route('/admin', name: "commentStore", methods: ["POST"])]
    public function updateUser(): bool|string
    {
        $userManager = new UserManager(new PDOFactory());
        $userManager = $userManager->getByIdToArray($this->getUser()->getId());

        $user = new User($userManager);
        $true = false;
        foreach ($_POST as $key => $post){
            $method = 'set' . ucfirst($key);
            if($post != null){
                    $user->$method($post);
                    $true = true;
        }
        }

        if($_POST['password'] != null){
            $user = $user->passwordHash($_POST['password']);
        }
        if(isset($_POST['access'])){
            $user->setAccess('on');
        }

        $userManager = new UserManager(new PDOFactory());
        $userManager->updateUser($user);
        return $this->render('users/editUser.php');
    }

    #[Route('/delete/admin/user/{id}', name: "commentStore", methods: ["GET"])]
    public function deleteUser($id)
    {
        if($this->getUser()->getAccess() == "Admin"){
            $userManager = new UserManager(new PDOFactory());
            $userManager->deleteUser($id);
            Utilitaire::redirect('userlist');
        }else{
            Utilitaire::redirect('posts');
        }
    }

    #[Route('/delete/post/{id}', name: "commentStore", methods: ["POST"])]
    public function deletePost($id)
    {
        /** @var App\Manager\PostManager $postManager **/

        $postManager = new PostManager(new PDOFactory());
        $post = $postManager->getOnePosts($id);


        if($this->getUser()->getAccess() == "Admin"){

            $postManager->deletePost($id);
        }
        Utilitaire::redirect('posts');
    }
}
