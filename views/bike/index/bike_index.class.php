<?php
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

//                    $image = $bike->getImage();
//                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//                        $image = BASE_URL . "/" . BIKE_IMG . $image;
//                    }
//                    if ($i % 6 == 0) {
//                        echo "<div class='row'>";
//                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding-bottom: 100px; flex-direction: row'><p><img src='" . $image .
                        "'><span><a href='", BASE_URL, "/bike/detail/$id'>$name</a><br>" . $price . "</span></p></div>";
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