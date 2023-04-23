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
            $view = new ErrorView();
            $view->display($message);
        }else{
            // display all tires
            $view = new TireIndex();
            $view->display($tires);
        }

    }

    //show details of a tire
    public function detail($id) {
        //retrieve the specific tire
        $tire = $this->tire_model->view_tire($id);
        if (!$tire) {
            //display an error
            $message = "There was a problem displaying the tire id='" . $id . "'.";
            $view = new ErrorView();
            $view->display($message);
        }else{
            //display tire details
            $view = new TireDetail();
            $view->display($tire);
        }

    }

    //search tires
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all tires
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching tires
        $tires = $this->tire_model->search_tire($query_terms);

        if ($tires === false) {
            //handle error
            $message = "An error has occurred.";
            $view = new ErrorView();
            $view->display($message);
        }else{
            //display matched tires
            $search = new TireSearch();
            $search->display($query_terms, $tires);
        }

    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $tires = $this->tire_model->search_tire($query_terms);

        //retrieve all tire names and store them in an array
        $names = array();
        if ($tires) {
            foreach ($tires as $tire) {
                $names[] = $tire->getName();
            }
        }

        echo json_encode($names);
    }

    public function create() {
        $view = new TireCreate();
        $view->display();
    }

    public function confirm() {
//        echo "confirm";
        $tire = $this->tire_model->create_tire();
        echo $tire;
        if ($tire === false) {
            //handle error
            $message = "there has been a error";
            $view = new ErrorView();
            $view->display($message);
        }else{
            $view = new TireConfirm();
            $view->display();
        }



    }

    public function confirm_delete($id) {
//        echo "confirm";
        $bikes = $this->tire_model->delete_tire($id);
        echo $bikes;
        if ($bikes === false) {
            //handle error
            $message = "there has been some Errors";
            $view = new ErrorView();
            $view->display($message);
        }else{
            $view = new TireConfirmDelete();
            $view->display();
        }


    }

    public function add($id) {
//        echo "confirm";
        $bikes = $this->tire_model->add($id);
        echo $bikes;
        if ($bikes === false) {
            //handle error
            $message = "there has been some errors";
            $view = new ErrorView();
            $view->display($message);
        }else{
            $view = new TireConfirmDelete();
            $view->display();
        }



    }


    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new TireError();
//        //display the error page
//        $error->display($message);
//    }


}