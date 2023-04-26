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
        $image = $accessory->getImage();



        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . ACCESSORY_IMG . $image;
        }
        ?>

        <h2 id="main-header"><?= $name ?> Details</h2>
        <!-- display accessory details -->


        <div style="padding-bottom: 150px;">
            <div style="display: flex; justify-content: space-evenly;">
                <div>
                    <div style="width: 350px; height: 350px;">
                       <img src="<?= $image ?>" alt="Accessory Main" style='width: 350px;height: 250px;display: block;'/>
                    </div>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-evenly;">
                        <p style="padding: 0px 10px 0px 10px"><?= $name ?></p>
                        <p style="padding: 0px 10px 0px 10px">Maker: <?= $maker ?></p>
                        <p style="padding: 0px 10px 0px 10px">Price: <?= $price ?></p>
                    </div>
                    <div>
                        <p style="width: 400px;">Description: <?= $description ?></p>
                    </div>
                    <div id="confirm-message"><?= $confirm ?></div>
                </div>

            </div>

        </div>
        <div id="create">
            <form method="get" action="<?= BASE_URL ?>/accessory/confirm_delete/<?=$id?>">
                <input type="submit" value="Delete Accessory" />
            </form>
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