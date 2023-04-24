<?php

class TireConfirmDelete extends BikeIndexView
{
    public function display() {
//display page header
        parent::displayHeader("Delete Bike");


        ?>
        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Delete a Bike</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>
    <body>
    <div class="confirm-body">
        <div>
            <h3 style="text-align: center">You have successfully deleted a bike!<h3>
        </div>
        <div>
            <a class="confirm-btn" href="<?= BASE_URL ?>/bike/index">
                <div> View All Bikes</div>
            </a>
        </div>
    </div>



    </body>
        <?php
        //display page footer
        parent::displayFooter();
    }
}