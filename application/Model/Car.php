<?php

namespace Mini\Model;

use Mini\Core\Model;
use stdClass;

class Car extends Model
{
    public function get($slug)
    {
        $cars = $this->getAvailableCars();

        foreach ($cars as $car){
            if($car->slug == $slug){
                return $car;
            }
        }

        return null;
    }

    public function getAvailableCars(){
        $cars = array();

        $car = new stdClass();
        $car->id = 1;
        $car->name = "Chevrolet Aveo";
        $car->slug = "chevrolet-aveo";
        $car->img = "aveo.webp";
        $car->category = "Auto ecónomico";
        $car->a_c = false;
        $car->bags = 2;
        $car->transmission = "Manual";
        $car->passengers = 5;
        $car->price = 30.00;

        array_push($cars, $car);

        $car = new stdClass();
        $car->id = 2;
        $car->name = "Chevrolet Onix LT";
        $car->slug = "chevrolet-onix-lt";
        $car->img = "onix.webp";
        $car->category = "Auto ecónomico";
        $car->a_c = true;
        $car->bags = 2;
        $car->transmission = "Manual";
        $car->passengers = 5;
        $car->price = 50.00;

        array_push($cars, $car);

        $car = new stdClass();
        $car->id = 3;
        $car->name = "Chevrolet Camaro";
        $car->slug = "chevrolet-camaro";
        $car->img = "camaro.webp";
        $car->category = "Auto deportivo";
        $car->a_c = true;
        $car->bags = 1;
        $car->transmission = "Automática";
        $car->passengers = 4;
        $car->price = 200.00;

        array_push($cars, $car);

        return $cars;
    }
}