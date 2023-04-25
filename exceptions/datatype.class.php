<?php

class Datatype extends Exception
{

    public function  __construct($in_type, $in_expected)
    {
        parent::__construct("Data type Error:<br>" . "Expected: $in_expected <br>" . "Received: $in_type");
    }

}