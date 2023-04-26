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

        <h2 id="main-header"><?= $name ?></h2>
        <!-- display accessory details -->
            <div class="detailPage-container">
                <div>
                    <div class="detailPage-ImageContainer">
                       <img src="<?= $image ?>" alt="Accessory Main" style='width: 350px;height: 250px;display: block;'/>
                    </div>
                </div>


                <div class="detailPage-InfoContainer">
                    <div style="display: flex; justify-content: space-evenly;">
                        <div class="detailPage-Maker">Maker:<p><?= $maker ?></p></div>
                        <div class="detailPage-Price">Price:<p>$<?= $price ?></p></div>
                    </div>

                    <div>
                        <div class="detailPage-Desc">Description:<p><?= $description ?></p></div>
                    </div>

                    <div id="confirm-message"><?= $confirm ?></div>

                    <div id="create">
                        <form method="get" action="<?= BASE_URL ?>/accessory/confirm_delete/<?=$id?>">
                            <input class="deleteProduct-Input" type="submit" value="Delete Accessory" />
                        </form>
                    </div>
                </div>

            </div>


<!--        <div id="create">-->
<!--            <form method="get" action="--><?//= BASE_URL ?><!--/accessory/confirm_delete/--><?//=$id?><!--">-->
<!--                <input type="submit" value="Delete Accessory" />-->
<!--            </form>-->
<!--        </div>-->



            <a class="backBtn" href="<?= BASE_URL ?>/accessory/index"><- Back</a>
        <br>      <br>      <br>      <br>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}