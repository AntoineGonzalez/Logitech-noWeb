<?php
  ob_start();

  if(isset($_POST)) {
    if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["mail"]) && isset($_POST["message"])) {
     $to      = '21504712@etu.unicaen.fr';
     $subject = $_POST["object"];
     $message = $_POST["message"];
     $headers = 'From: '.$_POST["mail"]. "\r\n";

     mail($to, $subject, $message, $headers);
   }
  }
?>

<div class="container_form">
  <form action="./contact" method="post">
    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname" placeholder="Votre Prénom.." required>

    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname" placeholder="Votre Nom.." required>

    <label for="mail">Adresse Mail</label>
    <input type="text" id="mail" name="mail" placeholder="Votre Email.." required>

    <label for="object">Objet</label>
    <select id="object" name="object">
      <option value="down">Problèmes de fonctionnement</option>
      <option value="critiques">Critiques du sie</option>
      <option value="coucou">Faire coucou aux Devs</option>
      <option value="autre">Autres</option>
    </select>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Votre message" style="height:200px"></textarea>

    <input type="submit" value="Envoyer">
  </form>
</div>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
 ?>
