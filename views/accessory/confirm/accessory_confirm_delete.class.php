<?php

class AccessoryConfirmDelete extends AccessoryIndexView
{
    public function display() {
//display page header
        parent::displayHeader("Create Accessories");


        ?>
        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Delete a Accessory</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>
    <body>
    <div class="confirm-body">
        <div>
            <h3 style="text-align: center">You have successfully Deleted an accessory!<h3>
        </div>
        <div>
            <a class="confirm-btn" href="<?= BASE_URL ?>/accessory/index">
                <div> View All Accessories</div>
            </a>
        </div>
    </div>



    </body>
        <?php
        //display page footer
        parent::displayFooter();
    }
}