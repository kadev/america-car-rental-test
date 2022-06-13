<?php

namespace Mini\Controller;
use Mini\Libs\Helper;
use Mini\Model\Car;
use stdClass;


class CarsController
{
    public $_car;

    public function __construct(){
        if(!isset($_SESSION["products"])){
            session_start();
        }

        $this->_car = new Car();
    }

    public function reserve($slug){
        $active_page = "reserve-car";
        $car = $this->_car->get($slug);
        $addedProducts = $_SESSION['products'];

        require APP . 'view/_templates/header.php';
        require APP . 'view/cars/reserve.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addProductToShoppingCar(){
        $result = new stdClass();

        $_SESSION['products'][$_POST['product']] =array(
            'name'=>$_POST['product'],
            'image'=>$_POST['image'],
            'qty'=>$_POST['qty'],
            'price'=>$_POST['price'],
            'total'=>$_POST['qty']*$_POST['price']
        );

        $_SESSION['total'] = $this->calculateTotal($_SESSION['products']);

        $result->response = true;
        $result->session = $_SESSION;

        echo json_encode($result);
    }

    public function updateShoppingCart(){
        $result = new stdClass();

        $result->products = isset($_SESSION['products']) ? $_SESSION['products'] : null;
        $result->total = $this->calculateTotal($result->products);
        $result->items = count($result->products);
        $result->htmlProducts = '';

        if($result->products){
            foreach ($result->products as $product){
                ob_start();
                include(APP.'view/_templates/item-shopping-cart.php');
                $content = ob_get_contents();
                ob_end_clean();

                $result->htmlProducts .= $content;
            }
        }

        $result->response = true;
        echo json_encode($result);
    }

    public function deleteExtraToShoppingCar(){
        $result = new stdClass();

        $sku = $_POST['product'];
        $products = $_SESSION['products'];
        unset($products[$sku]);
        $_SESSION['products']= $products;

        $result->response = true;
        $result->session = $_SESSION;

        echo json_encode($result);
    }

    public function calculateTotal($products){
        $total = 0;
        if(!empty($products)){
            foreach ($products as $product){
                $total += ($product['price']*$product['qty']);
            }
        }

        return $total;
    }

    public function emptyCart(){
        $result = new stdClass();

        $_SESSION['products'] =array();

        $result->response = true;
        $result->session = $_SESSION;

        echo json_encode($result);
    }
}
