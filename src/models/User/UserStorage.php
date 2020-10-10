<?php
require_once("User.php");

interface UserStorage {

  public function createUser(User $user);

  public function find($id);

  public function findAll();

  public function updateUser(User $c);

  public function deleteUser($id);

}

?>
