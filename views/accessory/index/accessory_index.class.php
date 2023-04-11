<?php

class AccessoryIndex extends AccessoryIndexView
{
    public function display($accessories) {
        //display page header
        parent::displayHeader("List All Accessories");

        ?>
        <h2 id="main-header"> Accessories in the Shop</h2>

        <div class="bike-grid-container">
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
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . ACCESSORY_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div style='display: flex; justify-content: space-evenly; align-items: center; '>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding-bottom: 100px;'><p><a href='", BASE_URL, "/accessory/detail/$id'><img src='" . $image .
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

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method

}