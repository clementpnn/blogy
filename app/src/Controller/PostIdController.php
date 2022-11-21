<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Entity\Comment;
use App\Manager\UserManager;
use App\Route\Route;

class PostIdController extends AbstractController
{
    #[Route('/postId/{id}', name: "id", methods: ["GET"])]
    public function postId($id)
    {
      $manager = new PostManager(new PDOFactory());
      $post = $manager->getPost($id);

      $commentManager = new CommentManager(new PDOFactory());
      $comment = $commentManager->getAllComments($id);

        $this->render("postId.php", [
          "post" => $post,
          "comments" => $comment,
      ]);
    }

    #[Route('/postId/{id}', name: "id", methods: ["POST"])]
    public function postIddb($id)
    {
        if (!empty($_POST['post']) && !empty($_POST['content'])) {
            $formPost= $_POST['post'];
            $formContent = $_POST['content'];

            $date = new \DateTime();

            $commentManager = new CommentManager(new PDOFactory());

            $comment = (new Comment())->setPostId($formPost)->setCommentId(null)->setContent($formContent)->setAuthor($_SESSION['id'])->setDate($date);
            $commentManager->insertComment($comment);
        }

        if (!empty($_POST['comment']) && !empty($_POST['content-comment'])) {
          $formComment= $_POST['comment'];
          $formContent = $_POST['content-comment'];

          $date = new \DateTime();

          $commentManager = new CommentManager(new PDOFactory());

          $comment = (new Comment())->setCommentId($formComment)->setPostId(null)->setContent($formContent)->setAuthor($_SESSION['id'])->setDate($date);
          $commentManager->insertComment($comment);
      }

      header("Location: /postId/$id");
      exit;
    }
}
