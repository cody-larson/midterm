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

//Define a survey route
$f3->route('GET|POST /survey', function ($f3) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $f3->set('name', $_POST['name']);
        $_SESSION['name'] = $_POST['name'];

        $f3->set('optionsArray', $_POST['options']);
        $_SESSION['options'] = $_POST['options'];


        $f3->reroute('./summary');
    }

    //Display a view
    $view = new Template();
    echo $view->render('views/survey.php');
});

//Define a summary route
$f3->route('GET|POST /summary', function($f3) {

    $f3->set('name', $_SESSION['name']);
    $optionsArray = implode(', ', $_SESSION['options']);
    $f3->set('options', $optionsArray);

    $view = new Template();
    echo $view->render('views/results.php');
});


//Run Fat-Free
$f3->run();