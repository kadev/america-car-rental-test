<?php

namespace Mini\Controller;
use Mini\Model\Car;
use Mini\Libs\Helper;


class HomeController
{
    public $_car;

    public function __construct(){
        $this->_car = new Car();
    }

    public function index()
    {
        $active_page = "home";
        $cars = $this->_car->getAvailableCars();

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
