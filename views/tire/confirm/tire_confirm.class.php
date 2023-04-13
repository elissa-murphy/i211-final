<?php

class TireConfirm extends TireIndexView
{
public function display() {
//display page header
parent::displayHeader("Create Tire");


?>
<!DOCTYPE "HTML">
<html>
<head>
    <title>Add a Tire</title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
</head>
<body>
<div class="confirm-body">
    <div>
        <h3 style="text-align: center">You have successfully added a tire!<h3>
    </div>
    <div>
        <a class="confirm-btn" href="<?= BASE_URL ?>/tire/index">
            <div> View All Tires</div>
        </a>
    </div>
</div>

<a style="color: white;" href="<?= BASE_URL ?>/tire/index">
    <div> View Tires</div>
</a>
</body>
    <?php
    //display page footer
    parent::displayFooter();
}
}