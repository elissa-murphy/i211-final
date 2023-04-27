<?php
/**
 * Author: Jacob Catalan
 * Date: 4/23/2023
 * Name: error.php
 * Description: this script displays an error message. This script is globally available throughout the application. 
 *     The message to be displayed is passed to this script via variable $message. The dispatcher uses this to 
 *     display an error message when the requested controller is not found.
 */



?>

<?php

class ErrorView extends IndexView {

    public function display($message) {
        //display page header
        parent::displayHeader("Error");
        ?>

<!--        <table style = "width: 100%; border: none">-->
<!--            <tr>-->
<!--                <td style = "vertical-align: middle; text-align: center; width:100px">-->
<!--                    <img src = '--><?//= BASE_URL ?><!--/www/img/error.png' style = "width: 80px; border: none"/>-->
<!--                </td>-->
<!--                <td style = "text-align: left; vertical-align: top;">-->
<!--                    <h2> An Error has Occurred.</h2>-->
<!--                    <div style = "color: red">-->
<!--                        --><?//= urldecode($message)
//                        ?>
<!--                    </div>-->
<!--                    <br>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->

        <div class="errorContainer">
            <div>
                <img src = '<?= BASE_URL ?>/www/img/error.png' style = "width: 80px; border: none"/>
            </div>
            <div>
                <h2> An Error has Occurred.</h2>
                <div style = "color: red">
                    <?= urldecode($message)
                    ?>
                </div>
            </div>
        </div>



        <br><br><br><br>
        <a class="backBtn" href="<?= BASE_URL ?>/welcome/index">Back to Home</a>
        <br><br><br><br>
        <?php
        //display page footer
        parent::displayFooter();
    }
}