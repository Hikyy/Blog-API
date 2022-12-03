<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Factory\PDOFactory;
use App\Helpers\Utilitaire;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Route\Route;

class CommentController extends AbstractController
{

    /**
     * @return void
     */
    #[Route('/post/{id}', name: "commentStore", methods: ["POST"])]
    public function storeComment($id): void
    {
        if($this->getUser()->getId()){
            $comment = (new Comment($_POST))
                ->setUser_Id($this->getUser()->getId())
                ->setCreated_At();
            $commentManager = new CommentManager(new PDOFactory());
            $commentManager->insertComment($comment,(int) $id);
        }
        Utilitaire::redirect("post/$id");
    }

    /**
     * @param $id
     * @return void
     */
    #[Route('/delete/admin/user/{id}', name: "commentStore", methods: ["GET"])]
    public function deleteUser($id)
    {
        /** @var App\Entity\User $user */

        $commentManager = new CommentManager(new PDOFactory());
        $comment = $commentManager->selectComment($id);

        if($this->getUser()->getId() == $comment->getUser_Id() && $this->getUser()->getAccess() == "Admin" ){
            $userManager = new CommentManager(new PDOFactory());
            $userManager->deleteComment($id);
        }
        Utilitaire::redirect('posts');
    }

//    /**
//     * @param $id
//     * @return void
//     */
//    #[Route('/delete/post/{id}', name: "commentStore", methods: ["GET"])]
//    public function deleteComment($id): void
//    {
//
//        $commentManager = new CommentManager(new PDOFactory());
//        $userId = $commentManager->selectComment($id)->getUser_Id();
//        //$comment = $commentManager->deleteComment($id);
//
//        if($this->getUser()->getId() == $userId){
//            $commentManager->deleteComment($id);
//        }
//
//        Utilitaire::redirect("post/$post");
//    }
}
