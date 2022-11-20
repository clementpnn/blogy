<?php /** @var App\Entity\User $user */ ?>
<h1>Tous les posts</h1>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
    $id = $post['id'];
    echo $post['title'];
    echo '<br>';
    echo $post['username'];
    echo '<br>';
    echo $post['date'];
    echo '<br>';
    echo $post['content'];
    echo '<br>';
    echo $post['image'];
    echo '<br>';
    echo '<a href="http://localhost:1234/post?id=$id">Voir plus</a>';
    echo '<br>';
    echo '<br>';
}