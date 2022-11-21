<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
    /**
     * @return Comment[]
     */
    public function getAllComments($id): array
    {
        $query = $this->pdo->query("SELECT User.username, Comment.id, Comment.content, Comment.author, Comment.post, Comment.date, Comment.comment FROM Comment JOIN User ON Comment.author = User.id WHERE Comment.post = $id");
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getPost($id): array
    {
        $query = $this->pdo->query("SELECT User.username, Post.id, Post.content, Post.author, Post.title, Post.date, Post.image FROM Post JOIN User ON Post.author = User.id WHERE Post.id = $id");
        // $query->bindValue("id", $id, \PDO::PARAM_INT);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertComment(Comment $comment): void
    {
        $query = $this->pdo->prepare("INSERT INTO Comment (content, post, comment, date, author) VALUES (:content, :post, :comment, STR_TO_DATE(:date, '%d/%m/%Y %H:%i:%s' ), :author)");
        $query->bindValue("content", $comment->getContent(), \PDO::PARAM_STR);
        $query->bindValue("post", $comment->getPostId(), \PDO::PARAM_INT);
        $query->bindValue("comment", $comment->getCommentId(), \PDO::PARAM_INT);
        $query->bindValue("date", $comment->getDate()->format('d/m/Y H:i:s'));
        $query->bindValue("author", $comment->getAuthor(), \PDO::PARAM_INT);
        $query->execute();
    }
}
