<?php /** @var App\Entity\User $user */ ?>
<h1>Tous les posts</h1>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
    $id = $post['id'];
    ?>
    <span><?= $post['title'] ?></span>
    <br>
    <span><?= $post['username'] ?></span>
    <br>
    <span><?= $post['date'] ?></span>
    <br>
    <span><?= $post['content'] ?></span>
    <br>
    <span><?= $post['image'] ?></span>
    <br>
    <a href="http://localhost:1234/postId/<?=$id?>">Voir plus</a>
    <br>
    <br>
    <?php

}