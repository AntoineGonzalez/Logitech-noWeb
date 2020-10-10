<?php

require_once("views/MainView.php");
require_once("models/User/UserBuilder.php");
require_once("models/Product/ProductBuilder.php");

class Controller {

  private $view;
  protected $storages;
  protected $currentUserBuilder;
  protected $currentProductBuilder;

  public function __construct(MainView $view, $storages)
  {
    $this->view = $view;
    $this->storages = $storages;
    $this->currentUserBuilder = key_exists('currentUserBuilder', $_SESSION) ? $_SESSION['currentUserBuilder'] : null;
    $this->currentProductBuilder = key_exists('currentProductBuilder',$_SESSION) ? $_SESSION['currentProductBuilder'] : null;
  }

  public function __destruct() {
    $_SESSION['currentUserBuilder'] = $this->currentUserBuilder;
    $_SESSION['currentProductBuilder'] = $this->currentProductBuilder;
  }

  public function showConnection() {
    // On va créer la vue qui va permettre de se connecter
    $this->view->makeConnectionFormPage();
  }

  public function newUser() {
    /* Affichage du formulaire de création */
		if ($this->currentUserBuilder === null) {
			$this->currentUserBuilder = new UserBuilder();
		}
		$this->view->makeInscriptionFormPage($this->currentUserBuilder);
  }

  public function saveNewUser($data) {
    $this->currentUserBuilder = new UserBuilder($data);
    if ($this->currentUserBuilder->isValid()) {
      $user = new User($data["login"],$data["pass"],"user",$data["name"],$data["firstname"],$data["mail"],$data["phone"]);
      // Création de l'utilisateur en db
      $this->storages[0]->createUser($user);
      $this->currentUserBuilder = null;
      $this->view->makeUserCreatedPage();
    } else {
      $this->view->makeUserNotCreatedPage();
    }
  }

  public function connectUser($data) {
    $user = $this->storages[0]->checkLoginAndPassword($data["login"],$data["pass"]);
    if($user == null) {
      $this->view->makeUserNotConnectedPage();
    } else {
      $_SESSION['user'] = $user;
      $this->view->makeHomePage();
    }
  }


  public function logout() {
    unset($_SESSION["user"]);
    $this->view->makeHomePage();
  }

  public function newProduct(){
    if($this->currentProductBuilder === null){
      $this->currentProductBuilder = new ProductBuilder();
    }
    $categories = $this->storages[2]->findAll();
    $this->view->makeProductCreationPage($this->currentProductBuilder,$categories);
  }

  public function saveNewProduct($data,$file) {
    $this->currentProductBuilder = new ProductBuilder($data,$file);
    if($this->currentProductBuilder->isValid()) {
      $product = $this->currentProductBuilder->createProduct($this->storages[2]);
      if($product) {
        $lastId = $this->storages[1]->createProduct($product,$this->storages[1]);
        $product->setId($lastId);
        $this->currentProductBuilder = null;
        $this->view->makeProductCreated($lastId);
      } else {
        $this->view->makeProductFailedPage();
      }
    }else{
      $this->view->makeProductFailedPage();
    }
  }

  public function productPage($id) {
		/* Une couleur est demandée, on la récupère en BD */
		$product = $this->storages[1]->find($id);
    if ($product !== null) {
      $category = $this->storages[2]->find($product->getCategory());
      $user = $this->storages[0]->findById($product->getOwner());

      $session = $_SESSION['user'];

      if($user->getMail() === $session->getMail()) {
        $isOwner = true;
      } else {
        $isOwner = false;
      }
      $this->view->makeProductPage($id,$product,$user,$category,$isOwner);
    } else {
      $annonces=$this->storages[1]->findAll();
      $this->view->makeGaleryPage($annonces);
    }
	}


  public function deleteProduct($id) {

    $productStorage = $this->storages[1];

    $product = $productStorage->find($id);

    if(isset($_SESSION['user']) && $product !== null) {
      $session = $_SESSION['user'];
      if($session->getMail() === $product->getOwner()) {
        $productStorage->deleteProduct($id);
      }
    }

    $annonces = $productStorage->findAll();

    $this->view->makeGaleryPage($annonces);
  }


  public function galeryPage(){
    $annonces = $this->storages[1]->findAll();
    $this->view->makeGaleryPage($annonces);
  }

  public function isUserConnected() {
      if(key_exists('user', $_SESSION)) {
        return true;
      } else {
        return false;
      }
  }
}
