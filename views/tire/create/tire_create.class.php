<?php

/**
 * Author: Jacob Catalan & Elissa Murphy
 * Date: 4/11/2023
 * File: bike_create.class.php
 * Description:
 */

class TireCreate extends TireIndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Create Tires");


        ?>
        <!DOCTYPE "HTML">
        <html>
    <head>
        <title>Create Tire</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>
    <body>
    <h2>Create a Accessory</h2>
    <form class="new-media" action='<?= BASE_URL?>/tire/confirm' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
        <p><strong>Name</strong><br>
            <input name="name" type="text" size="100" id="name" required autofocus></p>
        <p><strong>Maker</strong><br>
            <input name="maker" type="text" size="100" id="maker" required autofocus></p>
        <p><strong>Price</strong>:
            <input name="price" type="number" step="0.01" required /></p>
        <p><strong>Description</strong><br>
            <input name="description" type="text" size="100" id="description" required autofocus></p>
        <p><strong>Image</strong><br>
            <input name="image" type="text" size="100" required /></p>
        <p><strong>Rating</strong><br>
            <input name="rating" type="number" size="100" required /></p>
        <input type="submit" value="Submit" >
    </form>
    </body>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
