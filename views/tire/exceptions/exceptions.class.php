<?php

/**
 * Author: Jacob Catalan
 * Date: 4/24/2023
 * File: exceptions.class.php
 * Description:
 */

if (isset($_GET['name']) && isset($_GET['maker']) && isset($_GET['price']) && isset($_GET['description']) && isset($_GET['image']) && isset($_GET['rating'])){
    $name = $_GET['name'];
    $maker = $_GET['maker'];
    $price = $_GET['price'];
    $desc = $_GET['description'];
    $image = $_GET['image'];
    $rating = $_GET['rating'];
}

try {
    if($name == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if($maker == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if($price == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if($desc == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if($image == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if($rating == ""){
        throw new RequiredValue("Fatal Error Name is Missing");
    }
    if(!is_numeric($price)){
        throw new Datatype(gettype($price), "number");
    }
    if(!is_numeric($rating)){
        throw new Datatype(gettype($rating), "number");
    }
}
catch (Datatype $e){
    $message = $e->getMessage();
}
catch (RequiredValue $e){
    $message = $e->getMessage();
}

class Datatype extends Exception{
    public function  __construct($in_type, $in_expected)
    {
        parent::__construct("Data type Error:<br>" . "Expected: $in_expected <br>" . "Received: $in_type");
    }
}
class RequiredValue extends Exception{

}