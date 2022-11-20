<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: "post", methods: ["GET"])]
    public function post()
    {
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        $this->render("post.php", [
            "posts" => $posts,
        ], "Tous les posts");
    }

    // /**
    //  * @param $id
    //  * @param $truc
    //  * @param $machin
    //  * @return void
    //  */
    // #[Route('/post/{id}', name: "id", methods: ["GET"])]
    // public function showOne($id)
    // {
    //     var_dump($id);
    // }
}
