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
//        $image = $bike->getImage();



//        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//            $image = BASE_URL . '/' . BIKE_IMG . $image;
//        }
        ?>

        <div id="main-header">Bike Details</div>
        <hr>
        <!-- display bike details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
<!--                    <img src="--><?//= $image ?><!--" alt="--><?//= $title ?><!--" />-->
                </td>
                <td style="width: 130px;">
                    <p><strong>Name:</strong></p>
                    <p><strong>Maker:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Price:</strong></p>
<!--                    <div id="button-group">-->
<!--                        <input type="button" id="edit-button" value="   Edit   "-->
<!--                               onclick="window.location.href = '--><?//= BASE_URL ?>///bike/edit/<?//= $id ?>//'">&nbsp;
//                    </div>
                </td>
                <td>
                    <p><?= $name ?></p>
                    <p><?= $maker ?></p>
                    <p><?= $description ?></p>
                    <p><?= $price ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/bike/index">Go to bike list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
