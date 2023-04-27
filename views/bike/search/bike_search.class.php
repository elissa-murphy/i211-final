<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class BikeSearch extends BikeIndexView
{
    public function display($terms, $bikes) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($bikes)) ? "( 0 - 0 )" : "( 1 - " . count($bikes) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($bikes === 0) {
                echo "No bike was found.<br><br><br><br><br>";
            } else {
                //display bikes in a grid; six bikes per row
                foreach ($bikes as $i => $bike) {
                    $id = $bike->getId();
                    $name = $bike->getName();
                    $price = $bike->getPrice();
                    $image = $bike->getImage();

                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . BIKE_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding-bottom: 100px; flex-direction: row'><p><a href='", BASE_URL, "/bike/detail/$id'><img src='" . $image .
                        "' style='width: 200px;height: 150px;display: block;'><span>$name</a><br>" . $price . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($bikes) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/bike/index">Go to bike list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}