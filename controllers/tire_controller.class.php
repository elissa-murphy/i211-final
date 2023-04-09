<?php

class TireController
{

    private $tire_model;

    //default constructor
    public function __construct() {
        //create an instance of the TireModel class
        $this->tire_model = TireModel::getTireModel();
    }

    //index action that displays all tires
    public function index() {
        //retrieve all tires and store them in an array
        $tires = $this->tire_model->display_tire();
        if (!$tires) {
            //display an error
            $message = "There was a problem displaying tires.";
            $this->error($message);
            return;
        }
        // display all tires
        $view = new TireIndex();
        $view->display($tires);
    }

    //show details of a tire
    public function detail($id) {
        //retrieve the specific tire
        $tire = $this->tire_model->view_tire($id);
        if (!$tire) {
            //display an error
            $message = "There was a problem displaying the tire id='" . $id . "'.";
            $this->error($message);
            return;
        }
        //display tire details
        $view = new TireDetail();
        $view->display($tire);
    }

    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new TireError();
//        //display the error page
//        $error->display($message);
//    }


}