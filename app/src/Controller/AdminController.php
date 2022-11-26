<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: "admin", methods: ["GET"])]
    public function admin()
    {
        $manager = new UserManager(new PDOFactory());
        $users = $manager->getAllUsers($_SESSION['id']);

        $this->render("admin.php", [
            "users" => $users,
        ]);
    }
}
