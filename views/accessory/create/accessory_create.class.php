<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class AccessoryCreate extends AccessoryIndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Create Accessories");


        ?>
        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Add Accessory</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>
    <body>
    <h2 class="new-media-title">Add an Accessory</h2>
    <form class="new-media" action='<?= BASE_URL?>/accessory/confirm' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
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
