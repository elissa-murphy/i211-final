<?php

class TireIndex extends TireIndexView
{
    public function display($tires) {
        //display page header
        parent::displayHeader("List All Tires");

        ?>
        <h2 id="main-header"> Tires in the Shop</h2>

        <div class="bike-grid-container">
            <?php
            if ($tires === 0) {
                echo "No tire was found.<br><br><br><br><br>";
            } else {
                //display tires in a grid; six tires per row
                foreach ($tires as $i => $tire) {
                    $id = $tire->getId();
                    $name = $tire->getName();
                    $price = $tire->getPrice();
                    $image = $tire->getImage();

                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . TIRE_IMG . $image;
                    }
                    if ($i % 5 == 0) {
                        echo "<div style='display: flex; justify-content: space-evenly; align-items: center; flex-wrap: wrap;'>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding: 32px; flex-direction: row; flex-wrap: wrap;'><p><a class='itemLink' href='", BASE_URL, "/tire/detail/$id'><img src='" . $image .
                        "' style='width: 200px;height: 150px;display: block;'><span>$name</a><br>$" . $price . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($tires) - 1) {
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