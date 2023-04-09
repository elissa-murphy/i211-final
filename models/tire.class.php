<?php

class Tire
{
    private $id, $maker, $name, $description, $price, $rating;

    //the constructor
    public function __construct($maker, $name, $description, $price, $rating) {
        $this->maker = $maker;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->rating = $rating;
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

    public function getRating() {
        return $this->rating;
    }

    //set tire id
    public function setId($id) {
        $this->id = $id;
    }


}