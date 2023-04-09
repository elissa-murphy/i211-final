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
        //retrieve all bikes and store them in an array
        $bikes = $this->bike_model->display_bike();
        if (!$bikes) {
            //display an error
            $message = "There was a problem displaying bikes.";
            $this->error($message);
            return;
        }
        // display all bikes
        $view = new BikeIndex();
        $view->display($bikes);
    }

    //show details of a bike
    public function detail($id) {
        //retrieve the specific bike
        $bike = $this->bike_model->view_bike($id);
        if (!$bike) {
            //display an error
            $message = "There was a problem displaying the bike id='" . $id . "'.";
            $this->error($message);
            return;
        }
        //display bike details
        $view = new BikeDetail();
        $view->display($bike);
    }

    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new BikeError();
//        //display the error page
//        $error->display($message);
//    }

}