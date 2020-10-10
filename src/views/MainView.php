<?php

class MainView
{
  protected $router;
	protected $stylesheets;
	protected $title;
	protected $content;

  public function __construct(Router $router, $feedback)
  {
    $this->feedback = $feedback;
		$this->router = $router;
    $this->title = null;
    $this->content = null;
    $this->stylesheets = array();
  }

  // Fonction qui va créer et afficher le formulaire de connexion
  public function makeConnexionFormPage()
  {
    $this->title = "Connexion";
    /* Attribution de la feuille de style relative a la page de connexion */
    $this->stylesheets = array("form","navbar_footer","base");
    /* Inclusion du fichier qui va stocker le formulaire dans content */
    require_once("connection.php");
  }

  public function makeInscriptionFormPage(UserBuilder $builder)
  {
    $this->title = "Inscription";
    /* Attribution de la feuille de style relative a la page de connexion */
    $this->stylesheets = array("form","navbar_footer","base");
    /* Inclusion du fichier qui va stocker le formulaire dans content */
    require_once("inscription.php");
  }

  public function makeProductCreationPage(ProductBuilder $builder,$categories){
    $this->title = "Creation nouvelle annonce:";

    $this->stylesheets = array("base","navbar_footer","form",);

    require_once("form_product.php");
  }

  public function makeProposPage() {
    $this->title = " A propos de nous !";
    $this->stylesheets = array("apropos","navbar_footer");
    require_once("apropos.php");
  }

  public function makeUnderconstructPage() {
    $this->title = " Site en construction ! Merci de patienter ou de contacter le support :p";

    $this->stylesheets = array("underconstruct","base","navbar_footer");
  }

  public function makeUserNotConnectedPage() {
    $this->router->POSTredirect($this->router->getConnectionPage(),"Erreur de connexion");
  }

  public function makeUserNeedsConnectedPage() {
    $this->router->POSTredirect($this->router->getConnectionPage(),"Vous devez être connecté pour accéder à cette page");
  }

  public function makeProductCreated($id) {
    $this->router->POSTredirect($this->router->getProductPage($id),"Erreur de connexion");
  }

  public function makeProductUpdatePage($id,Product $product,User $user,$category) {
    $this->title = "Fiche Détaillé de l'annonce:";
    $this->stylesheets = array("base","navbar_footer","product");
    require_once("template_product.php");
  }

  public function makeProductPage($id,Product $product,User $user,$category,$isOwner){
   $this->title = "Fiche Détaillé de l'annonce:";
   $this->stylesheets = array("base","navbar_footer","product");
   require_once("template_product.php");
 }

 public function makeGaleryPage($annonces){
  $this->title ="Toutes nos annonces";
  $this->stylesheets = array("galery","navbar_footer","base");
  require_once("template_galery.php");
}


 public function makeProductFailedPage(){
   $this->router->POSTredirect($this->router->getCreateProductPage(), "Un ou plusieurs champs sont manquants ou éronnés");
 }

  public function render()
  {
    require_once("template_base.php");
  }

  public function makeHomePage()
  {
    $this->title = "Home";

    $this->stylesheets = array("home","navbar_footer");
  }

  public function makeUserNotCreatedPage() {
    $this->router->POSTredirect($this->router->getRegisterPage(), "*Un ou plusieurs champs sont manquants ou erronés");
  }

  public function makeUserCreatedPage() {
    $this->router->POSTredirect($this->router->getConnectionPage(), "Bienvenue parmis nous !");
  }

  public function makeContactFormPage() {
    $this->title = "Formulaire de contact";

    $this->stylesheets = array("form","navbar_footer","base");

    require_once("contact.php");
  }

  /* Une fonction pour échapper les caractères spéciaux de HTML,
	* car celle de PHP nécessite trop d'options. */
	public static function htmlesc($str) {
		return htmlspecialchars($str,
			/* on échappe guillemets _et_ apostrophes : */
			ENT_QUOTES
			/* les séquences UTF-8 invalides sont
			* remplacées par le caractère �
			* au lieu de renvoyer la chaîne vide…) */
			| ENT_SUBSTITUTE
			/* on utilise les entités HTML5 (en particulier &apos;) */
			| ENT_HTML5,
			'UTF-8');
	}
}

?>
