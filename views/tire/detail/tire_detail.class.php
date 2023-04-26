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

        <h2 id="main-header"><?= $name ?></h2>
        <!-- display tire details -->
        <div style="padding-bottom: 150px;">
            <div style="display: flex; justify-content: space-evenly;">
                <div>
                    <div style="width: 350px; height: 350px;">
                      <img src="<?= $image ?>" alt="Tire Main" style='width: 350px;height: 250px;'/>
                    </div>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-evenly;">
                        <p style="padding: 0px 10px 0px 10px">Maker: <?= $maker ?></p>
                        <p style="padding: 0px 10px 0px 10px">Rating: <?= $rating ?>/10</p>
                        <p style="padding: 0px 10px 0px 10px">Price:<?= $price ?></p>
                    </div>
                    <div>
                        <p style="width: 400px;">Description: <?= $description ?></p>
                    </div>
                    <div id="confirm-message"><?= $confirm ?></div>
                </div>

            </div>
            <div id="create">
                <form method="get" action="<?= BASE_URL ?>/tire/confirm_delete/<?=$id?>">
                    <input type="submit" value="Delete Tire" />
                </form>
            </div>
            <a href="<?= BASE_URL ?>/tire/index"><- Back</a>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}