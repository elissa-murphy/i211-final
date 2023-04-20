<?php
/**
 * Author: Jacob Catalan
 * Date: 4/19/2023
 * Description: this script displays shopping cart content.
 */





?>
        <?php
    class CartIndexView extends IndexView
    {



        public function display($bike, $tire, $accessories) {
            //display page header
            parent::displayHeader("Home");

            $bike_id = $bike->getId();
            $bike_maker = $bike->getMaker();
            $bike_name = $bike->getName();
            $bike_price = $bike->getPrice();

            $tire_id = $tire->getId();
            $tire_maker = $tire->getMaker();
            $tire_name = $tire->getName();
            $tire_price = $tire->getPrice();

            $accessories_id = $accessories->getId();
            $accessories_maker = $accessories->getMaker();
            $accessories_name = $accessories->getName();
            $accessories_price = $accessories->getPrice();

            ?>

            <h2> My Shopping Cart</h2>
            <!--  display shoxpping cart content -->
            <div class="booklist">
                <div class="row header">
                    <div class="col1">Title</div>
                    <div class="col2">Price</div>
                    <div class="col3">Quantity</div>
                    <div class="col4">Subtotal</div>
                </div>


                <div class="row">
                    <div class="col1"><a href='<?= BASE_URL ?>/tire/detail/$id'><span><?= $tire_name ?></a></div>
                    <div class="col2">$<?= $tire_price?></div>
                    <div class="col3"></div>
                    <div class="col4">$</div>
                </div>


            </div>

            <div class="bookstore-button">
                <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
                <input type="button" value="Cancel" onclick="window.location.href = 'listbooks.php'"/>
            </div>
            <br><br>

            <?php
            //display page footer
            parent::displayFooter();
        }

    }