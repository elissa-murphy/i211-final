<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class Datatype extends Exception
{
    //constructor
    public function  __construct($in_type, $in_expected)
    {
        parent::__construct("Data type Error:<br>" . "Expected: $in_expected <br>" . "Received: $in_type");
    }

}