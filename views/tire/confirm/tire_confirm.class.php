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
    <title>Create Tire</title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
</head>
<body>
<p>You have added an Tire.</p>

<a style="color: white;" href="<?= BASE_URL ?>/tire/index">
    <div> View Tires</div>
</a>
</body>
    <?php
    //display page footer
    parent::displayFooter();
}
}