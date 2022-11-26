<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Entity\User;
use App\Manager\UserManager;
use App\Route\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: "profil", methods: ["GET"])]
    public function postId()
    {
      $manager = new UserManager(new PDOFactory());
      $user = $manager->getById($_SESSION['id']);

        $this->render("profil.php", [
          "user" => $user,
      ]);
    }

    #[Route('/profil', name: "profil", methods: ["POST"])]
    public function postIddb()
    {
        $formName= $_POST['name'];
        $formMail = $_POST['mail'];
        $formAdmin = $_POST['admin'];
        $formPassword = $_POST['password'];
        $hash = false;

        $manager = new UserManager(new PDOFactory());
        $user = $manager->getById($_SESSION['id']);

        if (!empty($formName)) {
          $formName = $user['username'];
        }

        if (!empty($formMail)) {
          $formMail = $user['email'];
        } elseif (!$manager->verifyMail($formMail)) {
            header("Location: /profil?error=10");
            exit;
          }

        if (!empty($formAdmin)) {
          $formAdmin = $user['admin'];
        }

        if (!empty($formPassword) && !empty($_POST['password-confirm'])) {
          $formName = $user['password'];
        } elseif (!empty($formPassword) or !empty($_POST['password-confirm'])) {
          header("Location: /profil?error=11");
          exit;
        } else {
          $hash = true;
        }

        $user = (new User())->setUsername($formName)->setEmail($formMail)->setPassword($formPassword, $hash)->setAdmin($formAdmin);
        $manager->updateUser($user, $_SESSION['id']);
        $_SESSION['admin'] = $formAdmin;

        header("Location: /profil");
        exit;
    }
}
