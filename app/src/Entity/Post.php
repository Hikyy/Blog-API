<?php

namespace App\Entity;

use DateTime;

class Post extends BaseEntity
{
    private ?int $id;
    private string $title;
    private string $content;
    private int $user_id;
    private ?DateTime $created_at;
    private ?string $image;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Post
     */
    public function setId(?int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */
    public function setContent(string $content): Post
    {
        $this->content = $content;
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
     * @return Post
     */
    public function setUser_Id(int $user_id): Post
    {
        $this->user_id = $user_id;
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
     * @return Post
     */
    public function setCreated_At(DateTime|string|null $created_at = 'now'): Post
    {
        $this->created_at = new DateTime($created_at);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Post
     */
    public function setImage(?string $image): Post
    {
        $this->image = $image;
        return $this;
    }

}
