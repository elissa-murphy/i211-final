<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class BikeConfirm extends BikeIndexView
{
public function display() {
//display page header
parent::displayHeader("Create Bike");


?>
<!DOCTYPE "HTML">
<html>
<head>
    <title>Add a Bike</title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
</head>
<body>
<div class="confirm-body">
    <div>
        <h3 style="text-align: center; margin: 0 auto;">You have successfully added a bike!<h3>
    </div>
    <div>
        <a class="confirm-btn" href="<?= BASE_URL ?>/bike/index">
            <div> View All Bikes</div>
        </a>
    </div>
</div>

<a style="color: white;" href="<?= BASE_URL ?>/bike/index">
    <div> View Bikes</div>
</a>
</body>
    <?php
    //display page footer
    parent::displayFooter();
}
}