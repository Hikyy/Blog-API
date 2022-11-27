<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Factory\PDOFactory;
use App\Helpers\Utilitaire;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{

    /**
     * @return false|string
     */
    #[Route('/posts', name: "showHome", methods: ["GET"])]
    public function showHome()
    {
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts($this->getUser()->getId());


        return $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "toto",
            "machin" => 42
        ], "Tous les posts");
    }

    #[Route('/post', name: "showStore", methods: ["GET"])]
    public function showStore ()
    {
        return $this->render("posts/formPost.php", [
            "machin" => 42
        ]);
    }

    /**
     * @throws \Exception
     */
    #[Route('/post', name: "store", methods: ["POST"])]
    public function storePost ()
    {
        $file = null;
        if(isset($_FILES['image'])){
            $tmpName = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 40000000;
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
                $uniqueName = uniqid('', true);
                $file = $uniqueName.".".$extension;
                move_uploaded_file($tmpName,'upload/'.$file);
            }

        };

        $user = (new Post($_POST))
                ->setUser_Id($this->getUser()->getId())
                ->setImage($file)
                ->setCreated_At();
        $manger = new PostManager(new PDOFactory());
        $manger->insertPost($user);
        Utilitaire::redirect('post');
    }

    /**
     * @param $id
     * @return string
     */
    #[Route('/post/{id}', name: "showUpdate", methods: ["GET"])]
    public function showUpdate($id)
    {
        $postManager = new PostManager(new PDOFactory());
        $post = $postManager->getOnePosts((int)$id);
        $base = dirname(__DIR__, 2);
        return $this->render("blogPost.php",[
            "post" => $post['post'],
            "image" => 'http://localhost:5656/upload/'. $post['post']->getImage(),
            'comments' => $post['comment']
        ]);
    }

    #[Route('/post/{id}', name: "store", methods: ["POST"])]
    public function uupdate($id)
    {
        var_dump($id);
    }
}
