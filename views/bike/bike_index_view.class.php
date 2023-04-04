<?php

class BikeIndexView extends IndexView {
    public static function displayHeader() {
        parent::displayHeader()
        ?>
        <script>
            //the media type
            var item = "bike";
        </script>
<!--       create the search bar -->
<!--        <div id="searchbar">-->
<!--            <form method="get" action="--><?//= BASE_URL ?><!--/movie/search">-->
<!--                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search movies by title" autocomplete="off" onkeyup="handleKeyUp(event)">-->
<!--                <input type="submit" value="Go" />-->
<!--            </form>-->
<!--            <div id="suggestionDiv"></div>-->
<!--        </div>-->
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}