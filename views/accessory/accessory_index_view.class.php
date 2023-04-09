<?php

class AccessoryIndexView extends IndexView
{
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "accessory";
        </script>

        <div id="searchbar">
                        <form method="get" action="<?= BASE_URL ?>/accessory/search">
                            <input type="text" name="query-terms" id="searchtextbox" placeholder="Search accessories" autocomplete="off" onkeyup="handleKeyUp(event)">
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