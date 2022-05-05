<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base Class
$f3 = Base::instance();
//echo gettype($f3);

//Define a default route
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view->render('views/pet-home.html');
    //echo '<h1>My Pets2</h1>';

}
);

//Define a order route
$f3->route('GET /order', function()
{
    $view = new Template();
    echo $view->render('views/pet-order.html');
}
);

//Define a order 2 route
$f3->route('POST /order2', function()
{
    $view = new Template();
    echo $view->render('views/pet-order2.html');
}
);

//Define a Summary route
$f3->route('POST /summary', function()
{
    $view = new Template();
    echo $view->render('views/summary.html');
    var_dump ($_POST);
}
);


//Run fat free
$f3->run();