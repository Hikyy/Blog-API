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
        $posts = $postManager->getAllPosts();

        return $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "toto",
            "machin" => 42
        ], "Tous les posts");
    }

    /**
     * @return void
     */
    #[Route('/posts', name: "commentStore", methods: ["POST"])]
    public function storeComment(): void
    {

        if($this->getUser() !== null){

            $tabExtension = $this->setImage();
        }
        Utilitaire::redirect('posts');
    }

    #[Route('/post', name: "showStore", methods: ["GET"])]
    public function showStore ()
    {
        if($this->getUser() !== null){
            return $this->render("posts/formPost.php", [
                "machin" => 42
            ]);
        }else{
            Utilitaire::redirect('posts');
        }

    }


    #[Route('/post', name: "store", methods: ["POST"])]
    public function storePost()
    {

        $file = null;
        if($this->getUser() !== null){
            $tabExtension = $this->setImage($file);
            Utilitaire::redirect('post');
        }
        else{
            Utilitaire::redirect('posts');
        }

    }

    /**
     * @param $id
     * @return string
     */
    #[Route('/post/{id}', name: "showPost", methods: ["GET"])]
    public function showPost($id): string
    {
        $postManager = new PostManager(new PDOFactory());
        $post = $postManager->getOnePosts((int)$id);
        return $this->render("blogPost.php",[
            "post" => $post['post'],
            "image" => 'http://localhost:5656/upload/'. $post['post']->getImage(),
            'comments' => $post['comment'],
            'user' => $this->getUser() ?? null
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    #[Route('/post/update/{id}', name: "store", methods: ["POST"])]
    public function updatePost($id)
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
            $post=(new Post($_POST))
                ->setUser_Id($this->getUser()->getId())
                ->setImage($file)
                ->setCreated_At();
            $postManager = new PostManager(new PDOFactory());
            $postManager->UpdatePost($post, (int)$id);

        };
        return Utilitaire::redirect("post/$id");

    }

    /**
     * @param $id
     * @return void
     */
    #[Route('/delete/post/{id}', name: "deletePost", methods: ["GET"])]
    public function deletePost($id)
    {
        /** @var App\Manager\PostManager $postManager **/

        $postManager = new PostManager(new PDOFactory());
        $post = $postManager->getOnePosts((int)$id);

        if($this->getUser()->getId() == $post['post']->getUser_id() || $this->getUser()->getAccess() == "Admin"){

            $postManager->deletePost($id);
        }
        Utilitaire::redirect('posts');
    }
}
