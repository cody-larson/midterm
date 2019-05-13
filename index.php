<?php

//Start a session
ob_start();
session_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Required files
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('option', array('This midterm is easy', 'I like midterms', 'Today is Monday'));

//Define a default route
$f3->route('GET /', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a breakfast route
$f3->route('GET /survey', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/survey.php');
});


//Run Fat-Free
$f3->run();