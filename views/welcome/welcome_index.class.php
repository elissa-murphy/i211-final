<?php
/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class WelcomeIndex extends IndexView
{

    public function display()
    {
        //display page header
        parent::displayHeader("Home");
        ?>
        <div id="hero-image" style="max-height: 400px;">
            <img src="<?= BASE_URL ?>/www/img/bikeHero.jpeg" style="max-height: 400px; width: 100%;" title="Bike Hero"/>
        </div>
        <br>
        <h2 style="text-align: center;">Explore our Bikes, Tires, and Accessories</h2>
        <div id="thumbnails" style="display: flex; justify-content: space-evenly; text-align: center; border: none;">
            <a class="thumbnailLink" href="<?= BASE_URL ?>/bike/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;"
                     src="<?= BASE_URL ?>/www/img/bikeFeature.jpeg" title="Bike Library"/>
                <div>Bikes</div>
            </a>
            <a class="thumbnailLink" href="<?= BASE_URL ?>/tire/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;"
                     src="<?= BASE_URL ?>/www/img/tireFeature.jpeg" title="Tire Library"/>

                <div>Tires</div>
            </a>
            <a class="thumbnailLink" href="<?= BASE_URL ?>/accessory/index">
                <img style="max-height: 200px; max-width: 250px; min-height: 200px; min-width: 250px;"
                     src="<?= BASE_URL ?>/www/img/accessoriesFeature.jpeg" title="Accessories Library"/>

                <div>Accessories</div>
            </a>
        </div>

        <div class="community-section">
            <div class="community-sectionInfo"><p>Join the Community List.</p></div>
            <div class="community-sectionBtn">
                <a href="<?= BASE_URL ?>/user/create">Sign Up</a>
            </div>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }
}