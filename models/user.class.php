<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class User
{
    private $id, $firstName, $lastName, $email;

    //the constructor
    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    //getters
    public function getId() {
        return $this->id;
    }

    public function getfirstName() {
        return $this->firstName;
    }

    public function getlastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    //set user id
    public function setId($id) {
        $this->id = $id;
    }
}