<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class TireIndexView extends IndexView {
    //display header and footer
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "tire";
        </script>
        <div class="secondary-header">
        <div id="searchbar">
                        <form method="get" action="<?= BASE_URL ?>/tire/search">
                            <input type="text" name="query-terms" id="searchtextbox" placeholder="Search Tires" autocomplete="off" onkeyup="handleKeyUp(event)">
                            <input class="searchGoBtn" type="submit" value="Go" />
                        </form>
                        <div id="suggestionDiv"></div>
        </div>
            <div id="create">
                <form method="get" action="<?= BASE_URL ?>/tire/create">
                    <input class="searchGoBtn" type="submit" value="Add Tires" />
                </form>
            </div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }


}