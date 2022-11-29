<?php

namespace App\Manager;

use App\Entity\Post;
use App\Entity\User;
use App\Factory\PDOFactory;

class PostManager extends BaseManager
{

    /**
     * @param int $user
     * @return array
     */
    public function getAllPosts(int $user): array
    {
        $query = $this->pdo->prepare("SELECT * FROM `Post`");
        $query->execute();
        $post = [];
        $comment = [];
        return $this->relationshipUser($query);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getOnePosts(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM Post WHERE Post.id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_INT);
        $query->execute();
        $union = [];
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        $union['post'] = new Post($data);
        $comment = new CommentManager(new PDOFactory());
        $union['comment'] = $comment->getAllCommentForOnePost($union['post']->getId());

        return $union;
    }

    /**
     * @param Post $user
     * @return void
     */
    public function insertPost(Post $user): void
    {
        $query = $this->pdo->prepare("INSERT INTO Post (title,content, user_id, created_at, image) VALUES (:title, :content, :user_id, :created_at, :image)");
        $query->bindValue('title', $user->getTitle(), \PDO::PARAM_STR);
        $query->bindValue('content', $user->getContent(), \PDO::PARAM_STR);
        $query->bindValue('user_id', $user->getUser_Id(), \PDO::PARAM_INT);
        $query->bindValue('created_at', $user->getCreated_At(), \PDO::PARAM_STR);
        $query->bindValue('image', $user->getImage(), \PDO::PARAM_STR);
        $query->execute();
    }
    public function UpdatePost(Post $user , $id): void
    {
        $query = $this->pdo->prepare("UPDATE Post SET title=:title,content=:content, user_id=:user_id, created_at=:created_at, image=:image WHERE id=:id");
        $query->bindValue('title', $user->getTitle(), \PDO::PARAM_STR);
        $query->bindValue('content', $user->getContent(), \PDO::PARAM_STR);
        $query->bindValue('user_id', $user->getUser_Id(), \PDO::PARAM_INT);
        $query->bindValue('created_at', $user->getCreated_At(), \PDO::PARAM_STR);
        $query->bindValue('image', $user->getImage(), \PDO::PARAM_STR);
        $query->bindValue('id', $id , \PDO::PARAM_STR);
        $query->execute();
    }

      

    /**
     * @param $query
     * @return array
     */
    private function relationshipComment($query): array
    {
        $union = [];
        $i = 0;

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $union[$i]['post'] = new Post($data);
            $comment = new CommentManager(new PDOFactory());
            $union[$i]['comment'] = $comment->getAllCommentForOnePost($union[$i]['post']->getId());
            $i++;

        }
        return $union;
    }

    private function relationshipUser($query): array
    {
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $union = [];
        $i = 0;
        foreach($data as $post) {
            $union[$i] = new Post($post);
            $userManager = new UserManager(new PDOFactory());
            $union[$i]->setRelationship($userManager->getById($post['user_id']));
            $i++;
        }
        return $union;
    }
}
