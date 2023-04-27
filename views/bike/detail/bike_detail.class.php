<?php
/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
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
