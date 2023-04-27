<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * Name: bike.class.php
 * Description: This class defines a method "display".
 *              The method accepts a bike object and displays the details of the bike in a table.
 */

class BikeDetail extends BikeIndexView {

    public function display($bike, $confirm = "") {
        //display page header
        parent::displayHeader("Display Bike Details");

        //retrieve bike details by calling get methods
        $id = $bike->getId();
        $maker = $bike->getMaker();
        $name = $bike->getName();
        $description = $bike->getDescription();
        $price = $bike->getPrice();
        $image = $bike->getImage();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . BIKE_IMG . $image;
        }
        ?>

<!--        <h2 id="main-header">--><?//= $name ?><!--</h2>-->
<!--<div style="padding-bottom: 150px;">-->
<!--        <div style="display: flex; justify-content: space-evenly;">-->
<!--            <div>-->
<!--                <div style="width: 350px; height: 350px;">-->
<!--                    <img src="--><?//= $image ?><!--" alt="Bike Main" style='width: 350px;height: 250px;' />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div>-->
<!--                <div style="display: flex; justify-content: space-evenly;">-->
<!---->
<!--                    <p style="padding: 0px 10px 0px 10px">Maker: --><?//= $maker ?><!--</p>-->
<!--                    <p style="padding: 0px 10px 0px 10px">Price: --><?//= $price ?><!--</p>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <p style="width: 400px;">Description: --><?//= $description ?><!--</p>-->
<!--                </div>-->
<!--                <div id="confirm-message">--><?//= $confirm ?><!--</div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    <div id="create">-->
<!--        <form method="get" action="--><?//= BASE_URL ?><!--/bike/confirm_delete/--><?//=$id?><!--">-->
<!--            <input type="submit" value="Delete Bike" />-->
<!--        </form>-->
<!--    </div>-->



    <h2 id="main-header"><?= $name ?></h2>
    <!-- display bike details -->
    <div class="detailPage-container">
        <div>
            <div class="detailPage-ImageContainer">
                <img src="<?= $image ?>" alt="Bike Main" style='width: 350px;height: 250px;display: block;'/>
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
                <form method="get" action="<?= BASE_URL ?>/bike/confirm_delete/<?=$id?>">
                    <input class="deleteProduct-Input" type="submit" value="Delete Bike" />
                </form>
            </div>
        </div>

    </div>

        <a class="backBtn" href="<?= BASE_URL ?>/bike/index"><- Back</a>
        <br> <br> <br> <br>
</div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
