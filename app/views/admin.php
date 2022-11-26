<?php
foreach ($users as $user) {
    $id = $user['id'];
    ?>
    <span>Nom : <?= $user['username'] ?></span>
    <br>
    <span>Email : <?= $user['email'] ?></span>
    <br>
    <span>Supprimer</span>
    <br>
    <br>
<?php
}