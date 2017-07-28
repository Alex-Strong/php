<?php

//include_once 'controllers/AnimalsController.php';
//include_once 'controllers/CarsController.php';
//include_once 'Container.php';

require 'vendor/autoload.php';


use PHPBootcamp\Controllers\AnimalsController;
use PHPBootcamp\Controllers\FruitsController;
use PHPBootcamp\Controllers\CarsController;
use PHPBootcamp\Controllers\ControllerInterface;

use PHPBootcamp\Models\Cars;
use PHPBootcamp\Models\Animals;
use PHPBootcamp\Models\SmallAnimals;
use PHPBootcamp\Controllers;
use PHPBootcamp\Container;
use PHPBootcamp\Models\Fruits;



$response = ''; //render('views/landing.view.php');
if (array_key_exists('page', $_GET)) {
    $requestedPage = $_GET['page'];

    $dependencies = [
        'model.animals' => new Animals(),
        'model.animals.small' => new SmallAnimals(),
        'model.cars' => new Cars(),
        'model.fruits'=> new Fruits(),
        'resourse.views'=> __DIR__ .'/app/views'
    ];

    $container = new Container($dependencies);
        var_dump($container);
    $animals = new AnimalsController($container);
    var_dump($animals);
    $cars = new CarsController($container);
    $fruits=new FruitsController($container);
    $pages = [
        'animals' => [$animals, 'animalsAction'],
        'small-animals' => [$animals, 'smallAnimalsAction'],
        'cars' => [$cars, 'carsAction'],
        'fruits'=> [$fruits, 'fruitsAction'],

    ];

    if (array_key_exists($requestedPage, $pages)) {
        $response = call_user_func($pages[$requestedPage]);//kak mi zauskaem funkciju iz pages
    } else {
        //http_response_code(404);
        header('HTTP/1.1 404 Not Found');
    }
}

include __DIR__ .'/app/view.php';