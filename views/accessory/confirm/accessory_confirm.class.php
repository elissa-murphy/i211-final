<?php

class AccessoryConfirm extends AccessoryIndexView
{
public function display() {
//display page header
parent::displayHeader("Create Accessories");


?>
<!DOCTYPE "HTML">
<html>
<head>
    <title>Create Accessory</title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
</head>
<body>
<p>You have added an accessory.</p>

<a style="color: white;" href="<?= BASE_URL ?>/accessory/index">
    <div> View Accessories</div>
</a>
</body>
    <?php
    //display page footer
    parent::displayFooter();
}
}