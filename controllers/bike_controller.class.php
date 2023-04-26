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
            $view = new ErrorView();
            $view->display($message);
        }else{
            $view = new BikeIndex();
            $view->display($bikes);
        }
        // display all bikes

    }

    //show details of a bike
    public function detail($id) {
        //retrieve the specific bike
        $bike = $this->bike_model->view_bike($id);
        if (!$bike) {
            //display an error
            $message = "There was a problem displaying the bike id='" . $id . "'.";
            $view = new ErrorView();
            $view->display($message);
        }else{
            //display bike details
            $view = new BikeDetail();
            $view->display($bike);
        }


    }

    //search bikes
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all bikes
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching bikes
        $bikes = $this->bike_model->search_bike($query_terms);

        if ($bikes === false) {
            //handle error
            $message = "there has been a error";
            $view = new ErrorView();
            $view->display($message);
        }else{
            //display matched bikes
            $search = new BikeSearch();
            $search->display($query_terms, $bikes);
        }

    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $bikes = $this->bike_model->search_bike($query_terms);

        //retrieve all bike names and store them in an array
        $names = array();
        if ($bikes) {
            foreach ($bikes as $bike) {
                $names[] = $bike->getName();
            }
        }

        echo json_encode($names);
    }

    public function create() {
        $view = new BikeCreate();
        $view->display();
    }

    public function confirm() {
        $bikes = $this->bike_model->create_bike();
        echo $bikes;

        $view = new BikeConfirm();
        $view->display();

    }

    public function confirm_delete($id) {
        $bikes = $this->bike_model->delete_bike($id);
        echo $bikes;

        $view = new BikeConfirmDelete();
        $view->display();

    }


    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}