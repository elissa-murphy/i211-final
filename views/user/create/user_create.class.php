<?php

class UserCreate extends UserIndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Sign Up");


        ?>
    <h2 class="new-media-title">Sign Up</h2>
    <form action='<?= BASE_URL?>/user/confirm' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
        <p><strong>First Name</strong>:<br>
            <input name="firstName" type="text" size="100" id="firstName" required autofocus></p>
        <p><strong>Last Name</strong>:<br>
            <input name="lastName" type="text" size="100" id="lastName" required autofocus></p>
        <p><strong>Email</strong>:<br>
            <input name="email" type="text" size="100" id="email" required autofocus></p>
        <input class="submit-btn" type="submit" value="Submit" >
    </form>
    </body>

        <?php
        //display page footer
        parent::displayFooter();
    }
}