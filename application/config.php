<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */


//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/I211/final/i211-final");


/*************************************************************************************
 *                       settings for bikes                                         *
 ************************************************************************************/


//define default path for media images
define("BIKE_IMG", "www/img/bikes/");
define("ACCESSORY_IMG", "www/img/accessories/");
define("TIRE_IMG", "www/img/tires/");