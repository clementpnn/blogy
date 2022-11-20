<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Route\Route;

class AddPostController extends AbstractController
{
    #[Route('/addPost', name: "addPost", methods: ["GET"])]
    public function addPost()
    {
      $this->render("addPost.php", [], "addPost");

      header("Location: /signin?error=notfound8");
      exit;
    }

    #[Route('/addPost', name: "addPost", methods: ["POST"])]
    public function addPostdb()
    {  
        // Ajoutez // à l'URL.
        $url = "http://"; 
        
        // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
        $url .= $_SERVER['HTTP_HOST']; 
        
        // Ajouter l'emplacement de la ressource demandée à l'URL
        $url .= $_SERVER['REQUEST_URI'];
        
        $searchId = $url;
        $searchId = explode("=",$searchId);
        
        $id = $searchId[1];

        $formTitle = $_POST['title'];
        $formText = $_POST['text'];
        // $nameFile = $_FILES["image"]["name"];
        // $typeFile = $_FILES["image"]["type"];
        // $tmpFile = $_FILES["image"]["tmp_name"];
        
        // // Extensions
        // $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // // Type d'image
        // $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // // On récupère
        // $extensione = explode('.', $nameFile);

        // // On vérifie que le type est autorisés
        // if(in_array($typeFile, $type))
        // {
        //   $uid = uniqid();
        //   // On bouge l'image uploadé dans le dossier upload
        //  move_uploaded_file($tmpFile, '../images/'.$uid . '.' . strtolower(end($extensione)));
        //  $img = $uid . '.' . strtolower(end($extensione));
        // }   
        // else 
        // {
        //     echo "Type non autorisé";
        // }

      $date = new \DateTime();

      $postManager = new PostManager(new PDOFactory());

      $post = (new Post())->setTitle($formTitle)->setContent($formText)->setDate($date)->setAuthor($id)->setImage('image');
      $postManager->insertPost($post);
      
      $this->render("addPost.php", [], "add Post");
    }
}
