<?php

class TireSearch extends TireIndexView
{
    public function display($terms, $tires) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($tires)) ? "( 0 - 0 )" : "( 1 - " . count($tires) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
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
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='bike-grid-col' style='display: flex; justify-content: space-evenly; padding-bottom: 100px; flex-direction: row'><p><a href='", BASE_URL, "/tire/detail/$id'><img src='" . $image .
                        "' style='width: 200px;height: 150px;display: block;'><span>$name</a><br>" . $price . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($tires) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/tire/index">Go to tire list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}