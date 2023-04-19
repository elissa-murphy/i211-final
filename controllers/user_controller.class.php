<?php

class UserController
{
    private $user_model;

    //default constructor
    public function __construct() {
        //create an instance of the UserModel class
        $this->user_model = UserModel::getUserModel();
    }

    //index action that displays all users
    public function index() {
        //retrieve all users and store them in an array
        $users = $this->user_model->display_user();
        if (!$users) {
            //display an error
            $message = "There was a problem displaying users.";
            $this->error($message);
            return;
        }
        // display all users
        $view = new UserIndex();
        $view->display($users);
    }

    public function create() {
        $view = new UserCreate();
        $view->display();
    }

    public function confirm() {
        $users = $this->user_model->create_user();
        echo $users;

        $view = new UserConfirm();
        $view->display();

    }


    //handle an error
//    public function error($message) {
//        //create an object of the Error class
//        $error = new AccessoryError();
//        //display the error page
//        $error->display($message);
//    }

}