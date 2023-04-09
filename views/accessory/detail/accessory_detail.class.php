<?php

class AccessoryDetail extends AccessoryIndexView
{
    public function display($accessory, $confirm = "") {
        //display page header
        parent::displayHeader("Display Accessory Details");

        //retrieve accessory details by calling get methods
        $id = $accessory->getId();
        $maker = $accessory->getMaker();
        $name = $accessory->getName();
        $description = $accessory->getDescription();
        $price = $accessory->getPrice();
//        $image = $accessory->getImage();



//        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//            $image = BASE_URL . '/' . ACCESSORY_IMG . $image;
//        }
        ?>

        <h2 id="main-header"><?= $name ?> Details</h2>
        <!-- display accessory details -->


        <div style="padding-bottom: 150px;">
            <div style="display: flex; justify-content: space-evenly;">
                <div>
                    <div style="width: 350px; height: 350px;">
                        <!--                    <img src="--><?//////= $image ?><!--" alt="--><?//////= $title ?><!--" />-->
                    </div>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-evenly;">
                        <p><?= $name ?></p>
                        <p><?= $maker ?></p>
                        <p><?= $price ?></p>
                    </div>
                    <div>
                        <p><?= $description ?></p>
                    </div>
                    <div id="confirm-message"><?= $confirm ?></div>
                </div>

            </div>


            <a href="<?= BASE_URL ?>/accessory/index"><- Back</a>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}