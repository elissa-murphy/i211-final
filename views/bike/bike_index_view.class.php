<?php

class BikeIndexView extends IndexView {
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "bike";
        </script>

        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/bike/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search bikes" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>

        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}