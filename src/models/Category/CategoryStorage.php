<?php
require_once("Category.php");

interface CategoryStorage {

  //public function createProduct(Product $product);

  public function find($id);

  public function findAll();

  //public function updateProduct(Product $product);

  //public function deleteProduct($id);

  //public function deleteAll();

}

?>
