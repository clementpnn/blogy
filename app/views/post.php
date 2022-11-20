<?php /** @var App\Entity\User $user */ ?>
<h1>Tous les posts</h1>
<a href="http://localhost:1234/addPost">Créé un poste</a>
<br>
<br>
<br>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
    $id = $post['id'];
    ?>
    <span>Titre : <?= $post['title'] ?></span>
    <br>
    <span>Ecrit par : <?= $post['username'] ?></span>
    <br>
    <span>Date : <?= $post['date'] ?></span>
    <br>
    <span>Contenue : <?= $post['content'] ?></span>
    <br>
    <span><?= $post['image'] ?></span>
    <br>
    <a href="http://localhost:1234/postId/<?=$id?>">Voir plus</a>
    <br>
    <br>
    <?php

}