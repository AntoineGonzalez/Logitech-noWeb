<?php

class Category  {

  private $_id;

  private $_libelle_cat;

  function __construct($pId,$pLibelle_cat) {

    $this->_id = $pId;

    $this->_libelle_cat = $pLibelle_cat;

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
     * Get the value of Libelle Cat
     *
     * @return mixed
     */
    public function getLibelleCat()
    {
        return $this->_libelle_cat;
    }

    /**
     * Set the value of Libelle Cat
     *
     * @param mixed _libelle_cat
     *
     * @return self
     */
    public function setLibelleCat($_libelle_cat)
    {
        $this->_libelle_cat = $_libelle_cat;

        return $this;
    }

}

?>
