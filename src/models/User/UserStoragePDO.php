<?php

require_once("UserStorage.php");

class UserStoragePDO implements UserStorage {

  private $db;

  public function __construct($pdo_db)
  {
     $this->db = $pdo_db;
  }

  /**
  * Retourne l'utilisateur qui possede l'id en parametre
  */
  public function find($login) : User
  {
    $sql = "SELECT user_login, user_password, user_status FROM users WHERE user_login = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1,$login, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetch();

    if(!$res)
    {
      return null;
    } else
    {
      return new User($res['login'],$res['password'],$res['status']);
    }
  }

  public function findById($id) : User
  {
    $sql = "SELECT user_login, user_password, user_status, user_name, user_firstname, user_phone, user_mail FROM users WHERE user_mail = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1,$id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetch();

    if(!$res)
    {
      return null;
    }
    else
    {
      return new User
      (
        $res['user_login'],
        $res['user_password'],
        $res['user_status'],
        $res['user_name'],
        $res['user_firstname'],
        $res['user_mail'],
        $res['user_phone']
      );
    }
  }

  /**
  * Retourne tous les utilisateurs
  */
  public function findAll()
  {
    $users = array();
    $sql = "SELECT user_id , user_login , user_password , user_status FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while (($row= $stmt->fetch()))
    {
      $users[$row->id] = new User($row->id,$row->login,$row->password,$row->status);
    }
    return $users;
  }

  /**
  * Enregistre un utilisateur dans la base de données
  */
  public function createUser(User $user)
  {
    $sql = "INSERT  INTO users(user_login,user_password,user_status,user_name,user_firstname,user_mail,user_phone) VALUES
    (:login, :password, :status, :name, :firstname, :mail, :phone)";
    $stmt = $this->db->prepare($sql);

    /* Hachage du mot de passe de l'utilisateur avec l'algorithme bcrypt */
    $hashed_password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    $data = array(':login' => $user->getLogin(),
                  ':password' => $hashed_password,
                  ':status' => $user->getStatus(),
                  ':name' => $user->getName(),
                  ':firstname' => $user->getFirstName(),
                  ':mail' => $user->getMail(),
                  ':phone' => $user->getPhone()
                );
    $stmt->execute($data);
    return $this->db->lastInsertId();
  }

  /**
  * Supprime un utilisateur de la base de donnees
  */
  public function deleteUser($id)
  {
    /* Si l'utilisateur existe */
    if($this->find($id) != null)
    {
      $sql = "DELETE FROM users WHERE user_id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $res = $stmt->fetch();
    }
  }

  /**
  * Modifie un utilisateur dans la base de donnees
  */
  public function updateUser(User $user)
  {
    $sql = "UPDATE users set user_login = ?, user_password = ?, user_status = ? where user_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1,$user->getId(), PDO::PARAM_INT);
    $stmt->bindValue(2,password_hash($user->getPassword(),PASSWORD_DEFAULT), PDO::PARAM_INT);
    $stmt->bindValue(3,$user->getStatus(), PDO::PARAM_INT);
    $stmt->bindValue(4,$user->getId(), PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetch();
  }

  public function checkLoginAndPassword($login, $password)
  {
    $sql = "SELECT * from users where user_mail = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1,$login);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetch();
    if (password_verify($password, $res['user_password'])) {
        return new User($res['user_login'],$res['user_password'],"user",$res['user_name'],$res['user_firstname'],$res['user_mail'],$res['user_phone']);
    } else {
        return null;
    }
  }

}

?>
