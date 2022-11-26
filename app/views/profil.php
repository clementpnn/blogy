<form action="" method="post">
  <label for="name">Nom : </label>
  <input type="text" name="name" placeholder="<?=$user['username']?>">

  <label for="mail">Mail : </label>
  <input type="email" name="mail" placeholder="<?=$user['email']?>">

  <label for="admin">Admin (1 = admin ou 0 = membre) : </label>
  <input type="admin" name="admin" placeholder="<?=$user['admin']?>">

  <label for="password">Mot de passe</label>
  <input type="password" name="password">

  <label for="password-confirm">Comfirmez mot de passe</label>
  <input type="password" name="password-confirm">

  <input type="submit" value="modifier">
</form>