<?php

class AccessoryController
{
    private $accessory_model;

    //default constructor
    public function __construct() {
        //create an instance of the AccessoryModel class
        $this->accessory_model = AccessoryModel::getAccessoryModel();
    }

    //index action that displays all accessories
    public function index() {
        //retrieve all accessories and store them in an array
        $accessories = $this->accessory_model->display_accessory();
        if (!$accessories) {
            //display an error
            $message = "There was a problem displaying accessories.";
            $this->error($message);
            return;
        }
        // display all accessories
        $view = new AccessoryIndex();
        $view->display($accessories);
    }

    //show details of a accessory
    public function detail($id) {
        //retrieve the specific accessory
        $accessory = $this->accessory_model->view_accessory($id);
        if (!$accessory) {
            //display an error
            $message = "There was a problem displaying the accessory id='" . $id . "'.";
            $this->error($message);
            return;
        }
        //display accessory details
        $view = new AccessoryDetail();
        $view->display($accessory);
    }

    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new AccessoryError();
//        //display the error page
//        $error->display($message);
//    }

}