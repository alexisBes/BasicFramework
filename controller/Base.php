<?php
require_once 'controller/Controler.php';

class Base extends Controler
{
    public function index(){
        $this->generateView(array());
    }
}


?>