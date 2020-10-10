<?php

  $loginref = $builder->getLoginRef();
  $passref = $builder->getPassRef();
  $passconfref = $builder->getPassConfRef();
  $nameref = $builder->getNameRef();
  $firstnameref =$builder->getFirstnameRef();
  $mailref = $builder->getMailRef();
  $phoneref =$builder->getPhoneRef();

  ob_start();
?>

<div class="container_form">
  <form method="post" action="<?php echo $this->router->registerUser() ?>">

    <p class="error"><?php echo $this->feedback ?></p>

    <label for="login">Nom d'Utilisateur</label>
    <input type="text" id="login" value="<?php echo self::htmlesc($builder->getData($loginref)) ?>" name=<?php echo $loginref ?> placeholder="Nom d'utilisateur">

    <?php
    	$err = $builder->getErrors($loginref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="pass">Mot de passe</label>
    <input type="password" id="pass" value="<?php echo self::htmlesc($builder->getData($passref)) ?>" name=<?php echo $passref ?> placeholder="Mot de passe">

    <?php
	   $err = $builder->getErrors($passref);
     if ($err !== null) {
       echo "<p class='error'>".$err."</p>";
     }
    ?>

    <label for="passconf">Confirmation du mot de passe</label>
    <input type="password" id="passconf" value="<?php echo self::htmlesc($builder->getData($passconfref)) ?>" name=<?php echo $passconfref ?> placeholder="Confirmation du mot de passe">

    <?php
	   $err = $builder->getErrors($passconfref);
     if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
     }
    ?>

    <label for="name">Nom</label>
    <input type="text" id="name" value="<?php echo self::htmlesc($builder->getData($nameref)) ?>" name=<?php echo $nameref ?> placeholder="Nom">

    <?php
	   $err = $builder->getErrors($nameref);
     if ($err !== null) {
         echo "<p class='error'>".$err."</p>";
     }
    ?>

    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" value="<?php echo self::htmlesc($builder->getData($firstnameref)) ?>" name=<?php echo $firstnameref ?> placeholder="Prénom">

    <?php
	   $err = $builder->getErrors($firstnameref);
     if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
     }
    ?>

    <label for="mail">Adresse Mail</label>
    <input type="text" id="mail" value="<?php echo self::htmlesc($builder->getData($mailref)) ?>"  name=<?php echo $mailref ?> placeholder="Adresse Mail">

    <?php
	   $err = $builder->getErrors($mailref);
     if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
     }
    ?>

    <label for="phone">Téléphone</label>
    <input type="text" id="phone" value="<?php echo self::htmlesc($builder->getData($phoneref)) ?>" name=<?php echo $phoneref ?> placeholder="Numéro de téléphone">

    <?php
	   $err = $builder->getErrors($phoneref);
     if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
     }
    ?>

    <input type="submit" value="S'inscrire">

    <span>J'ai déja un compte ? <a href="connexion">Se Connecter !</a></span>

  </form>
</div>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
 ?>
