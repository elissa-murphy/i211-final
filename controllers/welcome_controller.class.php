<?php

class WelcomeController {
    //displays welcome index view
    public function index(){
        $view = new WelcomeIndex();
        $view->display();
    }
}



