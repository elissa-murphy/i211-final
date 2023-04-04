<?php

class BikeController
{

    private $bike_model;

    //default constructor
    public function __construct() {
        //create an instance of the BikeModel class
        $this->bike_model = BikeModel::getBikeModel();
    }

    //index action that displays all bikes
    public function index() {
        //retrieve all movies and store them in an array
        $movies = $this->bike_model->list_bike();
        if (!$bikes) {
            //display an error
            $message = "There was a problem displaying bikes.";
            $this->error($message);
            return;
        }
        // display all movies
        $view = new BikeIndex();
        $view->display($bikes);
    }

}