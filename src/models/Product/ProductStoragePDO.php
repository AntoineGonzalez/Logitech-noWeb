<?php
require_once("Product.php");
require_once("ProductStorage.php");
require_once("models/Category/CategoryStorage.php");
require_once("models/Category/Category.php");
/**
 *
 */
class ProductStoragePDO implements ProductStorage
{
  private $db;

  public function __construct($pdo_db)
  {
     $this->db = $pdo_db;
  }

  public function find($id)
  {
    $sql = "SELECT product_id, product_label, product_price, product_picture, post_date,
            product_brand, product_category, product_owner, product_description
     FROM products WHERE product_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1,$id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetch();

    if(!$res)
    {
      return null;
    }
    else
    {
      $response = new Product
      (
        $res['product_label'],
        $res['product_brand'],
        $res['product_description'],
        $res['product_price'],
        $res['product_category'],
        $res['product_picture']
      );
      $response->setId($res['product_id']);
      $response->setOwner($res['product_owner']);
      $response->setDate($res['post_date']);
      return $response;
    }
  }

  public function findAll(){
    $responses= array();
    $sql = "SELECT product_id, product_label, product_price, product_picture, post_date,
            product_brand, product_category, product_owner, product_description
     FROM products";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();

    foreach($res as $ligne) {
      $response = new Product
      (
        $ligne['product_label'],
        $ligne['product_brand'],
        $ligne['product_description'],
        $ligne['product_price'],
        $ligne['product_category'],
        $ligne['product_picture']
      );
      $response->setId($ligne['product_id']);
      $response->setOwner($ligne['product_owner']);
      $response->setDate($ligne['post_date']);
      $responses[]= $response;
    }
    return $responses;
  }

  public function createProduct(Product $product) {

    $sql = "INSERT into products(product_label,product_price,product_picture,post_date,product_brand,product_category,
    product_owner,product_description) values(:label,:price,:picture,:pdate,:brand,:category,
    :owner,:description)";

    $owner = $_SESSION['user'];

    $data = array(':label' => $product->getLabel(),
                  ':price' => $product->getPrice(),
                  ':picture' => $product->getPicture(),
                  ':pdate' => time(),
                  ':brand' => $product->getBrand(),
                  ':category' => $product->getCategory(),
                  ':owner' => $owner->getMail(),
                  ':description' => $product->getDescription(),
                );


    $stmt = $this->db->prepare($sql);

    $stmt->execute($data);

    return $this->db->lastInsertId();
  }

  public function updateProduct(Product $product) {
      $sql = "UPDATE products SET product_label = :label,
      product_price = :price,
      product_picture = :picture,
      post_date = :pdate,
      product_brand = :brand,
      product_category = :category,
      product_owner = :owner,
      product_description = :description";

      $data = array(':label' => $product->getLabel(),
                    ':price' => $product->getPrice(),
                    ':picture' => $product->getPicture(),
                    ':pdate' => $product->getDate(),
                    ':brand' => $product->getBrand(),
                    ':category' => $product->getCategory(),
                    ':owner' => $owner->getMail(),
                    ':description' => $product->getDescription(),
                  );

      $stmt = $this->db->prepare($sql);

      $stmt->execute($data);
  }

  public function deleteProduct($id) {

    $sql = "DELETE from products where product_id = :id  ";

    $owner = $_SESSION['user'];

    $data = array(':id' => $id);

    $stmt = $this->db->prepare($sql);

    $stmt->execute($data);
  }


}

?>
