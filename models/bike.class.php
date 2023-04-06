<?php

class Bike {

    private $id, $maker, $name, $description, $price;

    //the constructor
    public function __construct($maker, $name, $description, $price) {
        $this->maker = $maker;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    //getters
    public function getId() {
        return $this->id;
    }

    public function getMaker() {
        return $this->maker;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    //set bike id
    public function setId($id) {
        $this->id = $id;
    }
}