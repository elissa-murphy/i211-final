<?php

class BikeConfirm extends BikeIndexView
{
public function display() {
//display page header
parent::displayHeader("Create Bike");


?>
<!DOCTYPE "HTML">
<html>
<head>
    <title>Create Bike</title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
</head>
<body>
<p>You have added an bike.</p>

<a style="color: white;" href="<?= BASE_URL ?>/bike/index">
    <div> View Bikes</div>
</a>
</body>
    <?php
    //display page footer
    parent::displayFooter();
}
}