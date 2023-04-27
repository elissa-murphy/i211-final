<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

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
            $view = new ErrorView();
            $view->display($message);

        }else{
            // display all accessories
            $view = new AccessoryIndex();
            $view->display($accessories);
        }

    }

    //show details of a accessory
    public function detail($id) {
        //retrieve the specific accessory
        $accessory = $this->accessory_model->view_accessory($id);
        if (!$accessory) {
            //display an error
            $message = "There was a problem displaying the accessory id='" . $id . "'.";
            $view = new ErrorView();
            $view->display($message);
        }else{
            //display accessory details
            $view = new AccessoryDetail();
            $view->display($accessory);
        }


    }

    //search accessories
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all accessories
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching accessories
        $accessories = $this->accessory_model->search_accessory($query_terms);

        if ($accessories === false) {
            //handle error
            $message = "An error has occurred.";
            $view = new ErrorView();
            $view->display($message);
        }else {
            //display matched accessories
            $search = new AccessorySearch();
            $search->display($query_terms, $accessories);
        }

    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $accessories = $this->accessory_model->search_accessory($query_terms);

        //retrieve all accessory names and store them in an array
        $names = array();
        if ($accessories) {
            foreach ($accessories as $accessory) {
                $names[] = $accessory->getName();
            }
        }
        if ($accessories === false) {
            //handle error
            $message = "there has been a error";
            $view = new ErrorView();
            $view->display($message);
        }

        echo json_encode($names);
    }

    public function create() {
        $view = new AccessoryCreate();
        $view->display();
    }

    public function confirm_delete($id) {
        $accessories = $this->accessory_model->delete_accessory($id);
        echo $accessories;

        $view = new AccessoryConfirmDelete();
        $view->display();
    }


    public function confirm() {
        $accessories = $this->accessory_model->create_accessory();
        echo $accessories;


        $view = new AccessoryConfirm();
        $view->display();
    }

}