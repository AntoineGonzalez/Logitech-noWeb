<?php

require_once("models/User/User.php");

class UserBuilder {

  protected $data;

  protected $errors;

  public function __construct($data = null) {
    if ($data === null) {
			$data = array(
				"login" => "",

				"password" => "",

        "status" => "",

        "passwordconf" => "",

        "name" => "",

        "firstname" => "",

        "mail" => "",

        "phone" => "",
			);
    }
    $this->data = $data;
    $this->errors = array();
}

  public static function buildFromUser(User $user) {
		return new UserBuilder(array(
			"login" => $user->getLogin(),
			"password" => $user->getPassword(),
      "status" => $user->getStatus(),
      "name" => $user->getName(),
      "firstname" => $user->getFirstName(),
      "mail" => $user->getMail(),
      "phone" => $user->getPhone(),
		));
	}

  public function isValid() {
    $this->errors = array();
    if (!key_exists("login", $this->data) || $this->data["login"] === "") {
      $this->errors["login"] = "*Vous devez entrer un nom d'utilisateur";
    }
    if (!key_exists("pass", $this->data) || $this->data["pass"] === "") {
      $this->errors["pass"] = "*Vous devez entrer un mot de passe";
    } else {
      if (!key_exists("passconf", $this->data) || $this->data["passconf"] === "") {
        $this->errors["passconf"] = "*Vous devez confirmer votre mot de passe";
      } else {
        if($this->data["pass"] !== $this->data["passconf"]) {
          $this->errors["passconf"] = "*Les mots de passes ne correspondent pas";
        }
      }
    }
    if (!key_exists("name", $this->data) || $this->data["name"] === "") {
      $this->errors["name"] = "*Vous devez entrer votre nom";
    }
    if (!key_exists("firstname", $this->data) || $this->data["firstname"] === "") {
      $this->errors["firstname"] = "*Vous devez entrer votre prenom";
    }
    if (!key_exists("mail", $this->data) || $this->data["mail"] === "") {
      $this->errors["mail"] = "*Vous devez entrer une adresse mail";
    }
    if (!key_exists("phone", $this->data) || $this->data["phone"] === "") {
      $this->errors["phone"] = "*Vous devez entrer votre numéro de téléphone";
    }
    return count($this->errors) === 0;
  }

  /* Renvoie la valeur d'un champ en fonction de la référence passée en argument. */
	public function getData($ref) {
		return key_exists($ref, $this->data)? $this->data[$ref]: '';
	}

	/* Renvoie les erreurs associées au champ de la référence passée en argument,
 	 * ou null s'il n'y a pas d'erreur.
 	 * Nécessite d'avoir appelé isValid() auparavant. */
	public function getErrors($ref) {
		return key_exists($ref, $this->errors)? $this->errors[$ref]: null;
	}

	/* Crée une nouvelle instance de Color avec les données
	 * fournies. Si toutes ne sont pas présentes, une exception
	 * est lancée. */
	public function createUser() {
		if (!key_exists("name", $this->data) || !key_exists("hex", $this->data))
			throw new Exception("Missing fields for color creation");
		return new Color($this->data["name"], $this->data["hex"]);
	}

  /* Renvoie la «référence» du champ représentant le login. */
	public function getLoginRef() {
		return "login";
	}

  public function getPassRef() {
		return "pass";
	}

  public function getPassConfRef() {
		return "passconf";
	}

  public function getNameRef() {
		return "name";
	}

  public function getFirstnameRef() {
		return "firstname";
	}

	/* Renvoie la «référence» du champ représentant le mot de passe. */
	public function getMailRef() {
		return "mail";
	}

  public function getPhoneRef() {
		return "phone";
	}
}
