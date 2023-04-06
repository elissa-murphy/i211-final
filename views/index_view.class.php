<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {
    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<!--            <link rel='shortcut icon' href='--><?//= BASE_URL ?><!--/www/img/favicon.ico' type='image/x-icon' />-->
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
            <div id='wrapper'>
                 <div id="banner">
                    <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Bike Shop">
                         <div id="left">
<!--                    <img src='--><?//= BASE_URL ?><!--/www/img/logo.png' style="width: 180px; border: none" />-->
                             <span style='color: #000; font-size: 36pt; font-weight: bold; vertical-align: top'>Bike shop!</span>
                        </div>
                    </a>
                     <div id="right">
<!--                <img src="--><?//= BASE_URL ?><!--/www/img/kungfupanda.png" style="width: 400px; border: none" />-->
                     </div>
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
                        <br><br><br>
                        <div id="push"></div>
                    </div>
                <div id="footer"><br>&copy 2023 Bike Shop. All Rights Reserved.</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    } //end of displayFooter function
}
