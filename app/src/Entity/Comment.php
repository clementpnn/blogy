<?php

namespace App\Entity;

class Comment extends BaseEntity
{
    private int $id;
    private int | null  $postId;
    private int | null $commentId;
    private string $content;
    private int $author;
    private $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

        /**
     * @return int
     */
    public function getPostId(): int | null
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return Comment
     */
    public function setPostId(int | null $postId): Comment | null
    {
        $this->postId = $postId;
        return $this;
    }

        /**
     * @return int
     */
    public function getCommentId(): int | null
    {
        return $this->commentId;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setCommentId(int | null $commentId): Comment | null
    {
        $this->commentId = $commentId;
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
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }

    /**
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return Comment
     */
    public function setAuthor(int $author): Comment
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * 
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

}
