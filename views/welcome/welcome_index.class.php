<?php

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Home");
        ?>
        <div id="main-header">Welcome to the bike shop!</div>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <ul>
                        <li>Feature 1</li>
                        <li>Feature 2</li>
                        <li>Feature 3</li>
                        <li>Feature 4</li>
                    </ul>
                </td>
                <td style="text-align: left">
                    <ul>
                        <li>Feature 1</li>
                        <li>Feature 2</li>
                        <li>Feature 3</li>
                        <li>Feature 4</li>
                    </ul></td>
            </tr>
        </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p>Explore our bikes, tires, and accessories</p>

            <a href="<?= BASE_URL ?>/bike/index">
<!--                <img src="--><?//= BASE_URL ?><!--/www/img/bikess.jpg" title="Bike Library"/>-->
                <div>Bikes</div>
            </a>
            <a href="<?= BASE_URL ?>/tire/index">
<!--                <img src="--><?//= BASE_URL ?><!--/www/img/tires.jpg" title="Tire Library"/>-->
                <div>Tires</div>
            </a>
            <a href="<?= BASE_URL ?>/accessories/index">
<!--                <img src="--><?//= BASE_URL ?><!--/www/img/accessories.jpg" title="Accessories Library" />-->
                <div>Accessories</div>
            </a>
        </div>
        <br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}