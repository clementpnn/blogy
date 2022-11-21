<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Entity\User;
use App\Route\Route;

class SigninController extends AbstractController
{
    #[Route('/signin', name: "signin", methods: ["GET"])]
    public function signin()
    {
        $this->render("signin.php");

        header("Location: /signin?error=notfound1");
        exit;
    }

    #[Route('/signin', name: "signin", methods: ["POST"])]
    public function signindb()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password']) && !empty($_POST['admin'])) {
            if ($_POST['password'] === $_POST['confirm-password']) {
                $formname = $_POST['name'];
                $formMail = $_POST['email'];
                $formPwd = $_POST['password'];
                $formAdmin = $_POST['admin'];

                $userManager = new UserManager(new PDOFactory());

                if (!$userManager->verifyMail($formMail)) {
                    header("Location: /signin?error=6");
                    exit;
                }

                if ($formAdmin == 1 or $formAdmin == 0) {
                    $user = (new User())->setUsername($formname)->setEmail($formMail)->setPassword($formPwd, true)->setAdmin($formAdmin);
                    $id = $userManager->insertUser($user);

                    $_SESSION['id'] = $id;
                    $_SESSION['admin'] = $formAdmin;


                    header("Location: /post");
                    exit;
                }

                header("Location: /signin?error=notfound12");
                exit;
            }
        }
    }
}
