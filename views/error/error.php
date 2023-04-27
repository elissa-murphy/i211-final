<?php
/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */


?>

<?php

class ErrorView extends IndexView
{

    public function display($message)
    {
        //display page header
        parent::displayHeader("Error");
        ?>
        <div class="errorContainer">
            <div>
                <img src='<?= BASE_URL ?>/www/img/error.png' style="width: 80px; border: none"/>
            </div>
            <div>
                <h2> An Error has Occurred.</h2>
                <div style="color: red">
                    <?= urldecode($message)
                    ?>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <a class="backBtn" href="<?= BASE_URL ?>/welcome/index">Back to Home</a>
        <br><br><br><br>
        <?php
        //display page footer
        parent::displayFooter();
    }
}