<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class AccessorySearch extends AccessoryIndexView
{
    public function display($terms, $accessories)
    {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo((!is_array($accessories)) ? "( 0 - 0 )" : "( 1 - " . count($accessories) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($accessories === 0) {
                echo "No accessory was found.<br><br><br><br><br>";
            } else {
                //display accessories in a grid; six accessories per row
                foreach ($accessories as $i => $accessory) {
                    $id = $accessory->getId();
                    $name = $accessory->getName();
                    $price = $accessory->getPrice();
                    $image = $accessory->getImage();

                    if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . ACCESSORY_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding-bottom: 100px; flex-direction: row'><p><a href='", BASE_URL, "/accessory/detail/$id'><img src='" . $image .
                        "' style='width: 200px;height: 150px;display: block;'><span>$name</a><br>" . $price . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($accessories) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/accessory/index">Go to Accessory List</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}