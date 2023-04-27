<?php

class UserIndexView extends IndexView
{
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}