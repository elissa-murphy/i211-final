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
            $message = "An error has occurred.";
//            $this->error($message);
            return;
        }
        //display matched bikes
        $search = new BikeSearch();
        $search->display($query_terms, $bikes);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $bikes = $this->bike_model->search_bike($query_terms);

        //retrieve all bike titles and store them in an array
        $titles = array();
        if ($bikes) {
            foreach ($bikes as $bike) {
                $titles[] = $bike->getTitle();
            }
        }

        echo json_encode($bikes);
    }

    public function create() {
        $view = new BikeCreate();
        $view->display();
    }

    public function confirm() {
//        echo "confirm";
        $bikes = $this->bike_model->create_bike();
        echo $bikes;

        $view = new BikeConfirm();
        $view->display();

    }

    public function confirm_delete($id) {
//        echo "confirm";
        $bikes = $this->bike_model->delete_bike($id);
        echo $bikes;

        $view = new BikeConfirmDelete();
        $view->display();

    }

    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new BikeError();
//        //display the error page
//        $error->display($message);
//    }

}