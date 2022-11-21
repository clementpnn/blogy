<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Entity\User;
use App\Route\Route;

class SecurityController extends AbstractController
{
    #[Route('/', name: "login", methods: ["GET"])]
    public function login()
    {
        $this->render("home.php");

        header("Location: /?error=notfound1");
        exit;
    }

    #[Route('/', name: "login", methods: ["POST"])]
    public function logindb()
    {
        if (!empty($_POST['email-login']) && !empty($_POST['password-login'])) {
            $formEmail= $_POST['email-login'];
            $formPswd = $_POST['password-login'];

            $userManager = new UserManager(new PDOFactory());
            $user = $userManager->getByMail($formEmail);
            $data = $userManager->getPwd($formEmail);

            $user = (new User())->setId($data['id'])->setAdmin($data['admin']);

            $_SESSION['id'] = $data['id'];
            $_SESSION['admin'] = $data['admin'];

            if (!$user) {
                header("Location: /?error=notfound3");
                exit;
            }

            if ($user->passwordMatch($formPswd, $data['password'])) {

                header("Location: /post");
                exit;
            } else {
                header("Location: /?error=4");
                exit;
            }
        }
    }
}