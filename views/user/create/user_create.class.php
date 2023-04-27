<?php

class UserCreate extends UserIndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Sign Up");


        ?>
    <h2 class="new-media-title" style="margin-top: 64px; padding-top: 64px">Sign Up</h2>
    <form class="new-media" action='<?= BASE_URL?>/user/confirm' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
        <p><strong>First Name</strong>:<br>
            <input name="firstName" type="text" size="100" id="firstName" autofocus></p>
        <p><strong>Last Name</strong>:<br>
            <input name="lastName" type="text" size="100" id="lastName" autofocus></p>
        <p><strong>Email</strong>:<br>
            <input name="email" type="text" size="100" id="email" autofocus></p>
        <input class="submit-btn" type="submit" value="Submit" >
    </form>
    </body>

        <?php
        //display page footer
        parent::displayFooter();
    }
}