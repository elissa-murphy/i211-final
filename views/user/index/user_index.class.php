<?php

class UserIndex extends UserIndexView
{
    public function display($users) {
        //display page header
        parent::displayHeader("All Users");
        ?>
<div class="communityContainer">
    <h2>Users in the Community</h2>
        <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        <?php
        //loop through users and display them in a table
        if ($users === 0) {
            echo "No user was found.<br><br><br><br><br>";
        } else {
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . $user->getfirstName() . "</td>";
                echo "<td>" . $user->getlastName() . "</td>";
                echo "<td><a href='mailto:$user->getEmail()'>" . $user->getEmail() . "</a></td>";
                echo "</tr>";
            }
        }
        ?>
        </table>
        <br><br><br><br>

        <div>
        <a class="backBtn" href="<?= BASE_URL ?>/user/create">Sign up for the Community List</a>
            <br><br><br><br>
    </div>
</div>
        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}