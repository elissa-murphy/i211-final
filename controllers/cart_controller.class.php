<?php

/**
 * Author: your name
 * Date: 4/20/2023
 * File: cart_controller.class.php
 * Description:
 */

class CartController{
    private $bike_model;
    private $tire_model;
    private $accesory_model;

    public function __construct() {
        //create an instance of the BikeModel class
        $this->bike_model = BikeModel::getBikeModel();
        $this->tire_model = TireModel::getTireModel();
        $this->accesory_model = AccessoryModel::getAccessoryModel();
    }
    public function index(){
        $bike = $this->bike_model->shopping_cartB();
        $tire = $this->tire_model->shopping_cartT();
        $accesory = $this->accesory_model->shopping_cartA();
        $view = new CartIndexView();
        $view->display($bike, $tire, $accesory);
    }

}