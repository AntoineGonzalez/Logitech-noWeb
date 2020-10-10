<?php
require_once("Category.php");
require_once("CategoryStorage.php");

/**
 *
 */
 class CategoryStoragePDO implements CategoryStorage{
   private $db;

   public function __construct($pdo_db)
   {
      $this->db = $pdo_db;
   }

   public function find($id)
   {
     $sql = "SELECT category_id,category_libelle FROM categories WHERE category_id = ?";
     $stmt = $this->db->prepare($sql);
     $stmt->bindValue(1,$id, PDO::PARAM_INT);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $res = $stmt->fetch();
     if($res == null) {
       return null;
     } else {
       return new Category($res["category_id"],$res["category_libelle"]);
     }
   }

   public function findByLibelle($libelle) {
     $sql = "SELECT * FROM categories WHERE category_libelle = ?";
     $stmt = $this->db->prepare($sql);
     $stmt->bindValue(1,$libelle, PDO::PARAM_INT);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $res = $stmt->fetch();
     if($res == null) {
       return null;
     } else {
       return new Category($res["category_id"],$res["category_libelle"]);
     }
   }

   public function findAll() {
     $sql = "SELECT category_libelle FROM categories";
     $stmt = $this->db->prepare($sql);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     return $stmt->fetchAll();
   }

 }
