<div id="navbar">
  <ul>
   <li><a href="." class="active">Logitech'noweb</a></li>
   <li><a href="galery">Nos produits</a></li>
   <li><a href="propos">À Propos</a></li>
   <li><a href="creation">Déposer une annonce</a></li>
   <li><a href="contact">Contact</a></li>
     <?php
      if(isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        $html = "<li class=float_right>".
                  "<a>Bonjour ".$user->getLogin()."!</a>".
                "</li>".
                "<li class=float_right>".
                  "<a href=\"".$this->router->getLogout()."\">Se Déconnecter</a>".
                "</li>";
      } else {
        $html = "<li class=float_right>".
                  "<a href=\"".$this->router->getConnectionPage()."\">Se Connecter</a>".
                "</li>";
      }
      echo $html;
     ?>
  </ul>
</div>
