<h1>Un Post</h1>

<span>Titre : <?= $post[0]["title"] ?></span>
<br>
<span>Ecrit par : <?= $post[0]["username"] ?></span>
<br>
<span>Date : <?= $post[0]["date"] ?></span>
<br>
<span>Contenue : <?= $post[0]["content"] ?></span>
<br>
<span><?= $post[0]["image"] ?></span>
<br>
<br>

<?php
    if ($_SESSION['id']) { ?>

<form action="" method="post">
    <input type="hidden" name="post" value="<?=$post[0]["id"]?>">

    <label for="content">Commentaire</label>
    <input type="text" name="content" required>

    <input type="submit" value="envoyer">
</form>
<br>
<br>

<?php }

foreach ($comments as $comment) {
    $id = $comment['id'];
    ?>
    <span>Ecrit par : <?= $comment['username'] ?></span>
    <br>
    <span>Date : <?= $comment['date'] ?></span>
    <br>
    <span>Contenue : <?= $comment['content'] ?></span>
    <br>
    <br>
    <?php

}