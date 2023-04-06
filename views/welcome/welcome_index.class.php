<?php

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Home");
        ?>
            <div id="hero-image" style="max-height: 400px;">
                <img src="<?= BASE_URL ?>/www/img/bikeHero.jpeg" style="max-height: 400px; width: 100%;" title="Bike Hero"/>
<!--                <div id="main-header">Welcome to the bike shop!</div>-->
            </div>

<!--        <br>-->
<!--        <table style="border: none; width: 700px; margin: 5px auto">-->
<!--            <tr>-->
<!--                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="text-align: left">-->
<!--                    <ul>-->
<!--                        <li>Feature 1</li>-->
<!--                        <li>Feature 2</li>-->
<!--                        <li>Feature 3</li>-->
<!--                        <li>Feature 4</li>-->
<!--                    </ul>-->
<!--                </td>-->
<!--                <td style="text-align: left">-->
<!--                    <ul>-->
<!--                        <li>Feature 1</li>-->
<!--                        <li>Feature 2</li>-->
<!--                        <li>Feature 3</li>-->
<!--                        <li>Feature 4</li>-->
<!--                    </ul></td>-->
<!--            </tr>-->
<!--        </table>-->
<!---->
        <br>
        <h2 style="text-align: center;">Explore our bikes, tires, and accessories</h2>
        <div id="thumbnails" style="display: flex; justify-content: space-evenly; text-align: center; border: none;">
            <a href="<?= BASE_URL ?>/bike/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;" src="<?= BASE_URL ?>/www/img/bikeFeature.jpeg" title="Bike Library"/>
                <div>Bikes</div>
            </a>
            <a href="<?= BASE_URL ?>/tire/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;" src="<?= BASE_URL ?>/www/img/tireFeature.jpeg" title="Tire Library"/>

                <div>Tires</div>
            </a>
            <a href="<?= BASE_URL ?>/accessories/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;" src="<?= BASE_URL ?>/www/img/accessoriesFeature.jpeg" title="Accessories Library" />

                <div>Accessories</div>
            </a>
        </div>
        <br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}