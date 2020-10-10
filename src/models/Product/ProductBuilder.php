<?php
  require_once("models/Product/Product.php");

  class ProductBuilder {

    protected $data;

    protected $file;

    protected $errors;

    public function __construct($data = null,$file = null) {
      if($data === null || $file === null) {
        $data = array(
          "label" => "",
          "date" => "",
          "brand" => "",
          "description" => "",
          "price" => "",
          "picture" => "",
          "category" => ""
        );
      }
      $this->data = $data;
      $this->file = $file;
      $this->errors = array();
    }


    public function createProduct($categoryStorage){
        //Move du fichier
        $nom = md5(uniqid(rand(), true));

        $location = "./upload/".$nom;

        $resultat = move_uploaded_file($_FILES['picture']['tmp_name'],$location);

        $cat = $categoryStorage->findByLibelle($this->data["category"]);

        if ($resultat) {
          return new Product(
            $this->data["label"],
            $this->data["brand"],
            $this->data["description"],
            $this->data["price"],
            $cat->getId(),
            $location
          );
        } else {
          return null;
        }
    }

    public function isValid() {
      $this->errors = array();
      if(!key_exists("label", $this->data) || $this->data['label'] === ""){
        $this->errors["label"] ="*Vous devez saisir un label produit.";
      }

      if(!key_exists("brand", $this->data) || $this->data['brand'] === ""){
        $this->errors["brand"] ="*Vous devez saisir une marque.";
      }

      if(!key_exists("category", $this->data) || $this->data['category'] === ""){
        $this->errors["category"] ="*Vous devez saisir une categorie pour votre produit.";
      }

      if(!key_exists("description", $this->data) || $this->data['description'] === ""){
        $this->errors["description"] ="*Veuillez saisir une description de votre produit.";
      }

      if(!key_exists("price", $this->data) || $this->data['price'] === ""){
        $this->errors["price"] ="*Vous n'avez pas indiquer de prix pour cette annonce.";
      }
      if(key_exists("picture",$this->file)) {
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        // Verification des extensions
        $extension_upload = strtolower(substr(strrchr($this->file['picture']['name'], '.')  ,1));
        // Si l'extension est valide c'est ok
        if (!in_array($extension_upload,$extensions_valides)) {
          $this->errors["picture"] ="*L'extension n'est pas valide.";
        }
      }
      return count($this->errors) === 0;
    }

    public function getData($ref) {
      return key_exists($ref, $this->data)? $this->data[$ref]: '';
    }

    public function getErrors($ref) {
      return key_exists($ref, $this->errors)? $this->errors[$ref]: null;
    }

    public function getLabelRef() {
  		return "label";
  	}

    public function getPriceRef() {
  		return "price";
  	}

    public function getBrandRef() {
      return "brand";
    }

    public function getCategoryRef() {
      return "category";
    }

    public function getDescriptionRef() {
      return "description";
    }

    public function getPictureRef() {
      return "picture";
    }

  }
?>
