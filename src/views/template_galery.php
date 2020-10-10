<?php
ob_start();
?>

<section id="liste_annonce">
  <header id="filtre">
      <form action="#" method="post">
          <label for="namefilter">Rechercher:</label>
          <input type="text" id="namefilter" onkeyup="filter_function()" placeholder="ex: mon_label_produit"/>
      </form>
    </header>
      <?php
        foreach ($annonces as $annonce) {
         echo  "<section class='annonces' >
            <header>
              <div class='brand'>[".$annonce->getBrand()."]</div>
              <h1>".$annonce->getLabel()."</h1>
            </header>
            <ul>
              <li><img src=".$annonce->getPicture()." width='150' height='150'  alt='Photo du produit'></li>
              <li>".$annonce->getPrice()." €</li>
            </ul>
            <footer>
              <ul>
                <li>Posté le ".date('d-m-Y',$annonce->getDate())."</li>
                <li><a href='./product-".$annonce->getId()."' class='button'>Voir le detail</a></li>
              </ul>
            </footer>
          </section>";
        }

      ?>
</section>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
?>
