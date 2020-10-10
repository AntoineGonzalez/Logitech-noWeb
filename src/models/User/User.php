<?php

class User {

  private $_id;

  private $_login;

  private $_password;

  private $_status;

  private $_name;

  private $_firstname;

  private $_mail;

  private $_phone;

 /**
 * Constructeur d'un utilisateur
 */
  public function __construct($pLogin, $pPassword,$pStatus,$pName,$pFirstname,$pMail,$pPhone) {
    $this->setLogin($pLogin);
    $this->setPassword($pPassword);
    $this->setStatus($pStatus);
    $this->setName($pName);
    $this->setFirstname($pFirstname);
    $this->setMail($pMail);
    $this->setPhone($pPhone);
  }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed _id
     *
     * @return self
     */
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get the value of Login
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * Set the value of Login
     *
     * @param mixed _login
     *
     * @return self
     */
    public function setLogin($_login)
    {
        $this->_login = $_login;

        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed _password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Set the value of Status
     *
     * @param mixed _status
     *
     * @return self
     */
    public function setStatus($_status)
    {
        $this->_status = $_status;

        return $this;
    }


    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed _name
     *
     * @return self
     */
    public function setName($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get the value of Firstname
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of Firstname
     *
     * @param mixed _firstname
     *
     * @return self
     */
    public function setFirstname($_firstname)
    {
        $this->_firstname = $_firstname;

        return $this;
    }

    /**
     * Get the value of Mail
     *
     * @return mixed
     */
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * Set the value of Mail
     *
     * @param mixed _mail
     *
     * @return self
     */
    public function setMail($_mail)
    {
        $this->_mail = $_mail;

        return $this;
    }

    /**
     * Get the value of Phone
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Set the value of Phone
     *
     * @param mixed _phone
     *
     * @return self
     */
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;

        return $this;
    }

}


 ?>
