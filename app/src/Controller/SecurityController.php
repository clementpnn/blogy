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
        $this->render("home.php", [], "Blogy");

    header("Location: /?error=notfound1");
    exit;
    }

    #[Route('/', name: "login", methods: ["POST"])]
    public function logindb()
    {
        $formEmail= $_POST['email-login'];
        $formPswd = $_POST['password-login'];

        if (!empty($formEmail) && !empty($formPswd)) {
            $userManager = new UserManager(new PDOFactory());
            $user = $userManager->getByMail($formEmail);
            $pwd = $userManager->getPwd($formEmail);

            if (!$user) {
                header("Location: /?error=notfound3");
                exit;
            }

            if ($user->passwordMatch($formPswd, $pwd)) {

                $this->render("logged.php", [], "titre de la page");
            } else {
                header("Location: /?error=4");
                exit;
            }
        }
    }

    #[Route('/', name: "signin", methods: ["POST"])]
    public function signindb()
    {
        $formname = $_POST['name'];
        $formMail = $_POST['email'];
        $formPwd = $_POST['password'];
        $formCPwd = $_POST['confirm-password'];
        $formAdmin = $_POST['admin'];

        if (!empty($formname) && !empty($formMail) && !empty($formPwd) && !empty($formCPwd) && !empty($formAdmin) && $formPwd === $formCPwd) {

            $userManager = new UserManager(new PDOFactory());

            if (!$userManager->verifyMail($formMail)) {
                header("Location: /?error=6");
                exit;
            }

            $user = (new User())->setUsername($formname)->setEmail($formMail)->setPassword($formPwd, true)->setadmin($formAdmin);
            $id = $userManager->insertUser($user);
            
            $this->render("logged.php", [], "$id");
        }
    }
}
