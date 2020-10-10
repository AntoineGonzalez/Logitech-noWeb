<?php

  $label = $product->getLabel();
  $price = $product->getPrice();
  $picture = $product->getPicture();
  $date = date('d-m-Y', $product->getDate());
  $description = $product->getDescription();
  $brand = $product->getBrand();
  $name=$user->getLogin();
  $mail=$user->getMail();
  $phone=$user->getPhone();
  $category_libelle = $category->getLibelleCat();
  ob_start();
?>
<div id="detail">
  <section id="produit">

    <h3 id="label">[<?php echo $brand ?>] <?php echo $label ?></h3>
    <figure>
      <img width="200" height="200" src="<?php echo $picture ?>" alt="image du produit">
    </figure>
    <ul>
      <li id="category"><b>Type de produit</b> : <?php echo $category_libelle ?></li>
      <li id="prix"><b>Prix</b> :<?php echo $price ?> euros</li>
    </ul>
    <h4>Description du produit:</h4>
    <p><?php echo $description ?></p>
    <h4>Propriétaire:</h4>
      <p>Posté par <?php echo $name ?> le <?php echo $date ?></p>
      <ul id ="contact">
        <li>Email: <?php echo $mail ?> </li>
        <li>telephone: <?php echo $phone ?> </li>
      </ul>
  </section>

  <?php
    if($isOwner) {
      echo "<ul id=\"action\">" .
          "<a href=\"underconstruct\"><li>Modifier</li></a>" .
          "<a href=\"".$this->router->getDeleteProduct($product->getId())."\"><li>Supprimer</li></a>" .
      "</ul>";
    }
   ?>
</div>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
?>
