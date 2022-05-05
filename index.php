<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base Class
$f3 = Base::instance();
//echo gettype($f3);

//Define a default route
$f3->route('GET|POST /', function()
{
    $view = new Template();
    echo $view->render('views/pet-home.html');
    //echo '<h1>My Pets2</h1>';

}
);

//Define a order route
$f3->route('GET|POST /order', function()
{
    $view = new Template();
    echo $view->render('views/pet-order.html');
}
);

//Define a order 2 route
$f3->route('POST|GET /order2', function()
{
    $view = new Template();
    echo $view->render('views/pet-order2.html');

    $_SESSION['pettype'] = $_POST['pettype'];
    $_SESSION['color'] = $_POST['color'];
}
);

//Define a Summary route
$f3->route('POST|GET /summary', function()
{
    $_SESSION['petname'] = $_POST['petname'];
    $view = new Template();
    echo $view->render('views/summary.html');
    //var_dump ($_POST);
    session_destroy();

}
);


//Run fat free
$f3->run();