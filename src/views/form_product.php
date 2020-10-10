<?php

  $label_ref = $builder->getLabelRef();
  $description_ref = $builder->getDescriptionRef();
  $price_ref = $builder->getPriceRef();
  $brand_ref = $builder->getBrandRef();
  $category_ref = $builder->getCategoryRef();
  $picture_ref = $builder->getPictureRef();

  ob_start();
?>

<div class="container_form">

    <form method="post" action="<?php echo $this->router->registerProduct()?>" enctype="multipart/form-data">

    <p class="error"><?php echo $this->feedback ?></p>

    <label for="label">Label produit</label>
    <input type="text" id="label" value="<?php echo self::htmlesc($builder->getData($label_ref)) ?>" name=<?php echo $label_ref ?> placeholder="Label produit">

    <?php
      $err = $builder->getErrors($label_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="category">Categorie</label>
    <select id="category" name="category">
      <?php
        foreach ($categories as $cat) {
          echo "<option value=".$cat["category_libelle"].">".$cat["category_libelle"]."</option>";
        }
       ?>

    </select>
    <?php
      $err = $builder->getErrors($category_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="brand">Marque du produit</label>
    <input type="text" id="brand" value="<?php echo self::htmlesc($builder->getData($brand_ref)) ?>" name=<?php echo $brand_ref ?> placeholder="ex : Asus, Logitech ...">

    <?php
      $err = $builder->getErrors($brand_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="description">Descrition du produit</label>
    <textarea id="description" name=<?php echo $description_ref ?> rows="4" cols="50" placeholder="Décriver le produit..."><?php echo self::htmlesc($builder->getData($description_ref)) ?></textarea>

    <?php
      $err = $builder->getErrors($description_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="prix">Prix</label>
    <input  type="number" step="0.01" id="prix" value="<?php echo self::htmlesc($builder->getData($price_ref)) ?>" name=<?php echo $price_ref ?> min="0" placeholder="ex : 20.50">

    <?php
      $err = $builder->getErrors($price_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <label for="picture">Image</label>
    <input type="file" id="picture" name=<?php echo $picture_ref ?> accept="image/png,image/jpeg">

    <?php
      $err = $builder->getErrors($picture_ref);
      if ($err !== null) {
        echo "<p class='error'>".$err."</p>";
      }
    ?>

    <input type="submit" value="enregistrer">


  </form>
</div>

<?php
  $this->content = ob_get_contents();
  ob_end_clean();
 ?>
