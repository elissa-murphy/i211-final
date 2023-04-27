<?php
/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
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
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
            <div id='wrapper'>
                 <div id="banner" style="background-color: #506931; padding: 20px;  display: flex; margin: 0 auto; justify-content: space-evenly;">
                    <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Bike Shop">
                         <div id="left">
                             <span style='color: #fffffa; font-size: 36pt; font-weight: bold; vertical-align: top'>The Bike Shop.</span>
                        </div>
                    </a>
                     <div id="right" style="display: flex;">
                  <a class="nav_link" style="color: white;" href="<?= BASE_URL ?>/bike/index">
                         <div>Bikes</div>
                         </a>
                         <a class="nav_link" style="color: white; padding: 0px 15px;" href="<?= BASE_URL ?>/tire/index">
                             <div>Tires</div>
                         </a>
                         <a class="nav_link" style="color: white;" href="<?= BASE_URL ?>/accessory/index">
                             <div>Accessories</div>
                         </a>
                          <a class="nav_link" style="color: white; padding-left: 15px;" href="<?= BASE_URL ?>/user/index">
                             <div>Community</div>
                         </a>
                     </div>
        </div>
        <?php
    }
    //end of displayHeader function

    //displays the page footer
    public static function displayFooter() {
        ?>
                <div id="footer" style="text-align: center; background-color: #506931; color: #fffffa; height: 100px; padding-top: 25px; height: 50px;">&copy 2023 Bike Shop. All Rights Reserved. - Elissa Murphy & Jacob Catalan</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    }
    //end of displayFooter function
}
