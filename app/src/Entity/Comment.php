<?php

namespace App\Entity;


use DateTime;

class Comment extends BaseEntity
{
    private ?int $id;
    private int $user_id;
    private int $post_id;
    private string $response;
    private ?DateTime $created_at;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Comment
     */
    public function setId(?int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser_Id(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Comment
     */
    public function setUser_Id(int $user_id): Comment
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPost_Id(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     * @return Comment
     */
    public function setPost_Id(int $post_id): Comment
    {
        $this->post_id = $post_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

    /**
     * @param string $response
     * @return Comment
     */
    public function setResponse(string $response): Comment
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated_At(): string
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    /**
     * @param DateTime|string|null $created_at
     * @return Comment
     */
    public function setCreated_At(DateTime|string|null $created_at = 'now'): Comment
    {
        $this->created_at = new DateTime($created_at);
        return $this;
    }
}