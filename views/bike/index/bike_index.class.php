<?php
/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class BikeIndex extends BikeIndexView {

    public function display($bikes) {
        //display page header
        parent::displayHeader("List All Bikes");

        ?>
        <h2 id="main-header"> Bikes in the Shop</h2>

        <div class="bike-grid-container">
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
                    if ($i % 5 == 0) {
                        echo "<div style='display: flex; justify-content: space-evenly; align-items: center; flex-wrap: wrap;'>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding: 32px; flex-direction: row; flex-wrap: wrap;'><p><a class='itemLink' href='", BASE_URL, "/bike/detail/$id'><img src='" . $image .
                        "' style='width: 200px;height: 150px;display: block;'><span>$name</a><br>$" . $price . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($bikes) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method

}