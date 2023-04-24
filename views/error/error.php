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
        <div id = "main-header">Error</div>
        <hr>
        <table style = "width: 100%; border: none">
            <tr>
                <td style = "vertical-align: middle; text-align: center; width:100px">
                    <img src = '<?= BASE_URL ?>/www/img/error.jpg' style = "width: 80px; border: none"/>
                </td>
                <td style = "text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style = "color: red">
                        <?= urldecode($message)
                        ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><hr>
        <a href="<?= BASE_URL ?>/welcome/index">Back to home</a>

        <?php
        //display page footer
        parent::displayFooter();
    }
}