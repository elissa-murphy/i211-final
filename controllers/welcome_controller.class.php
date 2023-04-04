<?php

class WelcomeController {
    public function index(){
        $view = new WelcomeIndex();
        $view->display();
    }
}



