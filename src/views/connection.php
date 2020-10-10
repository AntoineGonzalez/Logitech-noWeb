<?php
  ob_start();
?>

<div class="container_form">

  <form method="post" action="<?php echo $this->router->getCheckConnection() ?>">

    <label for="login">Adresse Email</label>
    <input type="text" id="login" name="login" placeholder="Nom d'utilisateur">

    <label for="pass">Mot de passe</label>
    <input type="password" id="pass" name="pass" placeholder="Mot de passe">

    <input type="submit" value="Se Connecter">

    <p class="error"><?php echo $this->feedback ?></p>

    <span>Pas encore de compte ? <a href="inscription">S'inscrire !</a></span>
  </form>
</div>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
 ?>
