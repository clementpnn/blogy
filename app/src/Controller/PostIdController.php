<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostIdController extends AbstractController
{
    #[Route('/postId/{id}', name: "id", methods: ["GET"])]
    public function postId($id)
    {
      $manager = new PostManager(new PDOFactory());
      $post = $manager->getPost($id);

        $this->render("postId.php", [
          "post" => $post,
      ], "Un post");
    }
}
