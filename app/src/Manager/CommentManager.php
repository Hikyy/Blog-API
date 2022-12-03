<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Factory\PDOFactory;

class CommentManager extends BaseManager
{
    public function getAllComment($id): ?Comment
    {
        $data = $this->extracted($id);
        if ($data) {
            $comment = new Comment($data);
            $userManager = new UserManager(new PDOFactory());
            $user = $userManager->getById($comment->getUser_id());
            $comment->setRelationship($user);
        } else {
            $comment = null;
        }
        return $comment;
    }

    public function getAllCommentForOnePost($id): Comment|array
    {
        $query = $this->pdo->prepare("SELECT * FROM Comment WHERE Comment.post_id = $id");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $comment = [];
        foreach ($data as $key => $comments )
        {
            $comment[$key] = new Comment($comments);
            $userManager = new UserManager(new PDOFactory());
            $user = $userManager->getById($comment[$key]->getUser_id());
            $comment[$key]->setRelationship($user);
        }
        return $comment;
    }

    public function insertComment(Comment $comment, $id): void
    {
        $query = $this->pdo->prepare("INSERT INTO Comment (user_id, post_id, response, created_at) VALUES (:user_id, :post_id,:response, :created_at)");
        $query->bindValue('user_id', $comment->getUser_Id(), \PDO::PARAM_INT);
        $query->bindValue('post_id', $id, \PDO::PARAM_INT);
        $query->bindValue('response', $comment->getResponse(), \PDO::PARAM_STR);
        $query->bindValue('created_at', $comment->getCreated_At(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function selectComment($id): Comment
    {
        $query = $this->pdo->prepare("SELECT * FROM Comment WHERE Comment.id = :id");
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $comment = $query->fetch(\PDO::FETCH_ASSOC);
        var_dump($comment);
        return new Comment($comment);
    }

    /**
     * @param $id
     * @return mixed
     */
    private function extracted($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM Comment WHERE Comment.post_id = $id");
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteComment($id): void
    {
        $query = $this->pdo->prepare("DELETE FROM Comment WHERE id = :id");
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }

}