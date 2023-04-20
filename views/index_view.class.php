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
            <div id='wrapper'>
                 <div id="banner" style="background-color: black; padding: 20px;  display: flex; margin: 0 auto; justify-content: space-evenly;">
                    <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Bike Shop">
                         <div id="left">
<!--                    <img src='--><?//= BASE_URL ?><!--/www/img/logo.png' style="width: 180px; border: none" />-->
                             <span style='color: #fffffa; font-size: 36pt; font-weight: bold; vertical-align: top'>The Bike shop.</span>
                        </div>
                    </a>
                     <div id="right" style="display: flex;">
                  <a style="color: white;" href="<?= BASE_URL ?>/bike/index">
                         <div>Bikes</div>
                         </a>
                         <a style="color: white; padding: 0px 15px;" href="<?= BASE_URL ?>/tire/index">
                             <div>Tires</div>
                         </a>
                         <a style="color: white;" href="<?= BASE_URL ?>/accessory/index">
                             <div>Accessories</div>
                         </a>
                          <a style="color: white; padding-left: 15px;" href="<?= BASE_URL ?>/user/index">
                             <div>Community</div>
                         </a>
                         <a style="color: white; padding-left: 15px;" href="<?= BASE_URL ?>/cart/index">
                             <div>Cart</div>
                         </a>
<!--                            <a style="color: white;" href="--><?//= BASE_URL ?><!--/accessory/create">-->
<!--                             <div>Add Accessories</div>-->
<!--                         </a>-->
                     </div>
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
<!--                        <br><br><br>-->
<!--                        <div id="push"></div>-->
<!--                    </div>-->
                <div id="footer" style="text-align: center; background-color: black; color: #fffffa; height: 100px; padding-top: 25px; height: 50px;">&copy 2023 Bike Shop. All Rights Reserved. - Elissa Murphy & Jacob Catalan</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    } //end of displayFooter function
}
