<?php

require_once("views/MainView.php");
require_once("controllers/Controller.php");

class Router
{
  private $storages;

  public function __construct($storages) {
    $this->storages= $storages;
	}

  public function main()
  {
    session_start();

    $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
		$_SESSION['feedback'] = '';

    $view = new MainView($this,$feedback);
    $controller = new Controller($view,$this->storages);

    /* Analyse de l'URL */
    $productid = key_exists('product',$_GET) ? $_GET['product']: null;
    $deletedId = key_exists('delete',$_GET) ? $_GET['delete']: null;
    $action = key_exists('action', $_GET) ? $_GET['action'] : null;
    if ($action === null) {
      if($productid !== null) {
          $action = "voir";
      } else if($deletedId !== null) {
          $action = "delete";
      } else {
        $action = "home";
      }
		}

    /* On va tester toutes les routes */
    try {
      switch($action) {
        case "home":
          $view->makeHomePage();
          break;
        case "connexion":
          $view->makeConnexionFormPage();
          break;
        case "inscription":
          $controller->newUser();
          break;
        case "saveuser":
          $controller->saveNewUser($_POST);
          break;
        case "createproduct":
          if($controller->isUserConnected()){
            $controller->newProduct();
          } else {
            $view->makeUserNeedsConnectedPage();
          }
          break;
        case "saveproduct":
          if($controller->isUserConnected()){
            $controller->saveNewProduct($_POST,$_FILES);
          } else {
            $view->makeUserNeedsConnectedPage();
          }
          break;
        case "connectuser":
            $controller->connectUser($_POST);

          break;
        case "logout":
          $controller->logout();
          break;
        case "contact":
          $view->makeContactFormPage();
          break;
        case "voir":
          if($controller->isUserConnected()){
            $controller->productPage($productid);
          } else {
            $view->makeUserNeedsConnectedPage();
          }
          break;
        case "galery":
          $controller->galeryPage();
          break;
        case "delete":
          if($controller->isUserConnected()){
            $controller->deleteProduct($deletedId);
            } else {
              $view->makeUserNeedsConnectedPage();
            }
          break;
        case "propos":
          $view->makeProposPage();
        break;
        case "underconstruct":
          $view->makeUnderconstructPage();
        break;
      }
    }	catch (Exception $e) {
  			echo "error";
  		}

    $view->render();
  }

  public function homePage() {
    return ".";
  }

  public function getConnectionPage() {
    return "./connexion";
  }

  public function getCheckConnection() {
    return ".?action=connectuser";
  }

  public function getHomePage() {
    return "./home";
  }

  public function getRegisterPage() {
    return "./inscription";
  }


  public function registerUser() {
    return ".?action=saveuser";
  }

  public function registerProduct(){
    return ".?action=saveproduct";
  }

  public function getLogout() {
    return ".?action=logout";
  }

 public function getCreateProductPage(){
   return "./creation";
 }

 public function getProductPage($id){
   return "./product-$id";
 }

 public function getGaleryPage(){
   return "./galery";
 }

 public function getDeleteProduct($id) {
   return "./delete-$id";
 }

 public function getUpdateProduct($id) {
   return "./update-$id";
 }

  /* Fonction pour le POST-redirect-GET,
   * destinée à prendre des URL du routeur
   * (dont il faut décoder les entités HTML) */
  public function POSTredirect($url, $feedback) {
    $_SESSION['feedback'] = $feedback;
    header("Location: ".htmlspecialchars_decode($url), true, 303);
    die;
  }

 }

 ?>
