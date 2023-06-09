<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

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
            $view = new ErrorView();
            $view->display($message);
        }else{
            // display all users
            $view = new UserIndex();
            $view->display($users);
        }
    }

    //create function - displays form to add a user
    public function create() {
        $view = new UserCreate();
        $view->display();
    }

    //confirm function - displays confirmation message that user was added
    public function confirm() {
        $users = $this->user_model->create_user();
        echo $users;
        if ($users === false) {
            //handle error
            $message = "there has been a error";
            $view = new ErrorView();
            $view->display($message);
        }else{
            $view = new UserConfirm();
            $view->display();
        }
    }
}