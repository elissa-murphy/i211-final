<?php

class TireIndexView extends IndexView
{

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "tire";
        </script>

        <div id="searchbar">
            <!--            <form method="get" action="--><?//= BASE_URL ?><!--/tire/search">-->
            <!--                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search tires" autocomplete="off" onkeyup="handleKeyUp(event)">-->
            <!--                <input type="submit" value="Go" />-->
            <!--            </form>-->
            <!--            <div id="suggestionDiv"></div>-->
        </div>

        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }


}