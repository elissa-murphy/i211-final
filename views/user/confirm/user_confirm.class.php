<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class UserConfirm extends UserIndexView {
    public function display() {
        //display page header
        parent::displayHeader("Confirmation");
        ?>

        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Confirmation</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css"/>
    </head>
    <body>
    <div class="confirm-body">
        <div>
            <h3 style="text-align: center">You have successfully signed up!<h3>
        </div>
        <div>
            <a class="confirm-btn" href="<?= BASE_URL ?>/user/index">
                <div> View All Users</div>
            </a>
        </div>
    </div>
    </body>

        <?php
        //display page footer
        parent::displayFooter();
    }
}