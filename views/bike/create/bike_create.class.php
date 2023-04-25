<?php

/**
 * Author: Jacob Catalan & Elissa Murphy
 * Date: 4/11/2023
 * File: bike_create.class.php
 * Description:
 */

class BikeCreate extends BikeIndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Create Bike");


        ?>
        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Add Bike</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>
    <body>
    <h2 class="new-media-title">Add a Bike</h2>
    <form class="new-media" action='<?= BASE_URL?>/bike/confirm' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
        <p><strong>Name</strong>:<br>
            <input name="name" type="text" size="100" id="name" autofocus></p>
        <p><strong>Maker</strong>:<br>
            <input name="maker" type="text" size="100" id="maker" autofocus></p>
        <p><strong>Price</strong>:<br>
            <input name="price" type="number" step="0.01" /></p>
        <p><strong>Description</strong>:<br>
            <input name="description" type="text" size="100" id="description" autofocus></p>
        <p><strong>Image URL</strong>:<br>
            <input name="image" type="text" size="100" /></p>
        <input class="submit-btn" type="submit" value="Submit" >
    </form>
    </body>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
