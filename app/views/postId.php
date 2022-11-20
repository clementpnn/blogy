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

<?php
    $id = $post[0]["id"];