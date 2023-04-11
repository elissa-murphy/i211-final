<?php

class TireDetail extends TireIndexView
{
    public function display($tire, $confirm = "") {
        //display page header
        parent::displayHeader("Display Tire Details");

        //retrieve bike details by calling get methods
        $id = $tire->getId();
        $maker = $tire->getMaker();
        $name = $tire->getName();
        $description = $tire->getDescription();
        $price = $tire->getPrice();
        $rating = $tire->getRating();
        $image = $tire->getImage();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . TIRE_IMG . $image;
        }
        ?>

        <h2 id="main-header"><?= $name ?> Details</h2>
        <!-- display bike details -->


        <div style="padding-bottom: 150px;">
            <div style="display: flex; justify-content: space-evenly;">
                <div>
                    <div style="width: 350px; height: 350px;">
                      <img src="<?= $image ?>" alt="Tire Main" style='width: 350px;height: 250px;'/>
                    </div>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-evenly;">
                        <p class="tire-title"><?= $name ?></p>
                        <p>Maker: <?= $maker ?></p>
                        <p>Rating: <?= $rating ?>/10</p>
                        <p>Price:<?= $price ?></p>
                    </div>
                    <div>
                        <p><?= $description ?></p>
                    </div>
                    <div id="confirm-message"><?= $confirm ?></div>
                </div>

            </div>


            <a href="<?= BASE_URL ?>/tire/index"><- Back</a>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}