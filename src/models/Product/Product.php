<?php

  class Product  {

    private $_id;

    private $_label;

    private $_date;

    private $_brand;

    private $_description;

    private $_price;

    private $_picture;

    private $_owner;

    private $_category;


    function __construct($Plabel,$Pbrand,$Pdescription,$Pprice,$Pcategory,$Ppicture) {
      $this->setLabel($Plabel);
      $this->setBrand($Pbrand);
      $this->setDescription($Pdescription);
      $this->setPrice($Pprice);
      $this->setCategory($Pcategory);
      $this->setPicture($Ppicture);
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
     * Get the value of Label
     *
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * Set the value of Label
     *
     * @param mixed _label
     *
     * @return self
     */
    public function setLabel($_label)
    {
        $this->_label = $_label;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed _date
     *
     * @return self
     */
    public function setDate($_date)
    {
        $this->_date = $_date;

        return $this;
    }

    /**
     * Get the value of Brand
     *
     * @return mixed
     */
    public function getBrand()
    {
        return $this->_brand;
    }

    /**
     * Set the value of Brand
     *
     * @param mixed _brand
     *
     * @return self
     */
    public function setBrand($_brand)
    {
        $this->_brand = $_brand;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed _description
     *
     * @return self
     */
    public function setDescription($_description)
    {
        $this->_description = $_description;

        return $this;
    }

    /**
     * Get the value of Price
     *
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * Set the value of Price
     *
     * @param mixed _price
     *
     * @return self
     */
    public function setPrice($_price)
    {
        $this->_price = $_price;

        return $this;
    }

    /**
     * Get the value of Picture
     *
     * @return mixed
     */
    public function getPicture()
    {
        return $this->_picture;
    }

    /**
     * Set the value of Picture
     *
     * @param mixed _picture
     *
     * @return self
     */
    public function setPicture($_picture)
    {
        $this->_picture = $_picture;

        return $this;
    }

    /**
     * Get the value of Category
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * Set the value of Category
     *
     * @param mixed _category
     *
     * @return self
     */
    public function setCategory($_category)
    {
        $this->_category = $_category;

        return $this;
    }

    /**
     * Add picture to the list: pictures.
     *
     * @param mixed _picture_url
     *
     */

    /**
     * Get the value of Owner
     *
     * @return mixed
     */
    public function getOwner()
    {
        return $this->_owner;
    }

    /**
     * Set the value of Owner
     *
     * @param mixed _owner
     *
     * @return self
     */
    public function setOwner($_owner)
    {
        $this->_owner = $_owner;

        return $this;
    }

}


?>
